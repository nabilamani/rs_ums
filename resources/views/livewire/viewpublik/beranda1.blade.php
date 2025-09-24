<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('assets/logo_ums.png') }}">
    <title>RS UMS - Rumah Sakit Universitas Muhammadiyah Surakarta</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'ums-blue': '#1E40AF',
                        'ums-orange': '#F97316'
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.8s ease-out',
                        'float': 'float 3s ease-in-out infinite',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite'
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(30px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            }
                        },
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0px)'
                            },
                            '50%': {
                                transform: 'translateY(-10px)'
                            }
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gradient-to-br from-blue-50 via-white to-orange-50 min-h-screen">

    {{-- Navbar --}}
    @include('livewire.viewpublik.components.navbar')
    
    <div>
    <!-- Hero Section -->
    <section id="home" class="pt-20 min-h-screen flex items-center relative overflow-hidden">
        <!-- Background decorative elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-32 w-80 h-80 bg-blue-200 rounded-full opacity-20 animate-pulse-slow">
            </div>
            <div class="absolute top-20 -left-32 w-64 h-64 bg-orange-200 rounded-full opacity-20 animate-float"></div>
            <div class="absolute bottom-20 right-1/4 w-48 h-48 bg-green-200 rounded-full opacity-20 animate-pulse-slow">
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

    <!-- Layanan Unggulan Section -->
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
                <!-- Service 1 -->
                <div
                    class="group bg-gradient-to-br from-red-50 to-pink-50 p-8 rounded-2xl hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-red-100">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-red-500 to-pink-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-heartbeat text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Pelayanan Jantung</h3>
                    <p class="text-gray-600 mb-6">Pemeriksaan dan perawatan jantung komprehensif dengan teknologi
                        terdepan dan dokter spesialis berpengalaman.</p>
                    <a href="#" class="inline-flex items-center text-red-600 font-semibold hover:text-red-700">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <!-- Service 2 -->
                <div
                    class="group bg-gradient-to-br from-blue-50 to-indigo-50 p-8 rounded-2xl hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-blue-100">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-ums-blue to-indigo-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-user-md text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Poli Spesialis</h3>
                    <p class="text-gray-600 mb-6">Tersedia berbagai dokter spesialis untuk memenuhi kebutuhan kesehatan
                        Anda dengan pelayanan terbaik.</p>
                    <a href="#" class="inline-flex items-center text-ums-blue font-semibold hover:text-blue-700">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <!-- Service 3 -->
                <div
                    class="group bg-gradient-to-br from-green-50 to-emerald-50 p-8 rounded-2xl hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-green-100">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-graduation-cap text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">RS Pendidikan</h3>
                    <p class="text-gray-600 mb-6">Rumah sakit pendidikan dengan fasilitas modern untuk pembelajaran dan
                        praktik mahasiswa kedokteran.</p>
                    <a href="#"
                        class="inline-flex items-center text-green-600 font-semibold hover:text-green-700">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <!-- Service 4 -->
                <div
                    class="group bg-gradient-to-br from-purple-50 to-violet-50 p-8 rounded-2xl hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-purple-100">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-purple-500 to-violet-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-ambulance text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">UGD 24 Jam</h3>
                    <p class="text-gray-600 mb-6">Layanan gawat darurat 24 jam dengan tim medis siaga dan peralatan
                        lengkap untuk penanganan cepat.</p>
                    <a href="#"
                        class="inline-flex items-center text-purple-600 font-semibold hover:text-purple-700">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <!-- Service 5 -->
                <div
                    class="group bg-gradient-to-br from-orange-50 to-amber-50 p-8 rounded-2xl hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-orange-100">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-ums-orange to-amber-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-baby text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Ibu & Anak</h3>
                    <p class="text-gray-600 mb-6">Pelayanan kesehatan ibu hamil, persalinan, dan perawatan anak dengan
                        fasilitas NICU terlengkap.</p>
                    <a href="#"
                        class="inline-flex items-center text-ums-orange font-semibold hover:text-orange-700">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <!-- Service 6 -->
                <div
                    class="group bg-gradient-to-br from-teal-50 to-cyan-50 p-8 rounded-2xl hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-teal-100">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-teal-500 to-cyan-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-microscope text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Laboratorium</h3>
                    <p class="text-gray-600 mb-6">Layanan laboratorium lengkap dengan teknologi canggih untuk
                        pemeriksaan diagnosis yang akurat.</p>
                    <a href="#"
                        class="inline-flex items-center text-teal-600 font-semibold hover:text-teal-700">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
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
                        <img src="https://images.unsplash.com/photo-1584362917165-526a968579e8?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
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
                        <img src="https://images.unsplash.com/photo-1582750433449-648ed127bb54?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
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

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-8">
                <!-- Company Info -->
                <div class="lg:col-span-2">
                    <div class="flex items-center space-x-4 mb-6">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-ums-blue to-ums-orange rounded-lg flex items-center justify-center">
                            <i class="fas fa-hospital text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold">RS UMS</h3>
                            <p class="text-gray-400 text-sm">Rumah Sakit Universitas Muhammadiyah Surakarta</p>
                        </div>
                    </div>
                    <p class="text-gray-300 mb-6 max-w-md">
                        Memberikan layanan kesehatan terbaik dengan fasilitas modern, tenaga medis berpengalaman, dan
                        komitmen terhadap kepuasan pasien.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center hover:bg-blue-700 transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-pink-600 rounded-lg flex items-center justify-center hover:bg-pink-700 transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-blue-400 rounded-lg flex items-center justify-center hover:bg-blue-500 transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center hover:bg-red-700 transition-colors">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-6">Tautan Cepat</h4>
                    <ul class="space-y-3">
                        <li><a href="#"
                                class="text-gray-300 hover:text-white transition-colors flex items-center">
                                <i class="fas fa-chevron-right mr-2 text-xs text-ums-orange"></i>Tentang Kami
                            </a></li>
                        <li><a href="#"
                                class="text-gray-300 hover:text-white transition-colors flex items-center">
                                <i class="fas fa-chevron-right mr-2 text-xs text-ums-orange"></i>Layanan Medis
                            </a></li>
                        <li><a href="#"
                                class="text-gray-300 hover:text-white transition-colors flex items-center">
                                <i class="fas fa-chevron-right mr-2 text-xs text-ums-orange"></i>Dokter
                            </a></li>
                        <li><a href="#"
                                class="text-gray-300 hover:text-white transition-colors flex items-center">
                                <i class="fas fa-chevron-right mr-2 text-xs text-ums-orange"></i>Fasilitas
                            </a></li>
                        <li><a href="#"
                                class="text-gray-300 hover:text-white transition-colors flex items-center">
                                <i class="fas fa-chevron-right mr-2 text-xs text-ums-orange"></i>Karir
                            </a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-lg font-semibold mb-6">Informasi Kontak</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt text-ums-orange mt-1 mr-3"></i>
                            <div class="text-gray-300">
                                <p>Jl. Ahmad Yani, Tromol Pos 1</p>
                                <p>Pabelan, Kartasura, Surakarta</p>
                                <p>Jawa Tengah 57102</p>
                            </div>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone text-ums-orange mr-3"></i>
                            <div class="text-gray-300">
                                <p>(0271) 717417</p>
                            </div>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope text-ums-orange mr-3"></i>
                            <div class="text-gray-300">
                                <p>info@rs-ums.ac.id</p>
                            </div>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-clock text-ums-orange mr-3"></i>
                            <div class="text-gray-300">
                                <p>24 Jam / 7 Hari</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <hr class="border-gray-700 my-8">

            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">
                    &copy; 2025 Rumah Sakit UMS. Seluruh hak cipta dilindungi.
                </p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Kebijakan
                        Privasi</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Syarat &
                        Ketentuan</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/628123456789"
        class="fixed bottom-6 right-6 bg-green-500 text-white w-14 h-14 rounded-full shadow-lg hover:bg-green-600 transition-all hover:shadow-xl flex items-center justify-center z-50 animate-pulse">
        <i class="fab fa-whatsapp text-2xl"></i>
    </a>

    <!-- Back to Top Button -->
    <button id="backToTop"
        class="fixed bottom-6 left-6 bg-ums-blue text-white w-12 h-12 rounded-full shadow-lg hover:bg-blue-700 transition-all hover:shadow-xl flex items-center justify-center z-50 opacity-0 pointer-events-none">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- JavaScript -->
    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Back to top button
        const backToTopBtn = document.getElementById('backToTop');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.remove('opacity-0', 'pointer-events-none');
            } else {
                backToTopBtn.classList.add('opacity-0', 'pointer-events-none');
            }
        });

        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Add scroll effect to navbar
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('nav');
            if (window.pageYOffset > 50) {
                navbar.classList.add('bg-white/98');
                navbar.classList.remove('bg-white/95');
            } else {
                navbar.classList.add('bg-white/95');
                navbar.classList.remove('bg-white/98');
            }
        });

        // Animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in-up');
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll('.group').forEach(el => {
            observer.observe(el);
        });

        // Add loading animation
        window.addEventListener('load', () => {
            document.body.classList.add('loaded');
        });
    </script>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        html {
            scroll-behavior: smooth;
        }

        /* Loading state */
        body:not(.loaded) {
            overflow: hidden;
        }

        body:not(.loaded)::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #1E40AF 0%, #F97316 100%);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: fadeOut 0.5s ease-in-out 2s forwards;
        }

        @keyframes fadeOut {
            to {
                opacity: 0;
                pointer-events: none;
            }
        }
    </style>
</body>

</html>
