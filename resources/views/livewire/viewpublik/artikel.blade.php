<style>
    html {
        overflow-y: scroll;
        /* Paksa scrollbar vertikal selalu tampil */
    }
</style>
{{-- Navbar --}}
@include('livewire.viewpublik.components.navbar')

<!-- Hero Section -->
<section class="pt-20 bg-gradient-to-r from-ums-blue to-blue-700 text-white py-16">
    <div class="max-w-7xl mx-auto pt-10 px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                Berita & Informasi
                <span class="text-yellow-300">RS UMS</span>
            </h1>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                Dapatkan informasi terkini seputar layanan kesehatan, kegiatan, dan perkembangan terbaru dari Rumah Sakit UMS
            </p>
            <div class="mt-6 flex items-center justify-center text-blue-200">
                <i class="fas fa-newspaper mr-2"></i>
                <span>Terupdate setiap hari</span>
            </div>
        </div>
    </div>
</section>

<!-- Quick News Stats -->
<section class="py-8 bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="text-center">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-2">
                    <i class="fas fa-newspaper text-ums-blue text-xl"></i>
                </div>
                <div class="text-2xl font-bold text-gray-900">{{ $totalArticles }}</div>
                <div class="text-sm text-gray-600">Total Berita</div>
            </div>
            <div class="text-center">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-2">
                    <i class="fas fa-calendar text-green-600 text-xl"></i>
                </div>
                <div class="text-2xl font-bold text-green-600">{{ $weeklyArticles }}</div>
                <div class="text-sm text-gray-600">Berita Minggu Ini</div>
            </div>
            <div class="text-center">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mx-auto mb-2">
                    <i class="fas fa-tags text-purple-600 text-xl"></i>
                </div>
                <div class="text-2xl font-bold text-purple-600">{{ $totalCategories }}</div>
                <div class="text-sm text-gray-600">Kategori</div>
            </div>
            <div class="text-center">
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mx-auto mb-2">
                    <i class="fas fa-eye text-orange-600 text-xl"></i>
                </div>
                <div class="text-2xl font-bold text-orange-600">{{ number_format($totalViews) }}</div>
                <div class="text-sm text-gray-600">Total Views</div>
            </div>
        </div>
    </div>
</section>

