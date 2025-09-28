<style>
    html {
        overflow-y: scroll;
        /* Paksa scrollbar vertikal selalu tampil */
    }
</style>
{{-- Navbar --}}
@include('livewire.viewpublik.components.navbar')

<!-- Article Header -->
<section class="pt-20 bg-gradient-to-r from-ums-blue to-blue-700 text-white py-16">
    <div class="max-w-4xl mx-auto pt-10 px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <!-- Breadcrumb -->
            <nav class="mb-6">
                <ol class="flex items-center justify-center space-x-2 text-blue-200">
                    <li><a href="/" class="hover:text-white">Home</a></li>
                    <li><i class="fas fa-chevron-right text-xs"></i></li>
                    <li><a href="{{ route('artikel') }}" class="hover:text-white">Berita</a></li>
                    <li><i class="fas fa-chevron-right text-xs"></i></li>
                    <li class="text-white">Detail</li>
                </ol>
            </nav>

            <!-- Category Badge -->
            @if ($article->category)
                <div class="mb-4">
                    <span
                        class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-white/20 text-white">
                        <i class="fas fa-tag mr-2"></i>
                        {{ $article->category->name }}
                    </span>
                </div>
            @endif

            <!-- Title -->
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6 animate-fade-in-up">
                {{ $article->title }}
            </h1>

            <!-- Meta Info -->
            <div class="flex items-center justify-center flex-wrap gap-4 text-blue-200 animate-fade-in-up"
                style="animation-delay: 0.2s">
                <div class="flex items-center">
                    <i class="fas fa-calendar mr-2"></i>
                    <span>{{ $article->published_at->format('d M Y') }}</span>
                </div>
                @if ($article->author)
                    <div class="flex items-center">
                        <i class="fas fa-user mr-2"></i>
                        <span>{{ $article->author->name }}</span>
                    </div>
                @endif
                <div class="flex items-center">
                    <i class="fas fa-eye mr-2"></i>
                    <span>{{ $article->views }} views</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Article Content -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Featured Image -->
        @if ($article->thumbnail)
            <div class="mb-12 rounded-2xl overflow-hidden shadow-xl">
                <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}"
                    class="w-full h-64 md:h-96 object-cover">
            </div>
        @endif

        <!-- Article Content -->
        <div class="prose prose-lg max-w-none">
            <!-- Excerpt -->
            <div class="text-xl text-gray-600 font-medium mb-8 p-6 bg-blue-50 rounded-xl border-l-4 border-ums-blue">
                {{ $article->excerpt }}
            </div>

            <!-- Content -->
            <div class="text-gray-800 leading-relaxed">
                {!! $article->content !!}
            </div>
        </div>

        <!-- Share Buttons -->
        <div class="mt-12 pt-8 border-t border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Bagikan Artikel Ini</h3>
            <div class="flex flex-wrap gap-3">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                    target="_blank"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="fab fa-facebook-f mr-2"></i>
                    Facebook
                </a>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($article->title) }}"
                    target="_blank"
                    class="inline-flex items-center px-4 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition-colors">
                    <i class="fab fa-twitter mr-2"></i>
                    Twitter
                </a>
                <a href="https://wa.me/?text={{ urlencode($article->title . ' ' . request()->fullUrl()) }}"
                    target="_blank"
                    class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                    <i class="fab fa-whatsapp mr-2"></i>
                    WhatsApp
                </a>
                <button onclick="copyToClipboard()"
                    class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                    <i class="fas fa-link mr-2"></i>
                    Copy Link
                </button>
            </div>
        </div>

        <!-- Back to Articles -->
        <div class="mt-12 text-center">
            <a href="{{ route('artikel') }}"
                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-ums-blue to-blue-600 text-white rounded-xl font-semibold hover:shadow-lg transition-all transform hover:-translate-y-0.5">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali ke Daftar Berita
            </a>
        </div>
    </div>
</section>

<!-- Related Articles -->
@php
    $relatedArticles = App\Models\Article::where('id', '!=', $article->id)
        ->where('category_id', $article->category_id)
        ->where('status', 'published')
        ->whereNotNull('published_at')
        ->where('published_at', '<=', now())
        ->orderByDesc('published_at')
        ->limit(3)
        ->get();
@endphp

@if ($relatedArticles->count() > 0)
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Berita Terkait</h2>
                <p class="text-gray-600">Artikel lainnya yang mungkin menarik untuk Anda</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach ($relatedArticles as $relatedArticle)
                    <article
                        class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                        <div class="relative">
                            <img src="{{ asset('storage/' . $relatedArticle->thumbnail) }}"
                                alt="{{ $relatedArticle->title }}" class="w-full h-48 object-cover">
                            <div
                                class="absolute top-4 right-4 bg-black bg-opacity-50 text-white px-2 py-1 rounded-lg text-xs">
                                <i class="fas fa-eye mr-1"></i>
                                <span>{{ $relatedArticle->views }}</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center text-sm text-gray-500 mb-3">
                                <i class="fas fa-calendar mr-2"></i>
                                <span>{{ $relatedArticle->published_at->format('d M Y') }}</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                                {{ $relatedArticle->title }}
                            </h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                {{ $relatedArticle->excerpt }}
                            </p>
                            <a href="{{ route('artikel.show', $relatedArticle->slug) }}"
                                class="inline-flex items-center text-ums-blue font-semibold hover:text-blue-700">
                                Baca Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif

<script>
    function copyToClipboard() {
        navigator.clipboard.writeText(window.location.href).then(function() {
            // Show success message
            const button = event.target;
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-check mr-2"></i>Copied!';
            button.classList.add('bg-green-600');
            button.classList.remove('bg-gray-600');

            setTimeout(() => {
                button.innerHTML = originalText;
                button.classList.remove('bg-green-600');
                button.classList.add('bg-gray-600');
            }, 2000);
        }).catch(function(err) {
            console.error('Could not copy text: ', err);
        });
    }
</script>
