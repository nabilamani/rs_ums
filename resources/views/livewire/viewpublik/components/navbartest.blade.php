<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    @include('partials.head')
</head>
<body class="min-h-screen">

    {{-- HEADER / NAVBAR --}}
    <flux:header container class="fixed top-0 left-0 right-0 z-50 bg-blue-800 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700 rounded-4xl m-5">
        {{-- Toggle Sidebar Mobile --}}
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        {{-- Logo + Brand --}}
        <flux:brand 
            href="#" 
            logo="{{ asset('assets/logo_ums.png') }}"
            logo:dark="{{ asset('assets/logo_warna.png') }}"
            name="RS UMS"
            class="max-lg:hidden! hidden dark:flex"
        />

        {{-- NAVBAR MENU --}}
        <flux:navbar class="-mb-px max-lg:hidden ">
            <flux:navbar.item icon="home" href="#">Beranda</flux:navbar.item>
            <flux:navbar.item icon="building-office" href="#">Profil</flux:navbar.item>
            <flux:navbar.item icon="heart" href="#">Layanan</flux:navbar.item>
            <flux:navbar.item icon="newspaper" href="#">Berita</flux:navbar.item>
            <flux:navbar.item icon="phone" href="#">Kontak</flux:navbar.item>
        </flux:navbar>

        <flux:spacer />


        {{-- Tombol login sederhana --}}
        <flux:navbar>
            <flux:navbar.item icon="arrow-right-start-on-rectangle" href="#">
                Login
            </flux:navbar.item>
        </flux:navbar>

        
        {{-- Theme Toggle (Light/Dark) --}}
        <flux:switch x-data x-model="$flux.dark" label="Dark mode"  />
    </flux:header>

    {{-- SIDEBAR untuk mobile --}}
    <flux:sidebar sticky collapsible="mobile" class="lg:hidden bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
        <flux:sidebar.header>
            <flux:sidebar.brand
                href="#"
                logo="{{ asset('assets/logo_ums.png') }}"
                logo:dark="{{ asset('assets/logo_warna.png') }}"
                name="RS UMS"
            />
            <flux:sidebar.collapse />
        </flux:sidebar.header>

        <flux:sidebar.nav>
            <flux:sidebar.item icon="home" href="#">Beranda</flux:sidebar.item>
            <flux:sidebar.item icon="building-office" href="#">Profil</flux:sidebar.item>
            <flux:sidebar.item icon="heart" href="#">Layanan</flux:sidebar.item>
            <flux:sidebar.item icon="newspaper" href="#">Artkel</flux:sidebar.item>
            <flux:sidebar.item icon="phone" href="#">Kontak</flux:sidebar.item>
        </flux:sidebar.nav>
    </flux:sidebar>

    @fluxScripts
</body>
</html>




