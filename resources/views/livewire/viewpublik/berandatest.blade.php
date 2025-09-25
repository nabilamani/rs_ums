{{-- beranda.blade.php --}}
<div>
    {{-- Navbar --}}
    @include('livewire.viewpublik.components.navbar')

    {{-- MAIN CONTENT --}}
    <flux:main container>
        {{-- Hero Section --}}
        <div class="text-center py-12 pt-30">
            <flux:heading size="2xl" level="1">
                Selamat Datang di <span class="text-indigo-600">RS UMS</span>
            </flux:heading>
            <flux:text class="mt-3 text-lg text-gray-600">
                Website resmi Rumah Sakit UMS, informasi layanan kesehatan, profil, dan berita terbaru.
            </flux:text>

            <div class="mt-6 flex justify-center gap-4">
                <flux:button class="bg-indigo-600 text-white px-6 py-2 rounded-lg shadow hover:bg-indigo-700">
                    Lihat Layanan
                </flux:button>
                <flux:button class="border border-indigo-600 text-indigo-600 px-6 py-2 rounded-lg hover:bg-indigo-50">
                    Hubungi Kami
                </flux:button>
            </div>
        </div>

        <flux:separator class="my-10" />

        {{-- Layanan Unggulan --}}
        <flux:heading size="xl" class="mb-6 text-center">Layanan Unggulan</flux:heading>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow text-center">
                <div class="flex justify-center mb-3">
                    <flux:icon name="heart" class="w-10 h-10 text-red-500" />
                </div>
                <h3 class="font-semibold text-lg mb-2">Pelayanan Jantung</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm">
                    Pemeriksaan dan perawatan jantung dengan fasilitas lengkap.
                </p>
            </div>

            <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow text-center">
                <div class="flex justify-center mb-3">
                    <flux:icon name="user-group" class="w-10 h-10 text-indigo-500" />
                </div>
                <h3 class="font-semibold text-lg mb-2">Poli Spesialis</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm">
                    Dokter berpengalaman untuk berbagai bidang kesehatan.
                </p>
            </div>

            <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow text-center">
                <div class="flex justify-center mb-3">
                    <flux:icon name="academic-cap" class="w-10 h-10 text-green-500" />
                </div>
                <h3 class="font-semibold text-lg mb-2">RS Pendidikan</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm">
                    Rumah sakit pendidikan dengan fasilitas modern.
                </p>
            </div>
        </div>

        <flux:separator class="my-12" />

        {{-- Berita Terbaru --}}
        <flux:heading size="xl" class="mb-6 text-center">Berita Terbaru</flux:heading>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow overflow-hidden">
                <img src="https://source.unsplash.com/400x200/?hospital" class="w-full h-40 object-cover"
                    alt="Berita">
                <div class="p-4">
                    <h4 class="font-semibold mb-2">Pembukaan Layanan Baru</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">
                        RS UMS kini membuka layanan unggulan baru untuk pasien...
                    </p>
                    <a href="#" class="text-indigo-600 text-sm font-medium hover:underline">Baca Selengkapnya</a>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow overflow-hidden">
                <img src="https://source.unsplash.com/400x200/?doctor" class="w-full h-40 object-cover" alt="Berita">
                <div class="p-4">
                    <h4 class="font-semibold mb-2">Kegiatan Bakti Sosial</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">
                        Tim RS UMS melaksanakan bakti sosial untuk masyarakat sekitar...
                    </p>
                    <a href="#" class="text-indigo-600 text-sm font-medium hover:underline">Baca Selengkapnya</a>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow overflow-hidden">
                <img src="https://source.unsplash.com/400x200/?medical" class="w-full h-40 object-cover" alt="Berita">
                <div class="p-4">
                    <h4 class="font-semibold mb-2">Pelatihan Tenaga Medis</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">
                        RS UMS mengadakan pelatihan khusus untuk tenaga medis...
                    </p>
                    <a href="#" class="text-indigo-600 text-sm font-medium hover:underline">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    </flux:main>

</div>






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