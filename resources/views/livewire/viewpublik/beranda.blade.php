{{-- Navbar --}}
@include('livewire.viewpublik.components.navbar')

<div>
    <!-- Hero Section -->
    <section id="home" class="pt-20 min-h-screen flex items-center relative overflow-hidden">
        <!-- Background decorative elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-32 w-80 h-80 bg-blue-300 rounded-full opacity-20 animate-pulse-slow">
            </div>
            <div class="absolute top-20 -left-32 w-64 h-64 bg-orange-300 rounded-full opacity-20 animate-float"></div>
            <div class="absolute bottom-20 right-1/4 w-48 h-48 bg-green-300 rounded-full opacity-20 animate-pulse-slow">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="animate-fade-in-up">
                    <div
                        class="inline-flex items-center px-4 py-2 bg-blue-100 rounded-full text-ums-blue text-sm font-medium mb-6">
                        <i class="fas fa-star mr-2"></i>
                        Rumah Sakit Terpercaya & Berkualitas
                    </div>

                    <h1 class="text-5xl lg:text-6xl font-bold text-gray-900 leading-tight mb-6">
                        Selamat Datang di
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-ums-blue to-ums-orange">
                            RS UMS
                        </span>
                    </h1>

                    <p class="text-xl text-gray-600 leading-relaxed mb-8">
                        Website resmi Rumah Sakit Universitas Muhammadiyah Surakarta.
                        Memberikan layanan kesehatan terbaik dengan fasilitas modern dan tenaga medis berpengalaman.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 mb-8">
                        <a href="#layanan"
                            class="bg-gradient-to-r from-ums-blue to-blue-600 text-white px-8 py-4 rounded-xl font-semibold hover:shadow-lg transition-all transform hover:-translate-y-1 text-center">
                            <i class="fas fa-heart mr-2"></i>
                            Lihat Layanan
                        </a>
                        <a href="#kontak"
                            class="border-2 border-ums-blue text-ums-blue px-8 py-4 rounded-xl font-semibold hover:bg-ums-blue hover:text-white transition-all text-center">
                            <i class="fas fa-phone mr-2"></i>
                            Hubungi Kami
                        </a>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-6">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-ums-blue mb-1">25+</div>
                            <div class="text-sm text-gray-600">Tahun Pengalaman</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-ums-orange mb-1">50k+</div>
                            <div class="text-sm text-gray-600">Pasien Dilayani</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-green-600 mb-1">100+</div>
                            <div class="text-sm text-gray-600">Tenaga Medis</div>
                        </div>
                    </div>
                </div>

                <!-- Right Content -->
                <div class="relative">
                    <div class="relative z-10 rounded-2xl shadow-2xl overflow-hidden w-full h-96 animate-float">
                        <!-- Alpine.js untuk rotasi gambar -->
                        <div x-data="{
                            current: 0,
                            images: [
                                'https://asedino.com/wp-content/uploads/2021/06/Info-Proyek-Solo-Desain-Modern-Futuristik-Rumah-Sakit-UMS-Kota-Solo-%E2%80%93-Proyek-Rumah-Sakit-di-Solo-%E2%80%93-Berita-Proyek-Terbaru-di-Solo.jpg',
                                'https://bau.ums.ac.id/wp-content/uploads/sites/85/2025/07/FEB-UMS.jpeg',
                                'https://asedino.com/wp-content/uploads/2021/06/Info-Proyek-Solo-Desain-Modern-Futuristik-Rumah-Sakit-UMS-Kota-Solo-%E2%80%93-Proyek-Rumah-Sakit-di-Solo-%E2%80%93-Berita-Proyek-Terbaru-di-Solo-2.jpg'
                            ]
                        }" x-init="setInterval(() => current = (current + 1) % images.length, 4000)" class="w-full h-full">

                            <template x-for="(img, index) in images" :key="index">
                                <img :src="img" alt="RS UMS Building"
                                    class="absolute inset-0 w-full h-full object-cover transition-opacity duration-700"
                                    :class="current === index ? 'opacity-100' : 'opacity-0'">
                            </template>
                        </div>
                    </div>

                    <!-- Decorative cards -->
                    <div class="absolute -bottom-6 -left-6 bg-white rounded-xl shadow-lg p-4 z-20 animate-fade-in-up">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-check text-green-600"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-sm">Pelayanan 24/7</p>
                                <p class="text-xs text-gray-600">Siap melayani Anda</p>
                            </div>
                        </div>
                    </div>

                    <div class="absolute -top-6 -right-6 bg-white rounded-xl shadow-lg p-4 z-20 animate-fade-in-up"
                        style="animation-delay: 0.2s">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-award text-ums-blue"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-sm">Terakreditasi A</p>
                                <p class="text-xs text-gray-600">Standar Internasional</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="layanan" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    Layanan
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-ums-blue to-ums-orange">
                        Unggulan
                    </span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Kami menyediakan berbagai layanan kesehatan terbaik dengan fasilitas modern dan tenaga medis
                    berpengalaman
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($categories->take(6) as $index => $cat)
                    @php $g = $gradients[$index % count($gradients)]; @endphp

                    <div
                        class="group bg-gradient-to-br from-{{ $g['from'] }} to-{{ $g['to'] }}
        p-8 rounded-2xl hover:shadow-xl transition-all duration-300 hover:-translate-y-2
        border border-{{ $g['border'] }} flex flex-col h-full">

                        <div
                            class="w-16 h-16 bg-gradient-to-br from-{{ $g['accent1'] }} to-{{ $g['accent2'] }}
            rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <i class="fas {{ $cat->icon }} text-white text-2xl"></i>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-4">{{ $cat->title }}</h3>
                        <p class="text-gray-600 mb-6 line-clamp-3 flex-grow">
                            {{ Str::limit($cat->description, 100) }}
                        </p>
                        <a href="#"
                            class="inline-flex items-center text-{{ $g['text'] }} font-semibold hover:text-{{ $g['hover'] }} mt-auto">
                            Pelajari Lebih Lanjut <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>



    <!-- Berita Terbaru Section -->
    <section id="berita" class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    Berita
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-ums-blue to-ums-orange">
                        Terbaru
                    </span>
                </h2>
                <p class="text-xl text-gray-600">
                    Informasi terkini seputar kegiatan dan perkembangan RS UMS
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- News 1 -->
                <article
                    class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative">
                        <img src="https://rsgmjenderalachmadyani.com/wp-content/uploads/2024/07/21970.png"
                            alt="Layanan Baru" class="w-full h-48 object-cover">
                        <div class="absolute top-4 left-4">
                            <span class="bg-ums-blue text-white px-3 py-1 rounded-full text-sm font-medium">
                                Layanan
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <i class="fas fa-calendar mr-2"></i>
                            15 September 2025
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                            Pembukaan Layanan Radiologi Terbaru dengan Teknologi MRI 3.0 Tesla
                        </h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            RS UMS kini membuka layanan radiologi terbaru dengan teknologi MRI 3.0 Tesla yang memberikan
                            hasil diagnosa lebih akurat dan cepat untuk pasien.
                        </p>
                        <a href="#"
                            class="inline-flex items-center text-ums-blue font-semibold hover:text-blue-700">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>

                <!-- News 2 -->
                <article
                    class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative">
                        <img src="https://news.ums.ac.id/id/wp-content/uploads/sites/2/2024/07/IMG_7810.jpeg"
                            alt="Bakti Sosial" class="w-full h-48 object-cover">
                        <div class="absolute top-4 left-4">
                            <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                Kegiatan
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <i class="fas fa-calendar mr-2"></i>
                            12 September 2025
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                            Bakti Sosial Pemeriksaan Kesehatan Gratis di Desa Binaan
                        </h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            Tim RS UMS melaksanakan bakti sosial pemeriksaan kesehatan gratis untuk masyarakat di desa
                            binaan sebagai bentuk kepedulian sosial.
                        </p>
                        <a href="#"
                            class="inline-flex items-center text-ums-blue font-semibold hover:text-blue-700">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>

                <!-- News 3 -->
                <article
                    class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Pelatihan" class="w-full h-48 object-cover">
                        <div class="absolute top-4 left-4">
                            <span class="bg-ums-orange text-white px-3 py-1 rounded-full text-sm font-medium">
                                Pendidikan
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <i class="fas fa-calendar mr-2"></i>
                            10 September 2025
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                            Pelatihan Advanced Life Support untuk Tenaga Medis
                        </h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            RS UMS mengadakan pelatihan khusus Advanced Life Support untuk meningkatkan kompetensi
                            tenaga medis dalam penanganan kasus gawat darurat.
                        </p>
                        <a href="#"
                            class="inline-flex items-center text-ums-blue font-semibold hover:text-blue-700">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>
            </div>

            <div class="text-center mt-12">
                <a href="#"
                    class="bg-gradient-to-r from-ums-blue to-blue-600 text-white px-8 py-3 rounded-xl font-semibold hover:shadow-lg transition-all transform hover:-translate-y-0.5">
                    <i class="fas fa-newspaper mr-2"></i>
                    Lihat Semua Berita
                </a>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    @include('livewire.viewpublik.components.footer')
