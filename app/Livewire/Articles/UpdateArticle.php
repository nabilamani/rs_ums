<?php

namespace App\Livewire\Articles;

use App\Models\Article;
use App\Models\CategoryArticle;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateArticle extends Component
{
    use WithFileUploads;

    public array $article = [];
    public $categories;
    public $thumbnail;
    
    // Properties untuk auto-save dan draft management
    public $isDraftSaved = false;
    public $autoSaveEnabled = true;
    public $originalSlug;
    
    // Properties untuk preview
    public $previewMode = false;

    public function mount(string $slug): void
    {
        $art = Article::where('slug', $slug)->firstOrFail();
        $this->article = $art->toArray();
        $this->originalSlug = $slug;

        // Format tanggal untuk input date
        if (!empty($this->article['published_at'])) {
            $this->article['published_at'] = date('Y-m-d', strtotime($this->article['published_at']));
        }

        $this->categories = CategoryArticle::orderBy('name')->get();
        $this->isDraftSaved = true; // Artikel sudah ada
    }

    protected function rules()
    {
        return [
            'article.title'        => 'required|string|max:255',
            'article.excerpt'      => 'nullable|string|max:500',
            'article.content'      => 'required|string',
            'article.category_id'  => 'nullable|exists:category_articles,id',
            'article.published_at' => 'nullable|date',
            'article.status'       => 'required|in:draft,published',
            'thumbnail'            => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
        ];
    }

    protected $messages = [
        'article.title.required' => 'Judul artikel wajib diisi.',
        'article.title.max' => 'Judul tidak boleh lebih dari 255 karakter.',
        'article.content.required' => 'Konten artikel wajib diisi.',
        'article.excerpt.max' => 'Ringkasan tidak boleh lebih dari 500 karakter.',
        'thumbnail.image' => 'File harus berupa gambar.',
        'thumbnail.mimes' => 'Format gambar harus JPEG, JPG, PNG, atau WebP.',
        'thumbnail.max' => 'Ukuran gambar maksimal 2MB.',
        'article.category_id.exists' => 'Kategori yang dipilih tidak valid.',
        'article.published_at.date' => 'Format tanggal tidak valid.',
        'article.status.in' => 'Status harus draft atau published.',
    ];

    // Auto-save draft functionality
    public function autoSaveDraft()
    {
        if (!$this->autoSaveEnabled || (empty($this->article['title']) && empty($this->article['content']))) {
            return;
        }

        try {
            // Validasi basic sebelum auto-save
            if (empty($this->article['title']) || empty($this->article['content'])) {
                return;
            }

            $model = Article::findOrFail($this->article['id']);
            
            // Data untuk update auto-save
            $data = [
                'title' => $this->article['title'],
                'excerpt' => $this->article['excerpt'] ?? null,
                'content' => $this->article['content'],
                'category_id' => $this->article['category_id'] ?? null,
                'published_at' => $this->article['status'] === 'published' ? 
                    ($this->article['published_at'] ? $this->article['published_at'] : now()) : null,
                'status' => $this->article['status'],
            ];

            // Generate slug yang unik jika title berubah
            if ($this->article['title'] !== $model->title) {
                $data['slug'] = $this->generateUniqueSlug($this->article['title']);
            }

            $model->update($data);
            $this->isDraftSaved = true;

            // Dispatch browser event to show save status
            $this->dispatch('draftAutoSaved', [
                'message' => 'Perubahan tersimpan otomatis',
                'time' => now()->format('H:i:s')
            ]);

        } catch (\Exception $e) {
            \Log::error('Auto-save failed: ' . $e->getMessage(), [
                'user_id' => auth()->id(),
                'article_id' => $this->article['id'] ?? 'unknown'
            ]);
            
            $this->dispatch('draftAutoSaveFailed', [
                'message' => 'Gagal menyimpan perubahan otomatis'
            ]);
        }
    }

    // Method untuk menghapus thumbnail
    public function removeThumbnail()
    {
        // Delete physical file if it exists and it's a new upload
        if ($this->thumbnail && method_exists($this->thumbnail, 'temporaryUrl')) {
            $this->thumbnail = null;
        } else {
            // For existing thumbnails, we'll mark for deletion on save
            $this->thumbnail = 'DELETE';
        }
        
        // Reset validation errors untuk thumbnail jika ada
        $this->resetValidation('thumbnail');
        
        // Auto-save after thumbnail removal
        if ($this->autoSaveEnabled) {
            $this->autoSaveDraft();
        }
    }

    // Method untuk toggle preview mode
    public function togglePreview()
    {
        $this->previewMode = !$this->previewMode;
    }

    // Auto-generate excerpt dari content jika excerpt kosong
    public function generateExcerpt()
    {
        if (empty($this->article['excerpt']) && !empty($this->article['content'])) {
            $this->article['excerpt'] = Str::limit(strip_tags($this->article['content']), 200);
        }
    }

    // Real-time validation dan auto-save untuk title
    public function updatedArticleTitle()
    {
        $this->validateOnly('article.title');
        
        // Trigger auto-save after title change
        if ($this->autoSaveEnabled) {
            $this->autoSaveDraft();
        }
    }

    // Real-time validation dan auto-save untuk content
    public function updatedArticleContent()
    {
        // Skip validation if content is empty (to avoid issues during typing)
        if (!empty($this->article['content'])) {
            $this->validateOnly('article.content');
        }
        
        // Auto-generate excerpt jika kosong
        if (empty($this->article['excerpt'])) {
            $this->generateExcerpt();
        }
        
        // Trigger auto-save after content change
        if ($this->autoSaveEnabled) {
            $this->autoSaveDraft();
        }
    }

    // Auto-save untuk excerpt
    public function updatedArticleExcerpt()
    {
        if ($this->autoSaveEnabled) {
            $this->autoSaveDraft();
        }
    }

    // Auto-save untuk category
    public function updatedArticleCategoryId()
    {
        if ($this->autoSaveEnabled) {
            $this->autoSaveDraft();
        }
    }

    // Auto-save untuk published_at
    public function updatedArticlePublishedAt()
    {
        if ($this->autoSaveEnabled) {
            $this->autoSaveDraft();
        }
    }

    // Auto-save untuk status
    public function updatedArticleStatus()
    {
        if ($this->autoSaveEnabled) {
            $this->autoSaveDraft();
        }
    }

    // Validation untuk thumbnail dengan error handling yang lebih baik
    public function updatedThumbnail()
    {
        // Reset error sebelumnya
        $this->resetValidation('thumbnail');
        
        if ($this->thumbnail && $this->thumbnail !== 'DELETE') {
            try {
                // Validate file
                $this->validateOnly('thumbnail');
                
                // Check jika file valid dan bisa di-render sebagai temporary URL
                if (method_exists($this->thumbnail, 'temporaryUrl')) {
                    // File valid dan siap untuk preview
                    $this->dispatch('thumbnailUploaded');
                }
            } catch (\Exception $e) {
                // Handle validation error
                $this->addError('thumbnail', 'Terjadi kesalahan saat memproses gambar. Pastikan file adalah gambar yang valid.');
                $this->thumbnail = null;
            }
        }
    }

    // Toggle auto-save
    public function toggleAutoSave()
    {
        $this->autoSaveEnabled = !$this->autoSaveEnabled;
        
        if ($this->autoSaveEnabled) {
            session()->flash('info', 'Auto-save diaktifkan');
            $this->autoSaveDraft(); // Save immediately when enabled
        } else {
            session()->flash('info', 'Auto-save dinonaktifkan');
        }
    }

    // Manual save draft
    public function saveDraft()
    {
        try {
            // Force status to draft for manual draft save
            $originalStatus = $this->article['status'];
            $this->article['status'] = 'draft';
            
            // Use auto-save logic
            $this->autoSaveDraft();
            
            // Restore original status
            $this->article['status'] = $originalStatus;
            
            session()->flash('success', 'Draft berhasil disimpan!');
            
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menyimpan draft: ' . $e->getMessage());
        }
    }

    public function update()
    {
        // Disable auto-save during final save
        $this->autoSaveEnabled = false;
        
        $this->validate();

        try {
            $model = Article::findOrFail($this->article['id']);
            $data = $this->article;

            // Handle thumbnail
            if ($this->thumbnail) {
                if ($this->thumbnail === 'DELETE') {
                    // Delete existing thumbnail
                    if ($model->thumbnail && Storage::disk('public')->exists($model->thumbnail)) {
                        Storage::disk('public')->delete($model->thumbnail);
                    }
                    $data['thumbnail'] = null;
                } elseif (method_exists($this->thumbnail, 'store')) {
                    // New thumbnail uploaded
                    if ($model->thumbnail && Storage::disk('public')->exists($model->thumbnail)) {
                        Storage::disk('public')->delete($model->thumbnail);
                    }
                    
                    $filename = time() . '_' . Str::random(10) . '.' . $this->thumbnail->getClientOriginalExtension();
                    $path = $this->thumbnail->storeAs('articles', $filename, 'public');
                    
                    if (!$path || !Storage::disk('public')->exists($path)) {
                        throw new \Exception('Gagal menyimpan file gambar');
                    }
                    
                    $data['thumbnail'] = $path;
                }
            }

            // Generate auto excerpt if empty
            if (empty($data['excerpt'])) {
                $data['excerpt'] = Str::limit(strip_tags($data['content']), 200);
            }

            // Handle slug generation if title changed
            if ($data['title'] !== $model->title) {
                $data['slug'] = $this->generateUniqueSlug($data['title']);
            }

            // Handle published_at
            if ($data['status'] === 'published' && empty($data['published_at'])) {
                $data['published_at'] = now();
            } elseif ($data['status'] === 'draft') {
                $data['published_at'] = null;
            }

            $model->update($data);

            $message = $data['status'] === 'published' 
                ? 'Artikel berhasil dipublikasikan!' 
                : 'Artikel berhasil diperbarui!';
                
            session()->flash('success', $message);
            
            return redirect()->route('articles');
            
        } catch (\Exception $e) {
            // Log error untuk debugging
            \Log::error('Error updating article: ' . $e->getMessage(), [
                'user_id' => auth()->id(),
                'article_id' => $this->article['id'] ?? 'unknown',
                'error' => $e->getTraceAsString()
            ]);
            
            session()->flash('error', 'Terjadi kesalahan saat memperbarui artikel: ' . $e->getMessage());
            
            // Re-enable auto-save after failed save
            $this->autoSaveEnabled = true;
        }
    }

    // Generate slug yang unik
    private function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        $query = Article::where('slug', $slug);
        
        // Exclude current article from uniqueness check
        if (!empty($this->article['id'])) {
            $query->where('id', '!=', $this->article['id']);
        }

        while ($query->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
            $query = Article::where('slug', $slug);
            
            if (!empty($this->article['id'])) {
                $query->where('id', '!=', $this->article['id']);
            }
        }

        return $slug;
    }

    // Method untuk mendapatkan statistik
    public function getStatsProperty()
    {
        return [
            'title_length' => strlen($this->article['title'] ?? ''),
            'content_length' => strlen($this->article['content'] ?? ''),
            'excerpt_length' => strlen($this->article['excerpt'] ?? ''),
            'estimated_read_time' => $this->estimateReadTime($this->article['content'] ?? ''),
        ];
    }

    // Estimasi waktu baca
    private function estimateReadTime($content)
    {
        $wordCount = str_word_count(strip_tags($content));
        $minutes = ceil($wordCount / 200); // Asumsi 200 kata per menit
        return max(1, $minutes); // Minimal 1 menit
    }

    // Check apakah file thumbnail valid
    public function getThumbnailPreviewProperty()
    {
        if ($this->thumbnail && $this->thumbnail !== 'DELETE') {
            try {
                // Jika thumbnail adalah UploadedFile baru, return temporary URL
                if (method_exists($this->thumbnail, 'temporaryUrl')) {
                    return $this->thumbnail->temporaryUrl();
                }
            } catch (\Exception $e) {
                // Log error dan return null jika ada masalah
                \Log::warning('Error generating new thumbnail preview: ' . $e->getMessage());
            }
        }

        // Jika tidak ada thumbnail baru dan bukan untuk dihapus, return existing
        if ($this->thumbnail !== 'DELETE' && !empty($this->article['thumbnail'])) {
            return asset('storage/' . $this->article['thumbnail']);
        }
        
        return null;
    }

    public function render()
    {
        return view('livewire.articles.update-article', [
            'categories' => $this->categories,
        ]);
    }
}