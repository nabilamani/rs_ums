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
    <!-- Navbar -->
    <nav class="bg-white/95 backdrop-blur-md shadow-lg fixed w-full z-50 border-b border-blue-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-ums-blue to-ums-orange rounded-lg flex items-center justify-center shadow-lg">
                            <img src="../assets/logo_ums.png" alt="Hospital" class="w-10 h-10 object-contain">
                        </div>
                    </div>

                    <div>
                        <h1 class="text-xl font-bold text-blue-600">RS UMS</h1>
                        <p class="text-xs text-gray-600">Rumah Sakit AR Fachruddin</p>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <!-- Beranda Dropdown -->
                        <div class="relative group">
                            <a href="{{ route('index') }}"
                                class="{{ request()->routeIs('index') ? 'text-blue-600 font-semibold bg-blue-50' : 'text-gray-700 hover:text-blue-600 hover:bg-blue-50' }} px-3 py-2 rounded-lg transition-all flex items-center">
                                <i class="fas fa-home mr-2"></i>Beranda
                                <i
                                    class="fas fa-chevron-down ml-1 text-xs transition-transform group-hover:rotate-180"></i>
                            </a>
                            <div
                                class="absolute left-0 mt-2 w-64 bg-white rounded-lg shadow-xl border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                                <div class="py-2">
                                    <a href="#"
                                        class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                        <i class="fas fa-info-circle mr-3 text-blue-500"></i>
                                        <div>
                                            <div class="font-medium">Sambutan Direktur</div>
                                            <div class="text-xs text-gray-500">Pesan dari pimpinan</div>
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                        <i class="fas fa-eye mr-3 text-green-500"></i>
                                        <div>
                                            <div class="font-medium">Visi & Misi</div>
                                            <div class="text-xs text-gray-500">Tujuan dan harapan</div>
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                        <i class="fas fa-newspaper mr-3 text-purple-500"></i>
                                        <div>
                                            <div class="font-medium">Berita Terbaru</div>
                                            <div class="text-xs text-gray-500">Update informasi</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Profil Dropdown -->
                        <div class="relative group">
                            <a href="{{ route('profile') }}"
                                class="{{ request()->routeIs('profile') ? 'text-blue-600 font-semibold bg-blue-50' : 'text-gray-700 hover:text-blue-600 hover:bg-blue-50' }} px-3 py-2 rounded-lg transition-all flex items-center">
                                <i class="fas fa-building mr-2"></i>Profil
                                <i
                                    class="fas fa-chevron-down ml-1 text-xs transition-transform group-hover:rotate-180"></i>
                            </a>
                            <div
                                class="absolute left-0 mt-2 w-64 bg-white rounded-lg shadow-xl border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                                <div class="py-2">
                                    <a href="{{ route('profile') }}"
                                        class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                        <i class="fas fa-history mr-3 text-blue-500"></i>
                                        <div>
                                            <div class="font-medium">Sejarah</div>
                                            <div class="text-xs text-gray-500">Perjalanan rumah sakit</div>
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                        <i class="fas fa-sitemap mr-3 text-green-500"></i>
                                        <div>
                                            <div class="font-medium">Struktur Organisasi</div>
                                            <div class="text-xs text-gray-500">Manajemen rumah sakit</div>
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                        <i class="fas fa-award mr-3 text-yellow-500"></i>
                                        <div>
                                            <div class="font-medium">Akreditasi</div>
                                            <div class="text-xs text-gray-500">Sertifikat dan pengakuan</div>
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                        <i class="fas fa-map-marker-alt mr-3 text-red-500"></i>
                                        <div>
                                            <div class="font-medium">Lokasi & Denah</div>
                                            <div class="text-xs text-gray-500">Alamat dan petunjuk</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Layanan Dropdown -->
                        <div class="relative group">
                            <a href="{{ route('layanan') }}"
                                class="{{ request()->routeIs('layanan') ? 'text-blue-600 font-semibold bg-blue-50' : 'text-gray-700 hover:text-blue-600 hover:bg-blue-50' }} px-3 py-2 rounded-lg transition-all flex items-center">
                                <i class="fas fa-heart mr-2"></i>Layanan
                                <i
                                    class="fas fa-chevron-down ml-1 text-xs transition-transform group-hover:rotate-180"></i>
                            </a>
                            <div
                                class="absolute left-0 mt-2 w-72 bg-white rounded-lg shadow-xl border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                                <div class="py-2">
                                    <a href="#"
                                        class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                        <i class="fas fa-user-md mr-3 text-blue-500"></i>
                                        <div>
                                            <div class="font-medium">Rawat Jalan</div>
                                            <div class="text-xs text-gray-500">Konsultasi dokter spesialis</div>
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                        <i class="fas fa-bed mr-3 text-green-500"></i>
                                        <div>
                                            <div class="font-medium">Rawat Inap</div>
                                            <div class="text-xs text-gray-500">Perawatan rumah sakit</div>
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                        <i class="fas fa-ambulance mr-3 text-red-500"></i>
                                        <div>
                                            <div class="font-medium">IGD</div>
                                            <div class="text-xs text-gray-500">Instalasi Gawat Darurat</div>
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                        <i class="fas fa-flask mr-3 text-purple-500"></i>
                                        <div>
                                            <div class="font-medium">Laboratorium</div>
                                            <div class="text-xs text-gray-500">Pemeriksaan dan analisis</div>
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                        <i class="fas fa-x-ray mr-3 text-orange-500"></i>
                                        <div>
                                            <div class="font-medium">Radiologi</div>
                                            <div class="text-xs text-gray-500">Rontgen dan CT-Scan</div>
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                        <i class="fas fa-pills mr-3 text-teal-500"></i>
                                        <div>
                                            <div class="font-medium">Farmasi</div>
                                            <div class="text-xs text-gray-500">Apotek rumah sakit</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Informasi Dropdown -->
                        <div class="relative group">
                            <a href="{{ route('artikel') }}"
                                class="{{ request()->routeIs('artikel') ? 'text-blue-600 font-semibold bg-blue-50' : 'text-gray-700 hover:text-blue-600 hover:bg-blue-50' }} px-3 py-2 rounded-lg transition-all flex items-center">
                                <i class="fas fa-newspaper mr-2"></i>Informasi
                                <i
                                    class="fas fa-chevron-down ml-1 text-xs transition-transform group-hover:rotate-180"></i>
                            </a>
                            <div
                                class="absolute left-0 mt-2 w-64 bg-white rounded-lg shadow-xl border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                                <div class="py-2">
                                    <a href="#"
                                        class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                        <i class="fas fa-bullhorn mr-3 text-blue-500"></i>
                                        <div>
                                            <div class="font-medium">Pengumuman</div>
                                            <div class="text-xs text-gray-500">Info terbaru</div>
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                        <i class="fas fa-calendar-check mr-3 text-green-500"></i>
                                        <div>
                                            <div class="font-medium">Event & Kegiatan</div>
                                            <div class="text-xs text-gray-500">Agenda mendatang</div>
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                        <i class="fas fa-file-download mr-3 text-purple-500"></i>
                                        <div>
                                            <div class="font-medium">Download</div>
                                            <div class="text-xs text-gray-500">Formulir dan dokumen</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Jadwal Dokter Dropdown -->
                        <div class="relative group">
                            <a href="{{ route('jadwal-dokter') }}" class="{{ request()->routeIs('jadwal-dokter') ? 'text-blue-600 font-semibold bg-blue-50' : 'text-gray-700 hover:text-blue-600 hover:bg-blue-50' }} px-3 py-2 rounded-lg transition-all flex items-center">
                            <i class="fa-solid fa-calendar mr-2"></i>Jadwal Dokter
                            <i class="fas fa-chevron-down ml-1 text-xs transition-transform group-hover:rotate-180"></i>
                        </a>
                            <div
                                class="absolute left-0 mt-2 w-64 bg-white rounded-lg shadow-xl border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                                <div class="py-2">
                                    <a href="#"
                                        class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                        <i class="fas fa-search mr-3 text-blue-500"></i>
                                        <div>
                                            <div class="font-medium">Cari Dokter</div>
                                            <div class="text-xs text-gray-500">Pencarian berdasarkan nama</div>
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                        <i class="fas fa-stethoscope mr-3 text-green-500"></i>
                                        <div>
                                            <div class="font-medium">Spesialis</div>
                                            <div class="text-xs text-gray-500">Dokter berdasarkan bidang</div>
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                        <i class="fas fa-clock mr-3 text-orange-500"></i>
                                        <div>
                                            <div class="font-medium">Jadwal Hari Ini</div>
                                            <div class="text-xs text-gray-500">Dokter yang tersedia</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- Kontak Darurat Group --}}
                        <div class="flex items-center space-x-4">
                            {{-- Emergency --}}
                            <a href="tel:112"
                                class="relative group flex items-center justify-center w-10 h-10 rounded-full bg-red-100 text-red-600 hover:bg-red-200 transition-all"
                                aria-label="Emergency">
                                <i class="fas fa-ambulance text-lg"></i>
                                <span
                                    class="absolute top-full mt-2 px-2 py-1 text-xs text-white bg-red-600 rounded opacity-0 group-hover:opacity-100 group-hover:translate-y-0 -translate-y-1 transition">
                                    Emergency
                                </span>
                            </a>

                            {{-- Call Center --}}
                            <a href="tel:0271xxxxxx"
                                class="relative group flex items-center justify-center w-10 h-10 rounded-full bg-blue-100 text-blue-600 hover:bg-blue-200 transition-all"
                                aria-label="Call Center">
                                <i class="fas fa-phone-alt text-lg"></i>
                                <span
                                    class="absolute top-full mt-2 px-2 py-1 text-xs text-white bg-blue-600 rounded opacity-0 group-hover:opacity-100 group-hover:translate-y-0 -translate-y-1 transition">
                                    Call Center
                                </span>
                            </a>

                            {{-- WhatsApp --}}
                            <a href="https://wa.me/628xxxxxxxxxx" target="_blank"
                                class="relative group flex items-center justify-center w-10 h-10 rounded-full bg-green-100 text-green-600 hover:bg-green-200 transition-all"
                                aria-label="WhatsApp">
                                <i class="fab fa-whatsapp text-lg"></i>
                                <span
                                    class="absolute top-full mt-2 px-2 py-1 text-xs text-white bg-green-600 rounded opacity-0 group-hover:opacity-100 group-hover:translate-y-0 -translate-y-1 transition">
                                    WhatsApp
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="text-gray-700 hover:text-blue-600 p-2">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <!-- Mobile Beranda -->
                <div class="mobile-dropdown">
                    <button
                        class="mobile-dropdown-btn w-full text-left px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-md flex items-center justify-between">
                        <span><i class="fas fa-home mr-2"></i>Beranda</span>
                        <i class="fas fa-chevron-down transition-transform"></i>
                    </button>
                    <div class="mobile-dropdown-content hidden pl-6 space-y-1">
                        <a href="#"
                            class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Sambutan
                            Direktur</a>
                        <a href="#"
                            class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Visi
                            & Misi</a>
                        <a href="#"
                            class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Berita
                            Terbaru</a>
                    </div>
                </div>

                <!-- Mobile Profil -->
                <div class="mobile-dropdown">
                    <button
                        class="mobile-dropdown-btn w-full text-left px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-md flex items-center justify-between">
                        <span><i class="fas fa-building mr-2"></i>Profil</span>
                        <i class="fas fa-chevron-down transition-transform"></i>
                    </button>
                    <div class="mobile-dropdown-content hidden pl-6 space-y-1">
                        <a href="#"
                            class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Sejarah</a>
                        <a href="#"
                            class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Struktur
                            Organisasi</a>
                        <a href="#"
                            class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Akreditasi</a>
                        <a href="#"
                            class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Lokasi
                            & Denah</a>
                    </div>
                </div>

                <!-- Mobile Layanan -->
                <div class="mobile-dropdown">
                    <button
                        class="mobile-dropdown-btn w-full text-left px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-md flex items-center justify-between">
                        <span><i class="fas fa-heart mr-2"></i>Layanan</span>
                        <i class="fas fa-chevron-down transition-transform"></i>
                    </button>
                    <div class="mobile-dropdown-content hidden pl-6 space-y-1">
                        <a href="#"
                            class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Rawat
                            Jalan</a>
                        <a href="#"
                            class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Rawat
                            Inap</a>
                        <a href="#"
                            class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">IGD</a>
                        <a href="#"
                            class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Laboratorium</a>
                        <a href="#"
                            class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-50 rounded-md">Radiologi</a>
                        <a href="#"
                            class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Farmasi</a>
                    </div>
                </div>

                <!-- Mobile Informasi -->
                <div class="mobile-dropdown">
                    <button
                        class="mobile-dropdown-btn w-full text-left px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-md flex items-center justify-between">
                        <span><i class="fas fa-newspaper mr-2"></i>Informasi</span>
                        <i class="fas fa-chevron-down transition-transform"></i>
                    </button>
                    <div class="mobile-dropdown-content hidden pl-6 space-y-1">
                        <a href="#"
                            class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Pengumuman</a>
                        <a href="#"
                            class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Event
                            & Kegiatan</a>
                        <a href="#"
                            class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Download</a>
                    </div>
                </div>

                <!-- Mobile Jadwal Dokter -->
                <div class="mobile-dropdown">
                    <button
                        class="mobile-dropdown-btn w-full text-left px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-md flex items-center justify-between">
                        <span><i class="fa-solid fa-calendar mr-2"></i>Jadwal Dokter</span>
                        <i class="fas fa-chevron-down transition-transform"></i>
                    </button>
                    <div class="mobile-dropdown-content hidden pl-6 space-y-1">
                        <a href="#"
                            class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Cari
                            Dokter</a>
                        <a href="#"
                            class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Spesialis</a>
                        <a href="#"
                            class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Jadwal
                            Hari Ini</a>
                    </div>
                </div>

                <!-- Mobile Emergency Contacts -->
                <div class="border-t border-gray-200 pt-3 mt-3">
                    <div class="flex justify-center space-x-4">
                        <a href="tel:112"
                            class="flex items-center justify-center w-12 h-12 rounded-full bg-red-100 text-red-600">
                            <i class="fas fa-ambulance"></i>
                        </a>
                        <a href="tel:0271xxxxxx"
                            class="flex items-center justify-center w-12 h-12 rounded-full bg-blue-100 text-blue-600">
                            <i class="fas fa-phone-alt"></i>
                        </a>
                        <a href="https://wa.me/628xxxxxxxxxx" target="_blank"
                            class="flex items-center justify-center w-12 h-12 rounded-full bg-green-100 text-green-600">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- JavaScript -->
    <script>
        // Mobile menu toggle
