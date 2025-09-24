<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./assets/logo_ums.png">
    <title>Profil RS UMS - Rumah Sakit Universitas Muhammadiyah Surakarta</title>
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
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'slide-in-right': 'slideInRight 0.6s ease-out',
                        'zoom-in': 'zoomIn 0.5s ease-out'
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
                        },
                        slideInRight: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateX(30px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateX(0)'
                            }
                        },
                        zoomIn: {
                            '0%': {
                                opacity: '0',
                                transform: 'scale(0.9)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'scale(1)'
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
    

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#home" class="text-gray-700 hover:text-ums-blue block px-3 py-2 rounded-md hover:bg-blue-50">
                    <i class="fas fa-home mr-2"></i>Beranda
                </a>
                <a href="#profil" class="text-ums-blue font-semibold block px-3 py-2 rounded-md bg-blue-50">
                    <i class="fas fa-building mr-2"></i>Profil
                </a>
                <a href="#layanan" class="text-gray-700 hover:text-ums-blue block px-3 py-2 rounded-md hover:bg-blue-50">
                    <i class="fas fa-heart mr-2"></i>Layanan
                </a>
                <a href="#berita" class="text-gray-700 hover:text-ums-blue block px-3 py-2 rounded-md hover:bg-blue-50">
                    <i class="fas fa-newspaper mr-2"></i>Berita
                </a>
                <a href="#kontak" class="text-gray-700 hover:text-ums-blue block px-3 py-2 rounded-md hover:bg-blue-50">
                    <i class="fas fa-phone mr-2"></i>Kontak
                </a>
                <a href="#login"
                    class="bg-gradient-to-r from-ums-blue to-blue-600 text-white block px-3 py-2 rounded-md mx-3 mt-2 text-center">
                    <i class="fas fa-sign-in-alt mr-2"></i>Login
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="profil" class="pt-24 pb-16 relative overflow-hidden">
        <!-- Background decorative elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-32 w-80 h-80 bg-blue-200 rounded-full opacity-20 animate-pulse-slow">
            </div>
            <div class="absolute top-20 -left-32 w-64 h-64 bg-orange-200 rounded-full opacity-20 animate-float"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <div class="inline-flex items-center px-4 py-2 bg-blue-100 rounded-full text-ums-blue text-sm font-medium mb-6 animate-fade-in-up">
                    <i class="fas fa-building-flag mr-2"></i>
                    Profil Rumah Sakit
                </div>
                <h1 class="text-5xl lg:text-6xl font-bold text-gray-900 leading-tight mb-6 animate-fade-in-up">
                    Profil
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-ums-blue to-ums-orange">
                        RS UMS
                    </span>
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">
                    Mengenal lebih dekat Rumah Sakit Universitas Muhammadiyah Surakarta yang telah melayani masyarakat dengan dedikasi tinggi
                </p>
            </div>
        </div>
    </section>

    <!-- Tentang RS Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Left Content -->
                <div class="animate-fade-in-up">
                    <h2 class="text-4xl font-bold text-gray-900 mb-6">
                        Tentang 
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-ums-blue to-ums-orange">
                            RS UMS
                        </span>
                    </h2>
                    <p class="text-lg text-gray-600 leading-relaxed mb-6">
                        Rumah Sakit Universitas Muhammadiyah Surakarta (RS UMS) adalah rumah sakit pendidikan yang berdiri sejak tahun 2000, 
                        berkomitmen memberikan pelayanan kesehatan yang berkualitas tinggi dengan mengedepankan nilai-nilai kemanusiaan dan 
                        keislaman.
                    </p>
                    <p class="text-lg text-gray-600 leading-relaxed mb-6">
                        Sebagai rumah sakit pendidikan, RS UMS tidak hanya fokus pada pelayanan medis, tetapi juga berperan aktif dalam 
                        pendidikan tenaga kesehatan, penelitian, dan pengabdian kepada masyarakat. Dengan fasilitas yang modern dan 
                        terintegrasi, RS UMS terus mengembangkan pelayanan untuk memenuhi kebutuhan kesehatan masyarakat.
                    </p>
                    <div class="grid grid-cols-2 gap-6 mt-8">
                        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-6 rounded-xl border border-blue-100">
                            <div class="text-3xl font-bold text-ums-blue mb-2">2000</div>
                            <div class="text-sm text-gray-600">Tahun Didirikan</div>
                        </div>
                        <div class="bg-gradient-to-br from-orange-50 to-amber-50 p-6 rounded-xl border border-orange-100">
                            <div class="text-3xl font-bold text-ums-orange mb-2">A</div>
                            <div class="text-sm text-gray-600">Akreditasi KARS</div>
                        </div>
                    </div>
                </div>

                <!-- Right Content -->
                <div class="relative animate-slide-in-right">
                    <div class="relative z-10 rounded-2xl shadow-2xl overflow-hidden">
                        <img src="https://asedino.com/wp-content/uploads/2021/06/Info-Proyek-Solo-Desain-Modern-Futuristik-Rumah-Sakit-UMS-Kota-Solo-%E2%80%93-Proyek-Rumah-Sakit-di-Solo-%E2%80%93-Berita-Proyek-Terbaru-di-Solo.jpg" 
                             alt="RS UMS Building" class="w-full h-96 object-cover">
                    </div>
                    
                    <!-- Floating stats card -->
                    <div class="absolute -bottom-6 -left-6 bg-white rounded-xl shadow-lg p-6 z-20 animate-zoom-in">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-trophy text-green-600 text-xl"></i>
                            </div>
                            <div>
                                <p class="font-bold text-lg">25+ Tahun</p>
                                <p class="text-sm text-gray-600">Pengalaman Melayani</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi Misi Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    Visi & 
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-ums-blue to-ums-orange">
                        Misi
                    </span>
                </h2>
                <p class="text-xl text-gray-600">
                    Fondasi yang menguatkan komitmen kami dalam melayani
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Visi -->
                <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-all duration-300 animate-fade-in-up">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-ums-blue to-indigo-500 rounded-2xl flex items-center justify-center mr-4">
                            <i class="fas fa-eye text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Visi</h3>
                    </div>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        "Menjadi rumah sakit pendidikan yang unggul dalam pelayanan kesehatan, pendidikan, dan penelitian 
                        dengan nilai-nilai keislaman untuk kemaslahatan umat."
                    </p>
                </div>

                <!-- Misi -->
                <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.2s">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-ums-orange to-amber-500 rounded-2xl flex items-center justify-center mr-4">
                            <i class="fas fa-bullseye text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Misi</h3>
                    </div>
                    <ul class="space-y-4 text-gray-600">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-ums-orange mt-1 mr-3"></i>
                            <span>Menyelenggarakan pelayanan kesehatan yang berkualitas, aman, dan terjangkau</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-ums-orange mt-1 mr-3"></i>
                            <span>Mengembangkan pendidikan tenaga kesehatan yang profesional dan berakhlak mulia</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-ums-orange mt-1 mr-3"></i>
                            <span>Melakukan penelitian dan pengembangan ilmu pengetahuan kesehatan</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-ums-orange mt-1 mr-3"></i>
                            <span>Mengabdikan diri kepada masyarakat melalui program kesehatan</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Nilai-nilai Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    Nilai-nilai
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-ums-blue to-ums-orange">
                        Kami
                    </span>
                </h2>
                <p class="text-xl text-gray-600">
                    Prinsip yang menjadi pedoman dalam setiap langkah pelayanan kami
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Value 1 -->
                <div class="group text-center p-6 rounded-2xl hover:bg-gradient-to-br hover:from-blue-50 hover:to-indigo-50 transition-all duration-300 animate-fade-in-up">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-heart text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Compassionate</h3>
                    <p class="text-gray-600">Melayani dengan penuh kasih sayang dan empati kepada setiap pasien</p>
                </div>

                <!-- Value 2 -->
                <div class="group text-center p-6 rounded-2xl hover:bg-gradient-to-br hover:from-green-50 hover:to-emerald-50 transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.1s">
                    <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-emerald-500 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-award text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Excellence</h3>
                    <p class="text-gray-600">Mengutamakan kualitas dan keunggulan dalam setiap aspek pelayanan</p>
                </div>

                <!-- Value 3 -->
                <div class="group text-center p-6 rounded-2xl hover:bg-gradient-to-br hover:from-orange-50 hover:to-amber-50 transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.2s">
                    <div class="w-20 h-20 bg-gradient-to-br from-ums-orange to-amber-500 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-handshake text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Integrity</h3>
                    <p class="text-gray-600">Menjunjung tinggi kejujuran, transparansi, dan akuntabilitas</p>
                </div>

                <!-- Value 4 -->
                <div class="group text-center p-6 rounded-2xl hover:bg-gradient-to-br hover:from-purple-50 hover:to-violet-50 transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.3s">
                    <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-violet-500 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-lightbulb text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Innovation</h3>
                    <p class="text-gray-600">Terus berinovasi mengembangkan teknologi dan metode terdepan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Fasilitas & Prestasi Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16">
                <!-- Fasilitas -->
                <div class="animate-fade-in-up">
                    <h2 class="text-3xl font-bold text-gray-900 mb-8">
                        Fasilitas
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-ums-blue to-ums-orange">
                            Unggulan
                        </span>
                    </h2>
                    <div class="space-y-6">
                        <div class="flex items-center p-4 bg-white rounded-xl shadow-sm">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-bed text-ums-blue"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Rawat Inap</h4>
                                <p class="text-sm text-gray-600">120 tempat tidur dengan berbagai kelas perawatan</p>
                            </div>
                        </div>

                        <div class="flex items-center p-4 bg-white rounded-xl shadow-sm">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-user-md text-green-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">ICU & NICU</h4>
                                <p class="text-sm text-gray-600">Unit perawatan intensif dengan peralatan canggih</p>
                            </div>
                        </div>

                        <div class="flex items-center p-4 bg-white rounded-xl shadow-sm">
                            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-x-ray text-ums-orange"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Radiologi</h4>
                                <p class="text-sm text-gray-600">CT Scan, MRI, USG, dan Rontgen digital</p>
                            </div>
                        </div>

                        <div class="flex items-center p-4 bg-white rounded-xl shadow-sm">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-microscope text-purple-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Laboratorium</h4>
                                <p class="text-sm text-gray-600">Lab Patologi Klinik dan Patologi Anatomi</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Prestasi -->
                <div class="animate-slide-in-right">
                    <h2 class="text-3xl font-bold text-gray-900 mb-8">
                        Prestasi &
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-ums-blue to-ums-orange">
                            Penghargaan
                        </span>
                    </h2>
                    <div class="space-y-6">
                        <div class="bg-white p-6 rounded-xl shadow-sm">
                            <div class="flex items-center mb-3">
                                <i class="fas fa-trophy text-yellow-500 text-xl mr-3"></i>
                                <h4 class="font-bold text-gray-900">Akreditasi KARS Tingkat Paripurna</h4>
                            </div>
                            <p class="text-gray-600 text-sm">Mencapai standar akreditasi tertinggi dari Komisi Akreditasi Rumah Sakit Indonesia</p>
                        </div>

                        <div class="bg-white p-6 rounded-xl shadow-sm">
                            <div class="flex items-center mb-3">
                                <i class="fas fa-certificate text-blue-500 text-xl mr-3"></i>
                                <h4 class="font-bold text-gray-900">ISO 9001:2015</h4>
                            </div>
                            <p class="text-gray-600 text-sm">Sertifikasi sistem manajemen mutu internasional</p>
                        </div>

                        <div class="bg-white p-6 rounded-xl shadow-sm">
                            <div class="flex items-center mb-3">
                                <i class="fas fa-shield-alt text-green-500 text-xl mr-3"></i>
                                <h4 class="font-bold text-gray-900">RS Sayang Ibu & Bayi</h4>
                            </div>
                            <p class="text-gray-600 text-sm">Penghargaan sebagai rumah sakit yang mendukung ASI eksklusif</p>
                        </div>

                        <div class="bg-white p-6 rounded-xl shadow-sm">
                            <div class="flex items-center mb-3">
                                <i class="fas fa-leaf text-green-600 text-xl mr-3"></i>
                                <h4 class="font-bold text-gray-900">Green Hospital</h4>
                            </div>
                            <p class="text-gray-600 text-sm">Komitmen terhadap lingkungan dan keberlanjutan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Struktur Organisasi Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    Struktur
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-ums-blue to-ums-orange">
                        Organisasi
                    </span>
                </h2>
                <p class="text-xl text-gray-600">
                    Tim kepemimpinan yang berpengalaman dan profesional
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Direktur -->
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-8 rounded-2xl text-center hover:shadow-xl transition-all duration-300 animate-fade-in-up">
                    <div class="w-20 h-20 bg-gradient-to-br from-ums-blue to-indigo-500 rounded-full mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-user-tie text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Direktur Utama</h3>
                    <p class="text-gray-600 mb-3">Dr. dr. Ahmad Santoso, Sp.PD</p>
                    <p class="text-sm text-gray-500">Memimpin operasional dan strategis RS UMS</p>
                </div>

                <!-- Wakil Direktur Medis -->
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-8 rounded-2xl text-center hover:shadow-xl transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.1s">
                    <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-emerald-500 rounded-full mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-stethoscope text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Wakil Direktur Medis</h3>
                    <p class="text-gray-600 mb-3">Dr. Siti Nurhayana, Sp.A</p>
                    <p class="text-sm text-gray-500">Mengawasi pelayanan medis dan keperawatan</p>
                </div>

                <!-- Wakil Direktur Non-Medis -->
                <div class="bg-gradient-to-br from-orange-50 to-amber-50 p-8 rounded-2xl text-center hover:shadow-xl transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.2s">
                    <div class="w-20 h-20 bg-gradient-to-br from-ums-orange to-amber-500 rounded-full mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-chart-line text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Wakil Direktur Non-Medis</h3>
                    <p class="text-gray-600 mb-3">Drs. Bambang Priyatno, MM</p>
                    <p class="text-sm text-gray-500">Mengelola administrasi dan keuangan</p>
                </div>

                <!-- Komite Medis -->
                <div class="bg-gradient-to-br from-purple-50 to-violet-50 p-8 rounded-2xl text-center hover:shadow-xl transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.3s">
                    <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-violet-500 rounded-full mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-users-cog text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Ketua Komite Medis</h3>
                    <p class="text-gray-600 mb-3">Dr. Hendra Wijaya, Sp.B</p>
                    <p class="text-sm text-gray-500">Mengawasi standar pelayanan medis</p>
                </div>

                <!-- Komite Keperawatan -->
                <div class="bg-gradient-to-br from-red-50 to-pink-50 p-8 rounded-2xl text-center hover:shadow-xl transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.4s">
                    <div class="w-20 h-20 bg-gradient-to-br from-red-500 to-pink-500 rounded-full mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-user-nurse text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Ketua Komite Keperawatan</h3>
                    <p class="text-gray-600 mb-3">Ns. Rina Sari, S.Kep, M.Kep</p>
                    <p class="text-sm text-gray-500">Mengawasi standar asuhan keperawatan</p>
                </div>

                <!-- Manajer Mutu -->
                <div class="bg-gradient-to-br from-teal-50 to-cyan-50 p-8 rounded-2xl text-center hover:shadow-xl transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.5s">
                    <div class="w-20 h-20 bg-gradient-to-br from-teal-500 to-cyan-500 rounded-full mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-quality text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Manajer Mutu & Keselamatan</h3>
                    <p class="text-gray-600 mb-3">Dr. Maya Sari, MARS</p>
                    <p class="text-sm text-gray-500">Menjamin kualitas dan keselamatan pasien</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistik Section -->
    <section class="py-20 bg-gradient-to-r from-ums-blue to-blue-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-white mb-4">
                    RS UMS dalam Angka
                </h2>
                <p class="text-xl text-blue-100">
                    Data dan pencapaian yang membanggakan
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Stat 1 -->
                <div class="text-center animate-fade-in-up">
                    <div class="text-5xl font-bold text-white mb-2">25+</div>
                    <div class="text-blue-100 text-lg mb-2">Tahun</div>
                    <div class="text-blue-200 text-sm">Melayani Masyarakat</div>
                </div>

                <!-- Stat 2 -->
                <div class="text-center animate-fade-in-up" style="animation-delay: 0.1s">
                    <div class="text-5xl font-bold text-white mb-2">50k+</div>
                    <div class="text-blue-100 text-lg mb-2">Pasien</div>
                    <div class="text-blue-200 text-sm">Dilayani per Tahun</div>
                </div>

                <!-- Stat 3 -->
                <div class="text-center animate-fade-in-up" style="animation-delay: 0.2s">
                    <div class="text-5xl font-bold text-white mb-2">200+</div>
                    <div class="text-blue-100 text-lg mb-2">Tenaga Medis</div>
                    <div class="text-blue-200 text-sm">Profesional Berpengalaman</div>
                </div>

                <!-- Stat 4 -->
                <div class="text-center animate-fade-in-up" style="animation-delay: 0.3s">
                    <div class="text-5xl font-bold text-white mb-2">120</div>
                    <div class="text-blue-100 text-lg mb-2">Tempat Tidur</div>
                    <div class="text-blue-200 text-sm">Rawat Inap</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Information Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    Hubungi
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-ums-blue to-ums-orange">
                        Kami
                    </span>
                </h2>
                <p class="text-xl text-gray-600">
                    Kami siap melayani Anda 24 jam setiap hari
                </p>
            </div>

            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Contact Info -->
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-8 rounded-2xl hover:shadow-xl transition-all duration-300 animate-fade-in-up">
                    <div class="w-16 h-16 bg-gradient-to-br from-ums-blue to-indigo-500 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-phone text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Telepon & Fax</h3>
                    <div class="space-y-2 text-gray-600">
                        <p><i class="fas fa-phone mr-2 text-ums-blue"></i>(0271) 717417</p>
                        <p><i class="fas fa-fax mr-2 text-ums-blue"></i>(0271) 780455</p>
                        <p><i class="fas fa-mobile-alt mr-2 text-ums-blue"></i>0812-3456-7890</p>
                    </div>
                </div>

                <!-- Email Info -->
                <div class="bg-gradient-to-br from-orange-50 to-amber-50 p-8 rounded-2xl hover:shadow-xl transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.1s">
                    <div class="w-16 h-16 bg-gradient-to-br from-ums-orange to-amber-500 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-envelope text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Email</h3>
                    <div class="space-y-2 text-gray-600">
                        <p><i class="fas fa-envelope mr-2 text-ums-orange"></i>info@rs-ums.ac.id</p>
                        <p><i class="fas fa-envelope mr-2 text-ums-orange"></i>admin@rs-ums.ac.id</p>
                        <p><i class="fas fa-globe mr-2 text-ums-orange"></i>www.rs-ums.ac.id</p>
                    </div>
                </div>

                <!-- Location Info -->
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-8 rounded-2xl hover:shadow-xl transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.2s">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-map-marker-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Alamat</h3>
                    <div class="text-gray-600">
                        <p><i class="fas fa-map-marker-alt mr-2 text-green-600"></i>Jl. Ahmad Yani, Tromol Pos 1</p>
                        <p class="ml-6">Pabelan, Kartasura</p>
                        <p class="ml-6">Surakarta, Jawa Tengah 57102</p>
                    </div>
                </div>
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
                                <i class="fas fa-chevron-right mr-2 text-xs text-ums-orange"></i>Beranda
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
        document.querySelectorAll('.group, [class*="animate-fade-in-up"], [class*="animate-slide-in-right"], [class*="animate-zoom-in"]').forEach(el => {
            observer.observe(el);
        });

        // Add loading animation
        window.addEventListener('load', () => {
            document.body.classList.add('loaded');
        });

        // Counter animation for statistics
        const animateCounter = (element, target, duration = 2000) => {
            let start = 0;
            const increment = target / (duration / 16);
            const timer = setInterval(() => {
                start += increment;
                if (start >= target) {
                    element.textContent = target + (element.textContent.includes('+') ? '+' : '');
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(start) + (element.textContent.includes('+') ? '+' : '');
                }
            }, 16);
        };

        // Trigger counter animation when statistics section is visible
        const statsSection = document.querySelector('.bg-gradient-to-r.from-ums-blue');
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = entry.target.querySelectorAll('.text-5xl');
                    counters.forEach((counter, index) => {
                        const target = parseInt(counter.textContent.replace(/\D/g, ''));
                        setTimeout(() => {
                            animateCounter(counter, target);
                        }, index * 200);
                    });
                    statsObserver.unobserve(entry.target);
                }
            });
        });

        if (statsSection) {
            statsObserver.observe(statsSection);
        }
    </script>

    <style>
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
            animation: fadeOut 0.5s ease-in-out 1s forwards;
        }

        @keyframes fadeOut {
            to {
                opacity: 0;
                pointer-events: none;
            }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #1E40AF, #F97316);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #1E3A8A, #EA580C);
        }
    </style>
</body>

</html>