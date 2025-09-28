<style>
    html {
        overflow-y: scroll;
        /* Paksa scrollbar vertikal selalu tampil */
    }
</style>
{{-- Navbar --}}
@include('livewire.viewpublik.components.navbar')

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
                    Resmi Dibuka untuk Umum
                </div>

                <h1 class="text-5xl lg:text-6xl font-bold text-gray-900 leading-tight mb-6">
                    Website Resmi
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-ums-blue to-ums-orange">
                        RS UMS
                    </span>
                </h1>

                <p class="text-xl text-gray-600 leading-relaxed mb-8">
                    Rumah Sakit Universitas Muhammadiyah Surakarta kini hadir resmi untuk masyarakat.
                    Mengusung layanan kesehatan modern dengan standar unggulan dan tenaga medis profesional
                    untuk mendukung kualitas hidup yang lebih baik.
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
                        <div class="text-3xl font-bold text-ums-blue mb-1">2024</div>
                        <div class="text-sm text-gray-600">Tahun Peresmian</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-ums-orange mb-1">Fasilitas</div>
                        <div class="text-sm text-gray-600">Modern & Lengkap</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-green-600 mb-1">Tim</div>
                        <div class="text-sm text-gray-600">Medis Profesional</div>
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
                            <p class="font-semibold text-sm">Resmi Dibuka</p>
                            <p class="text-xs text-gray-600">Standar Internasional</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Promosi Section -->
<section class="py-12 bg-gradient-to-r from-ums-blue to-blue-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div x-data="{
            current: 0,
            banners: [{
                    title: 'Program Vaksinasi COVID-19',
                    subtitle: 'Gratis untuk Masyarakat',
                    description: 'Dapatkan vaksinasi COVID-19 gratis setiap hari Senin-Jumat. Daftar sekarang!',
                    button: 'Daftar Sekarang',
                    icon: 'fa-syringe',
                    bg: 'from-green-500 to-emerald-600'
                },
                {
                    title: 'Medical Check Up Premium',
                    subtitle: 'Diskon 30% s/d 31 Desember',
                    description: 'Paket pemeriksaan kesehatan lengkap dengan teknologi terdepan dan dokter ahli.',
                    button: 'Pesan Sekarang',
                    icon: 'fa-heartbeat',
                    bg: 'from-red-500 to-pink-600'
                },
                {
                    title: 'Konsultasi Dokter Spesialis',
                    subtitle: 'Tersedia 15+ Spesialisasi',
                    description: 'Konsultasi dengan dokter spesialis berpengalaman. Booking online 24/7.',
                    button: 'Booking Online',
                    icon: 'fa-user-md',
                    bg: 'from-purple-500 to-indigo-600'
                }
            ]
        }" x-init="setInterval(() => current = (current + 1) % banners.length, 6000)" class="relative">

            <template x-for="(banner, index) in banners" :key="index">
                <div class="absolute inset-0 transition-opacity duration-1000"
                    :class="current === index ? 'opacity-100' : 'opacity-0'">
                    <div :class="`bg-gradient-to-r ${banner.bg} rounded-2xl p-8 text-white`">
                        <div class="grid md:grid-cols-2 gap-8 items-center">
                            <div>
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mr-4">
                                        <i :class="`fas ${banner.icon} text-2xl`"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-2xl font-bold" x-text="banner.title"></h3>
                                        <p class="text-white/80" x-text="banner.subtitle"></p>
                                    </div>
                                </div>
                                <p class="text-lg mb-6 text-white/90" x-text="banner.description"></p>
                                <button
                                    class="bg-white text-gray-900 px-6 py-3 rounded-xl font-semibold hover:bg-gray-100 transition-all transform hover:scale-105"
                                    x-text="banner.button"></button>
                            </div>
                            <div class="hidden md:flex justify-center">
                                <div class="w-32 h-32 bg-white/10 rounded-full flex items-center justify-center">
                                    <i :class="`fas ${banner.icon} text-6xl`"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>

            <!-- Banner dengan tinggi tetap -->
            <div class="h-64"></div>

            <!-- Dots Indicator -->
            <div class="flex justify-center mt-6 space-x-2">
                <template x-for="(banner, index) in banners" :key="index">
                    <button @click="current = index" class="w-3 h-3 rounded-full transition-all"
                        :class="current === index ? 'bg-white' : 'bg-white/50'"></button>
                </template>
            </div>
        </div>
    </div>
</section>

