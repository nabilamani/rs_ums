<?php
// app/Livewire/Articles/CreateArticle.php

namespace App\Livewire\Articles;

use App\Models\Article;
use App\Models\CategoryArticle;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class CreateArticle extends Component
{
    use WithFileUploads;

    public $title, $excerpt, $content;
    public $category_id, $published_at, $status = 'draft';
    public $thumbnail;
    public $author_id;
    
    // Properties untuk auto-save dan draft management
    public $isDraftSaved = false;
    public $autoSaveEnabled = true;
    public $draftId = null;
    
    // Properties untuk preview
    public $previewMode = false;

    public function mount($draftId = null)
    {
        // Set default published_at to today
        $this->published_at = Carbon::now()->format('Y-m-d');
        
        // Load existing draft if provided
        if ($draftId) {
            $this->loadDraft($draftId);
        }
        
        // Set author_id
        $this->author_id = auth()->id();
    }

    protected function rules()
    {
        return [
            'title'        => 'required|string|max:255',
            'excerpt'      => 'nullable|string|max:500',
            'content'      => 'required|string',
            'category_id'  => 'nullable|exists:category_articles,id',
            'published_at' => 'nullable|date',
            'status'       => 'required|in:draft,published',
            'thumbnail'    => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048', // max 2MB, specific formats
        ];
    }

    protected $messages = [
        'title.required' => 'Judul artikel wajib diisi.',
        'title.max' => 'Judul tidak boleh lebih dari 255 karakter.',
        'content.required' => 'Konten artikel wajib diisi.',
        'excerpt.max' => 'Ringkasan tidak boleh lebih dari 500 karakter.',
        'thumbnail.image' => 'File harus berupa gambar.',
        'thumbnail.mimes' => 'Format gambar harus JPEG, JPG, PNG, atau WebP.',
        'thumbnail.max' => 'Ukuran gambar maksimal 2MB.',
        'category_id.exists' => 'Kategori yang dipilih tidak valid.',
        'published_at.date' => 'Format tanggal tidak valid.',
        'status.in' => 'Status harus draft atau published.',
    ];

    // Load existing draft
    private function loadDraft($draftId)
    {
        $draft = Article::where('id', $draftId)
                       ->where('author_id', auth()->id())
                       ->where('status', 'draft')
                       ->first();
        
        if ($draft) {
            $this->draftId = $draft->id;
            $this->title = $draft->title;
            $this->excerpt = $draft->excerpt;
            $this->content = $draft->content;
            $this->category_id = $draft->category_id;
            $this->published_at = $draft->published_at ? $draft->published_at->format('Y-m-d') : Carbon::now()->format('Y-m-d');
            $this->status = $draft->status;
            $this->thumbnail = $draft->thumbnail;
            $this->isDraftSaved = true;
        }
    }

    // Auto-save draft functionality
    public function autoSaveDraft()
    {
        if (!$this->autoSaveEnabled || empty($this->title) && empty($this->content)) {
            return;
        }

        try {
            $data = [
                'title' => $this->title ?: 'Draft - ' . now()->format('Y-m-d H:i:s'),
                'excerpt' => $this->excerpt,
                'content' => $this->content,
                'slug' => $this->generateUniqueSlug($this->title ?: 'draft-' . now()->timestamp),
                'category_id' => $this->category_id ?: null,
                'published_at' => null, // Auto-save always keeps as null
                'status' => 'draft',
                'author_id' => auth()->id(),
            ];

            // Handle thumbnail for existing draft
            if (is_string($this->thumbnail)) {
                $data['thumbnail'] = $this->thumbnail;
            }

            if ($this->draftId) {
                // Update existing draft
                $draft = Article::find($this->draftId);
                if ($draft && $draft->author_id === auth()->id()) {
                    $draft->update($data);
                    $this->isDraftSaved = true;
                }
            } else {
                // Create new draft
                $draft = Article::create($data);
                $this->draftId = $draft->id;
                $this->isDraftSaved = true;
            }

            // Dispatch browser event to show save status
            $this->dispatch('draftAutoSaved', [
                'message' => 'Draft tersimpan otomatis',
                'time' => now()->format('H:i:s')
            ]);

        } catch (\Exception $e) {
            \Log::error('Auto-save failed: ' . $e->getMessage(), [
                'user_id' => auth()->id(),
                'draft_id' => $this->draftId ?? 'new'
            ]);
            
            $this->dispatch('draftAutoSaveFailed', [
                'message' => 'Gagal menyimpan draft otomatis'
            ]);
        }
    }

    // Method untuk menghapus thumbnail
    public function removeThumbnail()
    {
        // Delete physical file if it exists
        if (is_string($this->thumbnail) && file_exists(storage_path('app/public/' . $this->thumbnail))) {
            unlink(storage_path('app/public/' . $this->thumbnail));
        }
        
        $this->thumbnail = null;
        
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
        if (empty($this->excerpt) && !empty($this->content)) {
            $this->excerpt = Str::limit(strip_tags($this->content), 200);
        }
    }

    // Real-time validation dan auto-save untuk title
    public function updatedTitle()
    {
        $this->validateOnly('title');
        
        // Trigger auto-save after title change
        if ($this->autoSaveEnabled) {
            $this->autoSaveDraft();
        }
    }

    // Real-time validation dan auto-save untuk content
    public function updatedContent()
    {
        // Skip validation if content is empty (to avoid issues during typing)
        if (!empty($this->content)) {
            $this->validateOnly('content');
        }
        
        // Auto-generate excerpt jika kosong
        if (empty($this->excerpt)) {
            $this->generateExcerpt();
        }
        
        // Trigger auto-save after content change
        if ($this->autoSaveEnabled) {
            $this->autoSaveDraft();
        }
    }

    // Auto-save untuk excerpt
    public function updatedExcerpt()
    {
        if ($this->autoSaveEnabled) {
            $this->autoSaveDraft();
        }
    }

    // Auto-save untuk category
    public function updatedCategoryId()
    {
        if ($this->autoSaveEnabled) {
            $this->autoSaveDraft();
        }
    }

    // Auto-save untuk published_at
    public function updatedPublishedAt()
    {
        if ($this->autoSaveEnabled) {
            $this->autoSaveDraft();
        }
    }

    // Auto-save untuk status
    public function updatedStatus()
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
        
        if ($this->thumbnail) {
            try {
                // Validate file
                $this->validateOnly('thumbnail');
                
                // Check jika file valid dan bisa di-render sebagai temporary URL
                if (method_exists($this->thumbnail, 'temporaryUrl')) {
                    // File valid dan siap untuk preview
                    $this->dispatch('thumbnailUploaded');
                    
                    // Auto-save after thumbnail upload
                    if ($this->autoSaveEnabled) {
                        $this->saveThumbnailToDraft();
                    }
                }
            } catch (\Exception $e) {
                // Handle validation error
                $this->addError('thumbnail', 'Terjadi kesalahan saat memproses gambar. Pastikan file adalah gambar yang valid.');
                $this->thumbnail = null;
            }
        }
    }

    // Save thumbnail to draft immediately
    private function saveThumbnailToDraft()
    {
        if (!$this->thumbnail || !method_exists($this->thumbnail, 'store')) {
            return;
        }

        try {
            // Pastikan directory exists
            if (!file_exists(storage_path('app/public/articles'))) {
                mkdir(storage_path('app/public/articles'), 0755, true);
            }
            
            // Generate nama file yang unik
            $filename = 'draft_' . time() . '_' . Str::random(10) . '.' . $this->thumbnail->getClientOriginalExtension();
            
            // Simpan ke storage/app/public/articles
            $path = $this->thumbnail->storeAs('articles', $filename, 'public');
            
            // Verify file was saved
            if ($path && file_exists(storage_path('app/public/' . $path))) {
                // Update thumbnail path
                $oldThumbnail = $this->thumbnail;
                $this->thumbnail = $path;
                
                // Save to draft
                $this->autoSaveDraft();
                
                // Clean up old thumbnail if it was a string (previous save)
                if (is_string($oldThumbnail) && $oldThumbnail !== $path) {
                    $oldPath = storage_path('app/public/' . $oldThumbnail);
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }
            }
        } catch (\Exception $e) {
            \Log::error('Failed to save thumbnail to draft: ' . $e->getMessage());
            $this->addError('thumbnail', 'Gagal menyimpan gambar ke draft.');
        }
    }

    // Toggle auto-save
    public function toggleAutoSave()
    {
        $this->autoSaveEnabled = !$this->autoSaveEnabled;
        
        if ($this->autoSaveEnabled) {
            session()->flash('info', '✅ Auto-save diaktifkan');
            $this->autoSaveDraft(); // Save immediately when enabled
        } else {
            session()->flash('info', '⏸️ Auto-save dinonaktifkan');
        }
    }

    // Manual save draft
    public function saveDraft()
    {
        // Temporarily disable auto-save to prevent conflicts
        $autoSaveWasEnabled = $this->autoSaveEnabled;
        $this->autoSaveEnabled = false;
        
        try {
            // Validate required fields for draft
            $this->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
            ]);
            
            // Force status to draft for manual draft save
            $originalStatus = $this->status;
            $this->status = 'draft';
            
            // Use auto-save logic
            $this->autoSaveDraft();
            
            // Restore original status
            $this->status = $originalStatus;
            
            session()->flash('success', 'Draft berhasil disimpan!');
            
        } catch (\Exception $e) {
            session()->flash('error', '❌ Gagal menyimpan draft: ' . $e->getMessage());
        } finally {
            // Restore auto-save setting
            $this->autoSaveEnabled = $autoSaveWasEnabled;
        }
    }

    public function save()
    {
        // Disable auto-save during final save
        $this->autoSaveEnabled = false;
        
        $this->validate();

        try {
            $path = null;
            
            // Handle thumbnail upload for final save
            if ($this->thumbnail && method_exists($this->thumbnail, 'store')) {
                // Fresh upload for final save
                $filename = time() . '_' . Str::random(10) . '.' . $this->thumbnail->getClientOriginalExtension();
                $path = $this->thumbnail->storeAs('articles', $filename, 'public');
                
                if (!$path || !file_exists(storage_path('app/public/' . $path))) {
                    throw new \Exception('Gagal menyimpan file gambar');
                }
            } elseif (is_string($this->thumbnail)) {
                // Use existing thumbnail path
                $path = $this->thumbnail;
            }

            $articleData = [
                'title'        => $this->title,
                'excerpt'      => $this->excerpt ?: Str::limit(strip_tags($this->content), 200),
                'content'      => $this->content,
                'slug'         => $this->generateUniqueSlug($this->title),
                'category_id'  => $this->category_id ?: null,
                'published_at' => $this->status === 'published' ? ($this->published_at ?: now()) : null,
                'status'       => $this->status,
                'thumbnail'    => $path,
                'author_id'    => auth()->id(),
            ];

            if ($this->draftId) {
                // Update existing draft
                $article = Article::find($this->draftId);
                if ($article && $article->author_id === auth()->id()) {
                    $article->update($articleData);
                } else {
                    throw new \Exception('Draft tidak ditemukan atau Anda tidak memiliki akses.');
                }
            } else {
                // Create new article
                $article = Article::create($articleData);
            }

            // Flash message dengan emoji yang sesuai
            $message = $this->status === 'published' 
                ? 'Artikel berhasil dipublikasikan!' 
                : 'Artikel berhasil disimpan sebagai draft!';
                
            session()->flash('success', $message);
            
            return redirect()->route('articles');
            
        } catch (\Exception $e) {
            // Log error untuk debugging
            \Log::error('Error creating article: ' . $e->getMessage(), [
                'user_id' => auth()->id(),
                'title' => $this->title,
                'draft_id' => $this->draftId,
                'error' => $e->getTraceAsString()
            ]);
            
            session()->flash('error', '❌ Terjadi kesalahan saat menyimpan artikel: ' . $e->getMessage());
            
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
        
        // Exclude current draft from uniqueness check
        if ($this->draftId) {
            $query->where('id', '!=', $this->draftId);
        }

        while ($query->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
            $query = Article::where('slug', $slug);
            
            if ($this->draftId) {
                $query->where('id', '!=', $this->draftId);
            }
        }

        return $slug;
    }

    // Method untuk mendapatkan statistik
    public function getStatsProperty()
    {
        return [
            'title_length' => strlen($this->title ?? ''),
            'content_length' => strlen($this->content ?? ''),
            'excerpt_length' => strlen($this->excerpt ?? ''),
            'estimated_read_time' => $this->estimateReadTime($this->content ?? ''),
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
        if (!$this->thumbnail) {
            return null;
        }

        try {
            if (is_string($this->thumbnail)) {
                // Jika thumbnail adalah string (path), return asset URL
                return asset('storage/' . $this->thumbnail);
            }
            
            // Jika thumbnail adalah UploadedFile, return temporary URL
            if (method_exists($this->thumbnail, 'temporaryUrl')) {
                return $this->thumbnail->temporaryUrl();
            }
            
            return null;
        } catch (\Exception $e) {
            // Log error dan return null jika ada masalah
            \Log::warning('Error generating thumbnail preview: ' . $e->getMessage());
            return null;
        }
    }

    // Clean up on component destruction
    public function __destruct()
    {
        // This method will be called when component is destroyed
        // Could be used for cleanup if needed
    }

    public function render()
    {
        return view('livewire.articles.create-article', [
            'categories' => CategoryArticle::orderBy('name')->get(),
        ]);
    }
}