<!-- Navbar -->
<nav class="bg-white/95 backdrop-blur-md shadow-lg fixed w-full z-50 border-b border-blue-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-blue-600 to-orange-500 rounded-lg flex items-center justify-center shadow-lg">
                        <i class="fas fa-hospital text-white text-xl"></i>
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
                        <button class="text-gray-700 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition-all flex items-center">
                            <i class="fas fa-home mr-2"></i>Beranda
                            <i class="fas fa-chevron-down ml-1 text-xs transition-transform group-hover:rotate-180"></i>
                        </button>
                        <div class="absolute left-0 mt-2 w-64 bg-white rounded-lg shadow-xl border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                            <div class="py-2">
                                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                    <i class="fas fa-info-circle mr-3 text-blue-500"></i>
                                    <div>
                                        <div class="font-medium">Sambutan Direktur</div>
                                        <div class="text-xs text-gray-500">Pesan dari pimpinan</div>
                                    </div>
                                </a>
                                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                    <i class="fas fa-eye mr-3 text-green-500"></i>
                                    <div>
                                        <div class="font-medium">Visi & Misi</div>
                                        <div class="text-xs text-gray-500">Tujuan dan harapan</div>
                                    </div>
                                </a>
                                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
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
                        <button class="text-gray-700 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition-all flex items-center">
                            <i class="fas fa-building mr-2"></i>Profil
                            <i class="fas fa-chevron-down ml-1 text-xs transition-transform group-hover:rotate-180"></i>
                        </button>
                        <div class="absolute left-0 mt-2 w-64 bg-white rounded-lg shadow-xl border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                            <div class="py-2">
                                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                    <i class="fas fa-history mr-3 text-blue-500"></i>
                                    <div>
                                        <div class="font-medium">Sejarah</div>
                                        <div class="text-xs text-gray-500">Perjalanan rumah sakit</div>
                                    </div>
                                </a>
                                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                    <i class="fas fa-sitemap mr-3 text-green-500"></i>
                                    <div>
                                        <div class="font-medium">Struktur Organisasi</div>
                                        <div class="text-xs text-gray-500">Manajemen rumah sakit</div>
                                    </div>
                                </a>
                                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                    <i class="fas fa-award mr-3 text-yellow-500"></i>
                                    <div>
                                        <div class="font-medium">Akreditasi</div>
                                        <div class="text-xs text-gray-500">Sertifikat dan pengakuan</div>
                                    </div>
                                </a>
                                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
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
                        <button class="text-gray-700 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition-all flex items-center">
                            <i class="fas fa-heart mr-2"></i>Layanan
                            <i class="fas fa-chevron-down ml-1 text-xs transition-transform group-hover:rotate-180"></i>
                        </button>
                        <div class="absolute left-0 mt-2 w-72 bg-white rounded-lg shadow-xl border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                            <div class="py-2">
                                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                    <i class="fas fa-user-md mr-3 text-blue-500"></i>
                                    <div>
                                        <div class="font-medium">Rawat Jalan</div>
                                        <div class="text-xs text-gray-500">Konsultasi dokter spesialis</div>
                                    </div>
                                </a>
                                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                    <i class="fas fa-bed mr-3 text-green-500"></i>
                                    <div>
                                        <div class="font-medium">Rawat Inap</div>
                                        <div class="text-xs text-gray-500">Perawatan rumah sakit</div>
                                    </div>
                                </a>
                                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                    <i class="fas fa-ambulance mr-3 text-red-500"></i>
                                    <div>
                                        <div class="font-medium">IGD</div>
                                        <div class="text-xs text-gray-500">Instalasi Gawat Darurat</div>
                                    </div>
                                </a>
                                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                    <i class="fas fa-flask mr-3 text-purple-500"></i>
                                    <div>
                                        <div class="font-medium">Laboratorium</div>
                                        <div class="text-xs text-gray-500">Pemeriksaan dan analisis</div>
                                    </div>
                                </a>
                                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                    <i class="fas fa-x-ray mr-3 text-orange-500"></i>
                                    <div>
                                        <div class="font-medium">Radiologi</div>
                                        <div class="text-xs text-gray-500">Rontgen dan CT-Scan</div>
                                    </div>
                                </a>
                                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
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
                        <button class="text-gray-700 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition-all flex items-center">
                            <i class="fas fa-newspaper mr-2"></i>Informasi
                            <i class="fas fa-chevron-down ml-1 text-xs transition-transform group-hover:rotate-180"></i>
                        </button>
                        <div class="absolute left-0 mt-2 w-64 bg-white rounded-lg shadow-xl border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                            <div class="py-2">
                                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                    <i class="fas fa-bullhorn mr-3 text-blue-500"></i>
                                    <div>
                                        <div class="font-medium">Pengumuman</div>
                                        <div class="text-xs text-gray-500">Info terbaru</div>
                                    </div>
                                </a>
                                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                    <i class="fas fa-calendar-check mr-3 text-green-500"></i>
                                    <div>
                                        <div class="font-medium">Event & Kegiatan</div>
                                        <div class="text-xs text-gray-500">Agenda mendatang</div>
                                    </div>
                                </a>
                                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
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
                        <button class="text-gray-700 hover:text-blue-600 hover:bg-blue-50 px-3 py-2 rounded-lg transition-all flex items-center">
                            <i class="fa-solid fa-calendar mr-2"></i>Jadwal Dokter
                            <i class="fas fa-chevron-down ml-1 text-xs transition-transform group-hover:rotate-180"></i>
                        </button>
                        <div class="absolute left-0 mt-2 w-64 bg-white rounded-lg shadow-xl border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                            <div class="py-2">
                                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                    <i class="fas fa-search mr-3 text-blue-500"></i>
                                    <div>
                                        <div class="font-medium">Cari Dokter</div>
                                        <div class="text-xs text-gray-500">Pencarian berdasarkan nama</div>
                                    </div>
                                </a>
                                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                    <i class="fas fa-stethoscope mr-3 text-green-500"></i>
                                    <div>
                                        <div class="font-medium">Spesialis</div>
                                        <div class="text-xs text-gray-500">Dokter berdasarkan bidang</div>
                                    </div>
                                </a>
                                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all">
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
                <button class="mobile-dropdown-btn w-full text-left px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-md flex items-center justify-between">
                    <span><i class="fas fa-home mr-2"></i>Beranda</span>
                    <i class="fas fa-chevron-down transition-transform"></i>
                </button>
                <div class="mobile-dropdown-content hidden pl-6 space-y-1">
                    <a href="#" class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Sambutan Direktur</a>
                    <a href="#" class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Visi & Misi</a>
                    <a href="#" class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Berita Terbaru</a>
                </div>
            </div>

            <!-- Mobile Profil -->
            <div class="mobile-dropdown">
                <button class="mobile-dropdown-btn w-full text-left px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-md flex items-center justify-between">
                    <span><i class="fas fa-building mr-2"></i>Profil</span>
                    <i class="fas fa-chevron-down transition-transform"></i>
                </button>
                <div class="mobile-dropdown-content hidden pl-6 space-y-1">
                    <a href="#" class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Sejarah</a>
                    <a href="#" class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Struktur Organisasi</a>
                    <a href="#" class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Akreditasi</a>
                    <a href="#" class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Lokasi & Denah</a>
                </div>
            </div>

            <!-- Mobile Layanan -->
            <div class="mobile-dropdown">
                <button class="mobile-dropdown-btn w-full text-left px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-md flex items-center justify-between">
                    <span><i class="fas fa-heart mr-2"></i>Layanan</span>
                    <i class="fas fa-chevron-down transition-transform"></i>
                </button>
                <div class="mobile-dropdown-content hidden pl-6 space-y-1">
                    <a href="#" class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Rawat Jalan</a>
                    <a href="#" class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Rawat Inap</a>
                    <a href="#" class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">IGD</a>
                    <a href="#" class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Laboratorium</a>
                    <a href="#" class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-50 rounded-md">Radiologi</a>
                    <a href="#" class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Farmasi</a>
                </div>
            </div>

            <!-- Mobile Informasi -->
            <div class="mobile-dropdown">
                <button class="mobile-dropdown-btn w-full text-left px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-md flex items-center justify-between">
                    <span><i class="fas fa-newspaper mr-2"></i>Informasi</span>
                    <i class="fas fa-chevron-down transition-transform"></i>
                </button>
                <div class="mobile-dropdown-content hidden pl-6 space-y-1">
                    <a href="#" class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Pengumuman</a>
                    <a href="#" class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Event & Kegiatan</a>
                    <a href="#" class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Download</a>
                </div>
            </div>

            <!-- Mobile Jadwal Dokter -->
            <div class="mobile-dropdown">
                <button class="mobile-dropdown-btn w-full text-left px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-md flex items-center justify-between">
                    <span><i class="fa-solid fa-calendar mr-2"></i>Jadwal Dokter</span>
                    <i class="fas fa-chevron-down transition-transform"></i>
                </button>
                <div class="mobile-dropdown-content hidden pl-6 space-y-1">
                    <a href="#" class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Cari Dokter</a>
                    <a href="#" class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Spesialis</a>
                    <a href="#" class="block px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">Jadwal Hari Ini</a>
                </div>
            </div>

            <!-- Mobile Emergency Contacts -->
            <div class="border-t border-gray-200 pt-3 mt-3">
                <div class="flex justify-center space-x-4">
                    <a href="tel:112" class="flex items-center justify-center w-12 h-12 rounded-full bg-red-100 text-red-600">
                        <i class="fas fa-ambulance"></i>
                    </a>
                    <a href="tel:0271xxxxxx" class="flex items-center justify-center w-12 h-12 rounded-full bg-blue-100 text-blue-600">
                        <i class="fas fa-phone-alt"></i>
                    </a>
                    <a href="https://wa.me/628xxxxxxxxxx" target="_blank" class="flex items-center justify-center w-12 h-12 rounded-full bg-green-100 text-green-600">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>