const mobileMenuBtn = document.getElementById('mobile-menu-btn');
const mobileMenu = document.getElementById('mobile-menu');

if (mobileMenuBtn && mobileMenu) {
    mobileMenuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
}

// Mobile dropdown functionality
document.querySelectorAll('.mobile-dropdown-btn').forEach(button => {
    button.addEventListener('click', (e) => {
        e.preventDefault();
        const dropdown = button.closest('.mobile-dropdown');
        const content = dropdown.querySelector('.mobile-dropdown-content');
        const icon = button.querySelector('.fas.fa-chevron-down');
        
        // Close other dropdowns
        document.querySelectorAll('.mobile-dropdown').forEach(otherDropdown => {
            if (otherDropdown !== dropdown) {
                const otherContent = otherDropdown.querySelector('.mobile-dropdown-content');
                const otherIcon = otherDropdown.querySelector('.fas.fa-chevron-down');
                otherContent.classList.add('hidden');
                otherIcon.classList.remove('rotate-180');
            }
        });
        
        // Toggle current dropdown
        content.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
    });
});

// Close mobile menu when clicking outside
document.addEventListener('click', (e) => {
    if (!e.target.closest('nav') && !mobileMenu.classList.contains('hidden')) {
        mobileMenu.classList.add('hidden');
    }
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



        @keyframes fadeOut {
            to {
                opacity: 0;
                pointer-events: none;
            }
        }

        /* Custom scrollbar */
        /* ::-webkit-scrollbar {
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
        } */
    </style>
</body>

</html>
