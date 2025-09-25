{{-- resources/views/livewire/articles/update-article.blade.php --}}
<div class="max-w-6xl mx-auto p-6">
    <flux:heading size="xl" class="mb-8 text-center text-gray-900 dark:text-gray-100">Edit Artikel</flux:heading>
    
    @if (session()->has('success'))
        <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-700 text-green-700 dark:text-green-300 rounded-lg">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-700 text-red-700 dark:text-red-300 rounded-lg">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                {{ session('error') }}
            </div>
        </div>
    @endif
    
    <form wire:submit.prevent="update" class="space-y-6" enctype="multipart/form-data">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Left Column - Main Content --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- Title & Excerpt Card --}}
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 space-y-4">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">📝 Informasi Utama</h3>
                    <flux:input 
                        wire:model.live.debounce.300ms="article.title" 
                        label="Judul Artikel" 
                        placeholder="Masukkan judul yang menarik..."
                        class="text-lg font-medium"
                    />
                    <flux:textarea 
                        wire:model.live.debounce.500ms="article.excerpt" 
                        label="Ringkasan" 
                        rows="3" 
                        placeholder="Tulis ringkasan singkat artikel Anda..."
                    />
                </div>

                {{-- Content Card dengan Summernote --}}
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">📄 Konten Artikel</h3>
                    
                    {{-- Hidden input untuk sync dengan Livewire --}}
                    <input type="hidden" wire:model="article.content" id="hidden-content-update">
                    
                    {{-- Summernote textarea --}}
                    <div wire:ignore>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Konten</label>
                        <textarea 
                            id="summernote-content-update"
                            class="summernote-update"
                            placeholder="Tulis konten artikel Anda di sini..."
                            style="display: none;"
                        >{!! $article['content'] ?? '' !!}</textarea>
                    </div>
                    
                    {{-- Auto-save indicator dan kontrol --}}
                    <div class="mt-2 flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="text-sm text-gray-500 dark:text-gray-400" id="save-status-update">
                                <span class="hidden" id="save-saving-update">
                                    <i class="fas fa-spinner fa-spin mr-1"></i> Menyimpan...
                                </span>
                                <span class="hidden" id="save-saved-update">
                                    <i class="fas fa-check text-green-500 mr-1"></i> Tersimpan otomatis
                                </span>
                                <span class="hidden" id="save-error-update">
                                    <i class="fas fa-exclamation-triangle text-red-500 mr-1"></i> Gagal menyimpan
                                </span>
                            </div>
                            
                            {{-- Auto-save toggle --}}
                            <label class="flex items-center cursor-pointer">
                                <input 
                                    type="checkbox" 
                                    wire:model.live="autoSaveEnabled"
                                    class="sr-only"
                                >
                                <div class="relative">
                                    <div class="block bg-gray-600 dark:bg-gray-400 w-10 h-6 rounded-full transition-colors duration-200 {{ $autoSaveEnabled ? 'bg-blue-500' : '' }}"></div>
                                    <div class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform duration-200 transform {{ $autoSaveEnabled ? 'translate-x-4' : '' }}"></div>
                                </div>
                                <span class="ml-2 text-xs text-gray-600 dark:text-gray-400">Auto-save</span>
                            </label>
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            {{-- Manual save draft button --}}
                            <button 
                                type="button"
                                wire:click="saveDraft"
                                class="text-xs px-3 py-1 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-600 dark:text-gray-400 rounded-full transition-colors"
                            >
                                💾 Simpan Draft
                            </button>
                            
                            <div class="text-xs text-gray-400">
                                Terakhir diperbarui: <span id="last-updated-update">-</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Statistics & Settings Row --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Statistics Card --}}
                    <div class="bg-gradient-to-br from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-xl border border-purple-200 dark:border-purple-700 p-6">
                        <h3 class="text-lg font-semibold text-purple-800 dark:text-purple-300 mb-4">📊 Statistik</h3>
                        <div class="grid grid-cols-2 gap-3 text-sm">
                            <div class="bg-white dark:bg-gray-800 rounded-lg p-3 text-center">
                                <div class="text-purple-600 dark:text-purple-400 font-bold text-lg">{{ $this->stats['title_length'] }}</div>
                                <div class="text-gray-600 dark:text-gray-400 text-xs">Karakter Judul</div>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-lg p-3 text-center">
                                <div class="text-purple-600 dark:text-purple-400 font-bold text-lg">{{ $this->stats['content_length'] }}</div>
                                <div class="text-gray-600 dark:text-gray-400 text-xs">Karakter Konten</div>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-lg p-3 text-center">
                                <div class="text-purple-600 dark:text-purple-400 font-bold text-lg">{{ $this->stats['estimated_read_time'] }}</div>
                                <div class="text-gray-600 dark:text-gray-400 text-xs">Menit Baca</div>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-lg p-3 text-center">
                                <div class="text-purple-600 dark:text-purple-400 font-bold text-lg">{{ $this->stats['excerpt_length'] }}</div>
                                <div class="text-gray-600 dark:text-gray-400 text-xs">Karakter Excerpt</div>
                            </div>
                        </div>
                    </div>

                    {{-- Article Settings Card --}}
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">⚙️ Pengaturan</h3>
                        <div class="space-y-4">
                            <flux:select wire:model.live="article.category_id" label="📁 Kategori">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </flux:select>

                            <flux:input 
                                type="date" 
                                wire:model.live="article.published_at" 
                                label="📅 Tanggal Publikasi" 
                            />

                            <flux:select wire:model.live="article.status" label="🔄 Status">
                                <option value="draft">📝 Draft</option>
                                <option value="published">🚀 Published</option>
                            </flux:select>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Column - Thumbnail & Preview --}}
            <div class="space-y-6 lg:sticky lg:top-6 lg:self-start">
                {{-- Thumbnail Upload Card --}}
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">🖼️ Thumbnail</h3>
                    
                    {{-- Current or New Thumbnail Preview --}}
                    @if ($thumbnail || !empty($article['thumbnail']))
                        <div class="mb-4">
                            <div class="relative group">
                                @if ($thumbnail && $thumbnail !== 'DELETE')
                                    {{-- New uploaded thumbnail --}}
                                    <div class="w-full h-40 bg-gray-100 dark:bg-gray-700 rounded-lg border-2 border-gray-200 dark:border-gray-600 overflow-hidden">
                                        <img 
                                            src="{{ $this->thumbnailPreview }}" 
                                            alt="New Preview" 
                                            class="w-full h-full object-cover"
                                            onload="this.style.opacity='1'"
                                            onerror="this.parentElement.innerHTML='<div class=\'flex items-center justify-center h-full text-gray-500 dark:text-gray-400\'><svg class=\'w-8 h-8\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path fill-rule=\'evenodd\' d=\'M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z\' clip-rule=\'evenodd\'/></svg><span class=\'ml-2\'>Gagal memuat gambar</span></div>'"
                                            style="opacity: 0; transition: opacity 0.3s ease-in-out;"
                                        >
                                    </div>
                                    <div class="mt-2 text-center">
                                        <span class="inline-block bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300 text-xs px-2 py-1 rounded-full">
                                            🆕 Gambar Baru
                                        </span>
                                    </div>
                                @elseif (!empty($article['thumbnail']) && $thumbnail !== 'DELETE')
                                    {{-- Current thumbnail --}}
                                    <img 
                                        src="{{ $this->thumbnailPreview }}" 
                                        alt="Current Preview" 
                                        class="w-full h-40 object-cover rounded-lg border-2 border-gray-200 dark:border-gray-600 bg-white"
                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
                                    >
                                    <div class="hidden w-full h-40 bg-gray-100 dark:bg-gray-700 rounded-lg border-2 border-gray-200 dark:border-gray-600 flex items-center justify-center">
                                        <div class="text-center text-gray-500 dark:text-gray-400">
                                            <svg class="mx-auto w-8 h-8 mb-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                                            </svg>
                                            <p class="text-sm">Gagal memuat gambar</p>
                                        </div>
                                    </div>
                                    <div class="mt-2 text-center">
                                        <span class="inline-block bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300 text-xs px-2 py-1 rounded-full">
                                            📷 Gambar Saat Ini
                                        </span>
                                    </div>
                                @endif
                                
                                {{-- Remove button overlay --}}
                                @if (($thumbnail && $thumbnail !== 'DELETE') || (!empty($article['thumbnail']) && $thumbnail !== 'DELETE'))
                                <div class="absolute inset-0 group-hover:bg-black group-hover:bg-opacity-20 transition-all duration-200 rounded-lg flex items-center justify-center">
                                    <button 
                                        type="button"
                                        wire:click="removeThumbnail"
                                        class="opacity-0 group-hover:opacity-100 bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-full text-sm transition-all duration-200 shadow-lg"
                                    >
                                        ✕ Hapus
                                    </button>
                                </div>
                                @endif
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2 text-center truncate">
                                @if ($thumbnail && method_exists($thumbnail, 'getClientOriginalName'))
                                    {{ $thumbnail->getClientOriginalName() }}
                                @elseif (!empty($article['thumbnail']))
                                    {{ basename($article['thumbnail']) }}
                                @endif
                            </p>
                        </div>
                    @else
                        <div class="mb-4 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-6 text-center bg-gray-50 dark:bg-gray-700/50">
                            <svg class="mx-auto h-10 w-10 text-gray-400 dark:text-gray-500" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="text-gray-500 dark:text-gray-400 text-sm mt-2">Belum ada gambar</p>
                            <p class="text-gray-400 dark:text-gray-500 text-xs mt-1">Upload gambar untuk thumbnail artikel</p>
                        </div>
                    @endif
                    
                    <flux:input 
                        type="file" 
                        wire:model="thumbnail" 
                        label="Ganti Thumbnail (Opsional)"
                        accept="image/*"
                    />
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Format: JPG, PNG, WebP. Max: 2MB</p>
                    
                    @if (!empty($article['thumbnail']) && !$thumbnail)
                        <p class="text-xs text-gray-600 dark:text-gray-400 mt-2 bg-blue-50 dark:bg-blue-900/20 p-2 rounded border border-blue-200 dark:border-blue-700">
                            💡 <strong>Info:</strong> Gambar akan tetap sama jika tidak mengganti thumbnail baru
                        </p>
                    @endif
                    
                    {{-- Loading indicator --}}
                    <div wire:loading wire:target="thumbnail" class="mt-2">
                        <div class="flex items-center text-blue-600 dark:text-blue-400 text-sm">
                            <svg class="animate-spin -ml-1 mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Mengunggah gambar...
                        </div>
                    </div>
                </div>

                {{-- Article Preview Card --}}
                @if (!empty($article['title']))
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-xl border border-blue-200 dark:border-blue-700 p-6">
                    <h3 class="text-lg font-semibold text-blue-800 dark:text-blue-300 mb-4">👀 Preview</h3>
                    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm border border-gray-200 dark:border-gray-700">
                        @if ($this->thumbnailPreview)
                            <div class="mb-3">
                                <img src="{{ $this->thumbnailPreview }}" alt="Preview" class="w-full h-28 object-cover rounded">
                            </div>
                        @endif
                        <h4 class="font-bold text-gray-800 dark:text-gray-200 text-sm mb-2 line-clamp-2">{{ $article['title'] ?? '' }}</h4>
                        @if (!empty($article['excerpt']))
                            <p class="text-gray-600 dark:text-gray-400 text-xs mb-2 line-clamp-3">{{ $article['excerpt'] }}</p>
                        @endif
                        <div class="flex items-center justify-between text-xs text-gray-500 dark:text-gray-400">
                            <span class="bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded-full">
                                {{ ($article['status'] ?? 'draft') === 'published' ? '🚀 Published' : '📝 Draft' }}
                            </span>
                            @if (!empty($article['published_at']))
                                <span>{{ \Carbon\Carbon::parse($article['published_at'])->format('d M Y') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                @endif

                {{-- Action Buttons --}}
                <div class="space-y-3">
                    <flux:button 
                        type="submit" 
                        variant="primary" 
                        class="w-full bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 dark:from-green-600 dark:to-emerald-700 dark:hover:from-green-700 dark:hover:to-emerald-800 text-white font-semibold py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-200"
                    >
                        <span class="flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                            </svg>
                            <span wire:loading.remove wire:target="update">
                                {{ ($article['status'] ?? 'draft') === 'published' ? 'Update & Publikasikan' : 'Update Artikel' }}
                            </span>
                            <span wire:loading wire:target="update" class="flex items-center">
                                <svg class="animate-spin -ml-1 mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Memperbarui...
                            </span>
                        </span>
                    </flux:button>
                    
                    <button 
                        type="button"
                        onclick="window.history.back()"
                        class="w-full bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-medium py-3 rounded-lg transition-all duration-200"
                    >
                        <span class="flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Kembali
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

@script
<script type="text/javascript">
    let summernoteUpdateInitialized = false;
    let autoSaveTimerUpdate = null;
    let lastContentUpdate = '';

    // Fungsi untuk inisialisasi Summernote untuk halaman update
    function initializeSummernoteUpdate() {
        if (summernoteUpdateInitialized) {
            return;
        }

        $('#summernote-content-update').summernote({
            height: 400,
            placeholder: 'Tulis konten artikel Anda di sini...',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video', 'hr']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            styleTags: [
                'p',
                { title: 'Blockquote', tag: 'blockquote', className: 'blockquote', value: 'blockquote' },
                'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
            ],
            callbacks: {
                onChange: function(contents, $editable) {
                    // Update hidden input untuk sinkronisasi dengan Livewire
                    $('#hidden-content-update').val(contents).trigger('input');
                    
                    // Clear existing timer
                    if (autoSaveTimerUpdate) {
                        clearTimeout(autoSaveTimerUpdate);
                    }
                    
                    // Show saving indicator jika auto-save enabled
                    if (@this.autoSaveEnabled) {
                        showSaveStatusUpdate('saving');
                        
                        // Set auto-save timer
                        autoSaveTimerUpdate = setTimeout(function() {
                            if (contents !== lastContentUpdate) {
                                lastContentUpdate = contents;
                                // Trigger auto-save via Livewire method
                                @this.call('autoSaveDraft').then(() => {
                                    showSaveStatusUpdate('saved');
                                    updateLastUpdatedUpdate();
                                }).catch(() => {
                                    showSaveStatusUpdate('error');
                                });
                            }
                        }, 2000); // Auto-save setelah 2 detik tidak ada perubahan
                    }
                },
                onInit: function() {
                    // Set initial content dari Livewire property
                    const initialContent = @this.get('article.content') || '';
                    if (initialContent && initialContent !== $(this).summernote('code')) {
                        $(this).summernote('code', initialContent);
                    }
                    lastContentUpdate = initialContent;
                },
                onFocus: function() {
                    // Pastikan sinkronisasi saat focus
                    const currentContent = $(this).summernote('code');
                    $('#hidden-content-update').val(currentContent);
                },
                onBlur: function() {
                    // Langsung sync saat blur
                    const currentContent = $(this).summernote('code');
                    @this.set('article.content', currentContent);
                    lastContentUpdate = currentContent;
                }
            }
        });

        summernoteUpdateInitialized = true;
        console.log('Summernote Update initialized successfully');
    }

    // Fungsi untuk menampilkan status auto-save
    function showSaveStatusUpdate(status) {
        // Hide all status indicators
        $('#save-saving-update, #save-saved-update, #save-error-update').addClass('hidden');
        
        // Show specific status
        if (status === 'saving') {
            $('#save-saving-update').removeClass('hidden');
        } else if (status === 'saved') {
            $('#save-saved-update').removeClass('hidden');
            
            // Hide saved status after 3 seconds
            setTimeout(() => {
                $('#save-saved-update').addClass('hidden');
            }, 3000);
        } else if (status === 'error') {
            $('#save-error-update').removeClass('hidden');
            
            // Hide error status after 5 seconds
            setTimeout(() => {
                $('#save-error-update').addClass('hidden');
            }, 5000);
        }
    }

    // Fungsi untuk update timestamp terakhir diperbarui
    function updateLastUpdatedUpdate() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('id-ID', { 
            hour: '2-digit', 
            minute: '2-digit',
            second: '2-digit'
        });
        $('#last-updated-update').text(timeString);
    }

    // Fungsi untuk me-refresh Summernote content dari Livewire
    function refreshSummernoteContentUpdate() {
        if (summernoteUpdateInitialized) {
            const livewireContent = @this.get('article.content') || '';
            const currentContent = $('#summernote-content-update').summernote('code');
            
            // Hanya update jika konten berbeda dan tidak sedang difokuskan
            if (livewireContent !== currentContent && !$('#summernote-content-update').summernote('editor').hasFocus) {
                $('#summernote-content-update').summernote('code', livewireContent);
                lastContentUpdate = livewireContent;
            }
        }
    }

    // Event listeners untuk update page
    $(document).ready(function() {
        // Initialize Summernote saat document ready
        initializeSummernoteUpdate();
        
        // Update timestamp initial
        updateLastUpdatedUpdate();
        
        // Listen untuk perubahan dari Livewire
        window.addEventListener('livewire:updated', function() {
            // Re-initialize jika belum ada atau Summernote hilang
            if (!summernoteUpdateInitialized || !$('#summernote-content-update').hasClass('note-editable')) {
                console.log('Re-initializing Summernote Update after Livewire update');
                summernoteUpdateInitialized = false;
                initializeSummernoteUpdate();
            } else {
                // Refresh content dari Livewire jika perlu
                refreshSummernoteContentUpdate();
            }
        });

        // Listen untuk Livewire events dari controller
        window.addEventListener('draftAutoSaved', function(event) {
            showSaveStatusUpdate('saved');
            updateLastUpdatedUpdate();
            console.log('Auto-save successful:', event.detail);
        });

        window.addEventListener('draftAutoSaveFailed', function(event) {
            showSaveStatusUpdate('error');
            console.log('Auto-save failed:', event.detail);
        });

        window.addEventListener('thumbnailUploaded', function() {
            console.log('Thumbnail uploaded successfully');
        });
        
        // Handle window beforeunload untuk menyimpan draft
        window.addEventListener('beforeunload', function(e) {
            if (summernoteUpdateInitialized) {
                const currentContent = $('#summernote-content-update').summernote('code');
                if (currentContent !== lastContentUpdate) {
                    // Attempt to save
                    @this.set('article.content', currentContent);
                    
                    // Show warning
                    e.preventDefault();
                    e.returnValue = 'Anda memiliki perubahan yang belum tersimpan. Yakin ingin meninggalkan halaman?';
                    return e.returnValue;
                }
            }
        });

        // Keyboard shortcuts
        $(document).on('keydown', function(e) {
            // Ctrl+S untuk save
            if (e.ctrlKey && e.which === 83) {
                e.preventDefault();
                if (summernoteUpdateInitialized) {
                    const currentContent = $('#summernote-content-update').summernote('code');
                    @this.set('article.content', currentContent);
                    @this.call('saveDraft').then(() => {
                        showSaveStatusUpdate('saved');
                        updateLastUpdatedUpdate();
                    });
                }
            }
        });

        // Handle auto-save toggle changes
        window.addEventListener('livewire:commit', function(event) {
            if (event.component.fingerprint.name === 'articles.update-article') {
                // Clear any pending auto-save timers when auto-save is disabled
                if (!@this.autoSaveEnabled && autoSaveTimerUpdate) {
                    clearTimeout(autoSaveTimerUpdate);
                    autoSaveTimerUpdate = null;
                }
            }
        });
    });

    // Expose functions to global scope for debugging
    window.summernoteUpdateHelpers = {
        reinitialize: function() {
            summernoteUpdateInitialized = false;
            initializeSummernoteUpdate();
        },
        getContent: function() {
            return $('#summernote-content-update').summernote('code');
        },
        setContent: function(content) {
            $('#summernote-content-update').summernote('code', content);
        },
        syncToLivewire: function() {
            const content = $('#summernote-content-update').summernote('code');
            @this.set('article.content', content);
        },
        triggerAutoSave: function() {
            @this.call('autoSaveDraft');
        },
        getAutoSaveStatus: function() {
            return @this.autoSaveEnabled;
        }
    };
</script>
@endscript