<!-- Filter & Search Section -->
<section class="py-8 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <form method="GET" action="{{ route('artikel') }}" class="flex flex-wrap gap-4 items-center justify-between mb-8">
            <div class="flex flex-wrap gap-4">
                <!-- Category Filter -->
                <div class="relative">
                    <select name="category" onchange="this.form.submit()"
                            class="appearance-none bg-white border border-gray-300 rounded-lg px-4 py-2 pr-8 focus:outline-none focus:ring-2 focus:ring-ums-blue focus:border-transparent">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" 
                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <i class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                </div>

                <!-- Search -->
                <div class="relative">
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Cari berita..." 
                           class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-ums-blue focus:border-transparent w-64">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>

                <!-- Search Button -->
                <button type="submit" class="px-4 py-2 bg-ums-blue text-white rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="fas fa-search mr-1"></i>
                    Cari
                </button>
            </div>

            <!-- Sort Options -->
            <div class="flex gap-2">
                <a href="{{ request()->fullUrlWithQuery(['sort' => 'newest']) }}" 
                   class="px-4 py-2 rounded-lg border text-sm font-medium transition-all {{ request('sort', 'newest') === 'newest' ? 'bg-ums-blue text-white' : 'bg-white text-gray-700 hover:bg-ums-blue hover:text-white' }}">
                    Terbaru
                </a>
                <a href="{{ request()->fullUrlWithQuery(['sort' => 'popular']) }}" 
                   class="px-4 py-2 rounded-lg border text-sm font-medium transition-all {{ request('sort') === 'popular' ? 'bg-ums-blue text-white' : 'bg-white text-gray-700 hover:bg-ums-blue hover:text-white' }}">
                    Populer
                </a>
            </div>
        </form>

        @if($featuredArticle)
        <!-- Featured News -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                <i class="fas fa-star text-yellow-500 mr-2"></i>
                Berita Utama
            </h2>
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
                <div class="md:flex">
                    <div class="md:w-1/2">
                        <img src="{{ asset('storage/' . $featuredArticle->thumbnail) }}" 
                             alt="{{ $featuredArticle->title }}" 
                             class="w-full h-64 md:h-full object-cover">
                    </div>
                    <div class="md:w-1/2 p-8">
                        <div class="flex items-center mb-4">
                            @if($featuredArticle->category)
                            <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-medium mr-3">
                                {{ $featuredArticle->category->name }}
                            </span>
                            @endif
                            <span class="text-gray-500 text-sm">
                                <i class="fas fa-calendar mr-1"></i>
                                {{ $featuredArticle->published_at->format('d M Y') }}
                            </span>
                        </div>
                        <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">
                            {{ $featuredArticle->title }}
                        </h3>
                        <p class="text-gray-600 mb-6 line-clamp-3">
                            {{ $featuredArticle->excerpt }}
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-eye mr-1"></i>
                                <span>{{ $featuredArticle->views }} views</span>
                                @if($featuredArticle->author)
                                <span class="mx-2">•</span>
                                <i class="fas fa-user mr-1"></i>
                                <span>{{ $featuredArticle->author->name }}</span>
                                @endif
                            </div>
                            <a href="{{ route('artikel.show', $featuredArticle->slug) }}" 
                               class="inline-flex items-center text-ums-blue font-semibold hover:text-blue-700 transition-colors">
                                Baca Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- News Grid -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-gray-900">
                    @if(request('search'))
                        Hasil Pencarian untuk "{{ request('search') }}"
                    @elseif(request('category'))
                        Berita {{ $categories->find(request('category'))->name ?? '' }}
                    @else
                        Berita Terbaru
                    @endif
                </h2>
                @if($articles->count() > 0)
                <div class="text-gray-600">
                    Menampilkan {{ $articles->firstItem() }}-{{ $articles->lastItem() }} dari {{ $articles->total() }} berita
                </div>
                @endif
            </div>

            @if($articles->count() > 0)
            <!-- News Cards -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($articles as $article)
                <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative">
                        <img src="{{ asset('storage/' . $article->thumbnail) }}" 
                             alt="{{ $article->title }}" 
                             class="w-full h-48 object-cover">
                        <div class="absolute top-4 left-4">
                            @if($article->category)
                            <span class="px-3 py-1 rounded-full text-xs font-medium text-white
                                         @switch($article->category->slug ?? '')
                                             @case('layanan') bg-blue-500 @break
                                             @case('kesehatan') bg-green-500 @break
                                             @case('kegiatan') bg-purple-500 @break
                                             @case('pendidikan') bg-red-500 @break
                                             @case('inovasi-medis') bg-emerald-500 @break
                                             @default bg-gray-500
                                         @endswitch">
                                {{ $article->category->name }}
                            </span>
                            @endif
                        </div>
                        <div class="absolute top-4 right-4 bg-black bg-opacity-50 text-white px-2 py-1 rounded-lg text-xs">
                            <i class="fas fa-eye mr-1"></i>
                            <span>{{ $article->views }}</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <i class="fas fa-calendar mr-2"></i>
                            <span>{{ $article->published_at->format('d M Y') }}</span>
                            @if($article->author)
                            <span class="mx-2">•</span>
                            <i class="fas fa-user mr-1"></i>
                            <span>{{ $article->author->name }}</span>
                            @endif
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 hover:text-ums-blue transition-colors">
                            <a href="{{ route('artikel.show', $article->slug) }}">{{ $article->title }}</a>
                        </h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ $article->excerpt }}</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-500">
                                @if($article->category)
                                <span class="text-xs bg-gray-100 text-gray-700 px-2 py-1 rounded-full">
                                    {{ $article->category->name }}
                                </span>
                                @endif
                            </div>
                            <a href="{{ route('artikel.show', $article->slug) }}" 
                               class="inline-flex items-center text-ums-blue font-semibold hover:text-blue-700 transition-colors">
                                Baca <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>

            @else
            <!-- No Results -->
            <div class="text-center py-12">
                <i class="fas fa-newspaper text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Tidak ada berita ditemukan</h3>
                <p class="text-gray-600 mb-4">
                    @if(request('search') || request('category'))
                        Coba ubah filter atau kata kunci pencarian Anda
                    @else
                        Belum ada berita yang dipublikasikan
                    @endif
                </p>
                @if(request('search') || request('category'))
                <a href="{{ route('artikel') }}" class="bg-ums-blue text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    Reset Filter
                </a>
                @endif
            </div>
            @endif
        </div>

        <!-- Load More Info -->
        @if($articles->hasPages())
            <div class="mt-12">
                <div class="pagination-wrapper bg-white rounded-lg shadow-sm border p-4">
                    {{ $articles->links('components.pagination') }}
                </div>
            </div>
            @endif
    </div>
</section>

    <!-- Newsletter Section -->
    <section class="py-16 bg-gradient-to-r from-ums-blue to-blue-700 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-envelope text-3xl"></i>
            </div>
            <h2 class="text-3xl font-bold mb-4">Berlangganan Newsletter</h2>
            <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                Dapatkan informasi terbaru seputar layanan kesehatan dan kegiatan RS UMS langsung di email Anda
            </p>
            <div class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                <input type="email" placeholder="Masukkan email Anda..." 
                       class="flex-1 px-4 py-3 rounded-lg border-0 text-gray-900 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50">
                <button class="bg-white text-ums-blue px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-all">
                    <i class="fas fa-paper-plane mr-2"></i>
                    Berlangganan
                </button>
            </div>
            <p class="text-blue-200 text-sm mt-4">
                <i class="fas fa-shield-alt mr-1"></i>
                Email Anda aman bersama kami. Tidak ada spam.
            </p>
        </div>
    </section>