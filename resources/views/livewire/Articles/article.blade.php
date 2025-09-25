<div class="mx-auto p-6 space-y-8">
    {{-- Notifikasi --}}
    @if (session('errors'))
        <livewire:components.notification :variant="'errors'" :message="session('errors')" />
    @elseif (session('success'))
        <livewire:components.notification :variant="'success'" :message="session('success')" />
    @endif

    {{-- Header Section --}}
    <div
        class="bg-gradient-to-r from-slate-50 to-zinc-50 dark:from-slate-900/20 dark:to-zinc-900/20 rounded-2xl p-8 border border-slate-100 dark:border-slate-800">
        <div class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-10 h-10 bg-accent rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white dark:text-accent-foreground" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    <flux:heading size="xl" class="text-slate-900 dark:text-slate-100">Daftar Artikel
                    </flux:heading>
                </div>
                <flux:subheading class="text-slate-600 dark:text-slate-400">
                    Kelola konten artikel dan pantau performa publikasi Anda
                </flux:subheading>
                <div class="flex items-center gap-4 mt-3 text-sm text-slate-500 dark:text-slate-400">
                    <span class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ $countPublished }} Published
                    </span>
                    <span class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ $countDraft }} Draft
                    </span>
                    <span class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                            <path fill-rule="evenodd"
                                d="M4 5a2 2 0 012-2v1a2 2 0 002 2h2a2 2 0 002-2V3a2 2 0 012 2v6h-3a4 4 0 00-8 0H4V5zm8 8a2 2 0 10-4 0h4z"
                                clip-rule="evenodd" />
                        </svg>
                        Total {{ $countTotal }}
                    </span>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-3">
                <a href="{{ route('articles.create') }}" wire:navigate>
                    <flux:button variant="primary"
                        class="w-full sm:w-auto bg-accent hover:bg-accent/90 ">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Artikel
                    </flux:button>
                </a>
            </div>
        </div>
    </div>

    {{-- Articles Grid --}}
    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @forelse ($articles as $article)
            <article
                class="group relative rounded-xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 
           shadow-md hover:shadow-xl hover:-translate-y-0.5">

                {{-- Thumbnail --}}
                <div class="relative aspect-[5/3] overflow-hidden rounded-t-lg">
                    @if ($article->thumbnail)
                        <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                        {{-- Overlay pojok kiri atas saat dark mode --}}
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-black/30 to-transparent dark:from-black/50 dark:to-transparent">
                        </div>
                    @else
                        {{-- Fallback icon --}}
                        <div class="flex items-center justify-center w-full h-full text-slate-400 dark:text-slate-500">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    @endif

                    {{-- Status Badge --}}
                    <div class="absolute top-2 left-2">
                        @if ($article->status === 'published')
                            <span
                                class="inline-flex items-center px-1.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300">
                                <div class="w-1 h-1 bg-green-400 rounded-full mr-1"></div>
                                Published
                            </span>
                        @else
                            <span
                                class="inline-flex items-center px-1.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300">
                                <div class="w-1 h-1 bg-yellow-400 rounded-full mr-1"></div>
                                Draft
                            </span>
                        @endif
                    </div>
                </div>


                {{-- Content --}}
                <div class="p-5">
                    <div class="flex items-center justify-between mb-2">
                        @if ($article->category)
                            <span
                                class="inline-flex items-center px-1.5 py-0.5 rounded text-xs font-medium bg-blue-50 text-blue-700 dark:bg-blue-900/30 dark:text-blue-300">
                                {{ $article->category->name }}
                            </span>
                        @endif
                        <span class="text-xs text-slate-500 dark:text-slate-400">
                            {{ $article->updated_at->format('d M Y') }}
                        </span>
                    </div>

                    <h3
                        class="font-medium text-slate-900 dark:text-slate-100 mb-2 group-hover:text-slate-700 dark:group-hover:text-accent text-sm line-clamp-2">
                        {{ $article->title }}
                    </h3>

                    @if ($article->excerpt)
                        <p class="text-slate-600 dark:text-slate-400 text-xs mb-3 line-clamp-2">
                            {{ Str::limit($article->excerpt, 80) }}
                        </p>
                    @endif

                    {{-- Stats --}}
                    <div class="flex items-center gap-3 mb-3 text-xs text-slate-500 dark:text-slate-400">
                        <span class="flex items-center gap-1">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ str_word_count(strip_tags($article->content)) }} karakter 
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ ceil(str_word_count(strip_tags($article->content)) / 200) }}m baca
                        </span>
                    </div>

                    {{-- Actions --}}
                    <div class="flex gap-1.5">
                        <flux:button size="sm" variant="outline"
                            href="{{ route('articles.update', $article->slug) }}" wire:navigate
                            class="flex-1 text-xs border-slate-300 text-slate-700 hover:bg-slate-50 dark:border-slate-600 dark:text-slate-300 dark:hover:bg-slate-700/50 dark:hover:border-accent/50">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </flux:button>

                        <flux:button size="sm" variant="danger" wire:click="confirmDelete({{ $article->id }})"
                            class="px-2">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </flux:button>
                    </div>
                </div>
            </article>
        @empty
            <div class="col-span-full">
                <div
                    class="text-center py-12 bg-slate-50 dark:bg-slate-800/50 rounded-xl border-2 border-dashed border-slate-300 dark:border-slate-600">
                    <svg class="mx-auto h-12 w-12 text-slate-400 dark:text-slate-500 mb-3" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                    <h3 class="text-lg font-medium text-slate-900 dark:text-slate-100 mb-2">Belum ada artikel</h3>
                    <p class="text-slate-500 dark:text-slate-400 mb-4">Mulai dengan membuat artikel pertama Anda</p>
                    <a href="{{ route('articles.create') }}" wire:navigate>
                        <flux:button variant="primary"
                            class="bg-slate-700 hover:bg-slate-800 dark:bg-accent dark:hover:bg-accent/90 dark:text-accent-foreground">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            Buat Artikel Pertama
                        </flux:button>
                    </a>
                </div>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $articles->links() }}
    </div>

    {{-- Modal Delete --}}
    <flux:modal name="deleteArticle" class="md:w-[28rem]">
        <div class="space-y-6 p-2">
            <div class="text-center">
                <div
                    class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 dark:bg-red-900/30 mb-4">
                    <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z" />
                    </svg>
                </div>
                <flux:heading size="lg" class="text-slate-900 dark:text-slate-100">Hapus Artikel</flux:heading>
                <p class="text-slate-600 dark:text-slate-300 mt-2">
                    Apakah Anda yakin ingin menghapus artikel ini? Tindakan ini tidak dapat dibatalkan.
                </p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3 justify-end">
                <flux:button variant="outline" @click="Flux.modal('deleteArticle').close()"
                    class="order-2 sm:order-1 border-slate-300 text-slate-700 hover:bg-slate-50 dark:border-slate-600 dark:text-slate-300 dark:hover:bg-slate-700">
                    Batal
                </flux:button>
                <flux:button variant="danger" wire:click="deleteArticle" class="order-1 sm:order-2">
                    Hapus Artikel
                </flux:button>
            </div>
        </div>
    </flux:modal>
</div>