<!-- Informasi Ketersediaan Kamar Section -->
<section id="kamar" class="py-20 bg-gradient-to-br from-blue-50 to-indigo-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">
                Ketersediaan
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-ums-blue to-ums-orange">
                    Kamar
                </span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Informasi real-time ketersediaan kamar rawat inap di RS UMS
            </p>
            <div class="mt-4 text-sm text-gray-500">
                <i class="fas fa-clock mr-1"></i>
                Terakhir diperbarui: <span id="lastUpdate">26-09-2025 18:14:56</span>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
            <div class="bg-white rounded-xl p-6 text-center shadow-lg">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-bed text-ums-blue text-xl"></i>
                </div>
                <div class="text-3xl font-bold text-gray-900 mb-1">934</div>
                <div class="text-sm text-gray-600">Total Kamar</div>
            </div>
            <div class="bg-white rounded-xl p-6 text-center shadow-lg">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                </div>
                <div class="text-3xl font-bold text-green-600 mb-1">706</div>
                <div class="text-sm text-gray-600">Kamar Tersedia</div>
            </div>
            <div class="bg-white rounded-xl p-6 text-center shadow-lg">
                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-users text-red-600 text-xl"></i>
                </div>
                <div class="text-3xl font-bold text-red-600 mb-1">228</div>
                <div class="text-sm text-gray-600">Kamar Terisi</div>
            </div>
            <div class="bg-white rounded-xl p-6 text-center shadow-lg">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-percentage text-yellow-600 text-xl"></i>
                </div>
                <div class="text-3xl font-bold text-yellow-600 mb-1">76%</div>
                <div class="text-sm text-gray-600">Ketersediaan</div>
            </div>
        </div>

        <!-- Detailed Room Availability -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-ums-blue to-blue-600 text-white p-6">
                <h3 class="text-2xl font-bold flex items-center">
                    <i class="fas fa-hospital mr-3"></i>
                    Detail Ketersediaan Kamar
                </h3>
                <p class="text-blue-100 mt-2">Informasi ketersediaan kamar berdasarkan kelas</p>
            </div>

            <div class="p-6">
                <div class="grid gap-4">
                    <!-- KELAS 3 -->
                    <div class="border border-gray-200 rounded-xl p-6 hover:shadow-md transition-all">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-bed text-ums-blue"></i>
                                </div>
                                <h4 class="text-xl font-semibold text-gray-900">Kelas III</h4>
                            </div>
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                                Tersedia
                            </span>
                        </div>
                        <div class="grid grid-cols-3 gap-4 text-center">
                            <div class="bg-gray-50 rounded-lg p-3">
                                <div class="text-2xl font-bold text-gray-900">576</div>
                                <div class="text-sm text-gray-600">Total Bed</div>
                            </div>
                            <div class="bg-green-50 rounded-lg p-3">
                                <div class="text-2xl font-bold text-green-600">450</div>
                                <div class="text-sm text-gray-600">Tersedia</div>
                            </div>
                            <div class="bg-red-50 rounded-lg p-3">
                                <div class="text-2xl font-bold text-red-600">126</div>
                                <div class="text-sm text-gray-600">Terisi</div>
                            </div>
                        </div>
                    </div>

                    <!-- KELAS 2 -->
                    <div class="border border-gray-200 rounded-xl p-6 hover:shadow-md transition-all">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-bed text-purple-600"></i>
                                </div>
                                <h4 class="text-xl font-semibold text-gray-900">Kelas II</h4>
                            </div>
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                                Tersedia
                            </span>
                        </div>
                        <div class="grid grid-cols-3 gap-4 text-center">
                            <div class="bg-gray-50 rounded-lg p-3">
                                <div class="text-2xl font-bold text-gray-900">169</div>
                                <div class="text-sm text-gray-600">Total Bed</div>
                            </div>
                            <div class="bg-green-50 rounded-lg p-3">
                                <div class="text-2xl font-bold text-green-600">117</div>
                                <div class="text-sm text-gray-600">Tersedia</div>
                            </div>
                            <div class="bg-red-50 rounded-lg p-3">
                                <div class="text-2xl font-bold text-red-600">52</div>
                                <div class="text-sm text-gray-600">Terisi</div>
                            </div>
                        </div>
                    </div>

                    <!-- KELAS 1 -->
                    <div class="border border-gray-200 rounded-xl p-6 hover:shadow-md transition-all">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-bed text-yellow-600"></i>
                                </div>
                                <h4 class="text-xl font-semibold text-gray-900">Kelas I</h4>
                            </div>
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                                Tersedia
                            </span>
                        </div>
                        <div class="grid grid-cols-3 gap-4 text-center">
                            <div class="bg-gray-50 rounded-lg p-3">
                                <div class="text-2xl font-bold text-gray-900">124</div>
                                <div class="text-sm text-gray-600">Total Bed</div>
                            </div>
                            <div class="bg-green-50 rounded-lg p-3">
                                <div class="text-2xl font-bold text-green-600">90</div>
                                <div class="text-sm text-gray-600">Tersedia</div>
                            </div>
                            <div class="bg-red-50 rounded-lg p-3">
                                <div class="text-2xl font-bold text-red-600">34</div>
                                <div class="text-sm text-gray-600">Terisi</div>
                            </div>
                        </div>
                    </div>

                    <!-- VIP -->
                    <div class="border border-gray-200 rounded-xl p-6 hover:shadow-md transition-all">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-crown text-green-600"></i>
                                </div>
                                <h4 class="text-xl font-semibold text-gray-900">VIP</h4>
                            </div>
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                                Tersedia
                            </span>
                        </div>
                        <div class="grid grid-cols-3 gap-4 text-center">
                            <div class="bg-gray-50 rounded-lg p-3">
                                <div class="text-2xl font-bold text-gray-900">61</div>
                                <div class="text-sm text-gray-600">Total Bed</div>
                            </div>
                            <div class="bg-green-50 rounded-lg p-3">
                                <div class="text-2xl font-bold text-green-600">45</div>
                                <div class="text-sm text-gray-600">Tersedia</div>
                            </div>
                            <div class="bg-red-50 rounded-lg p-3">
                                <div class="text-2xl font-bold text-red-600">16</div>
                                <div class="text-sm text-gray-600">Terisi</div>
                            </div>
                        </div>
                    </div>

                    <!-- VVIP -->
                    <div class="border border-gray-200 rounded-xl p-6 hover:shadow-md transition-all">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-amber-100 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-gem text-amber-600"></i>
                                </div>
                                <h4 class="text-xl font-semibold text-gray-900">VVIP</h4>
                            </div>
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                                Tersedia
                            </span>
                        </div>
                        <div class="grid grid-cols-3 gap-4 text-center">
                            <div class="bg-gray-50 rounded-lg p-3">
                                <div class="text-2xl font-bold text-gray-900">4</div>
                                <div class="text-sm text-gray-600">Total Bed</div>
                            </div>
                            <div class="bg-green-50 rounded-lg p-3">
                                <div class="text-2xl font-bold text-green-600">4</div>
                                <div class="text-sm text-gray-600">Tersedia</div>
                            </div>
                            <div class="bg-red-50 rounded-lg p-3">
                                <div class="text-2xl font-bold text-red-600">0</div>
                                <div class="text-sm text-gray-600">Terisi</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Special Care Units -->
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-hospital-alt mr-2 text-red-600"></i>
                        Unit Perawatan Khusus
                    </h4>
                    <div class="grid md:grid-cols-3 gap-4">
                        <!-- HCU -->
                        <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-red-600 mb-1">2</div>
                                <div class="text-sm font-medium text-gray-900">HCU</div>
                                <div class="text-xs text-gray-600">High Care Unit</div>
                                <div class="text-xs text-green-600 mt-1">Tersedia</div>
                            </div>
                        </div>

                        <!-- ICU -->
                        <div class="bg-orange-50 border border-orange-200 rounded-lg p-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-orange-600 mb-1">1</div>
                                <div class="text-sm font-medium text-gray-900">ICU</div>
                                <div class="text-xs text-gray-600">Intensive Care Unit</div>
                                <div class="text-xs text-green-600 mt-1">Tersedia</div>
                            </div>
                        </div>

                        <!-- Isolasi -->
                        <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-purple-600 mb-1">1</div>
                                <div class="text-sm font-medium text-gray-900">Isolasi</div>
                                <div class="text-xs text-gray-600">Ruang Isolasi</div>
                                <div class="text-xs text-green-600 mt-1">Tersedia</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
                    <button
                        class="bg-gradient-to-r from-ums-blue to-blue-600 text-white px-8 py-3 rounded-xl font-semibold hover:shadow-lg transition-all transform hover:-translate-y-0.5">
                        <i class="fas fa-calendar-plus mr-2"></i>
                        Reservasi Kamar
                    </button>
                    <button
                        class="border-2 border-ums-blue text-ums-blue px-8 py-3 rounded-xl font-semibold hover:bg-ums-blue hover:text-white transition-all">
                        <i class="fas fa-phone mr-2"></i>
                        Hubungi Admisi
                    </button>
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
            @foreach ($articles as $article)
                <article
                    class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative">
                        <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}"
                            class="w-full h-48 object-cover">
                        <div class="absolute top-4 left-4">
                            <span class="bg-ums-blue text-white px-3 py-1 rounded-full text-sm font-medium">
                                {{ $article->category->name ?? 'Berita' }}
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <i class="fas fa-calendar mr-2"></i>
                            {{ $article->published_at->format('d F Y') }}
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                            {{ $article->title }}
                        </h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            {{ $article->excerpt }}
                        </p>
                        <a href="#"
                            class="inline-flex items-center text-ums-blue font-semibold hover:text-blue-700">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </article>
            @endforeach
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
