<!-- Navbar -->
<nav class="bg-white/95 backdrop-blur-md shadow-lg fixed w-full z-50 border-b border-blue-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-ums-blue to-ums-orange rounded-lg flex items-center justify-center shadow-lg">
                        <img src="./assets/logo_ums.png" alt="Hospital" class="w-10 h-10 object-contain">
                    </div>
                </div>

                <div>
                    <h1 class="text-xl font-bold text-ums-blue">RS UMS</h1>
                    <p class="text-xs text-gray-600">Rumah Sakit Terpercaya</p>
                </div>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-8">
                    <a href="{{ route('index') }}"
                        class="{{ request()->routeIs('index') ? 'text-ums-blue font-semibold bg-blue-50' : 'text-gray-700 hover:text-ums-blue hover:bg-blue-50' }} px-3 py-2 rounded-lg transition-all">
                        <i class="fas fa-home mr-2"></i>Beranda
                    </a>

                    {{-- Profil --}}
                    <a href="{{ route('profile') }}"
                        class="{{ request()->routeIs('profile') ? 'text-ums-blue font-semibold bg-blue-50' : 'text-gray-700 hover:text-ums-blue hover:bg-blue-50' }} px-3 py-2 rounded-lg transition-all">
                        <i class="fas fa-building mr-2"></i>Profil
                    </a>
                    <a href="#layanan"
                        class="text-gray-700 hover:text-ums-blue px-3 py-2 rounded-lg transition-all hover:bg-blue-50">
                        <i class="fas fa-heart mr-2"></i>Layanan
                    </a>
                    <a href="#berita"
                        class="text-gray-700 hover:text-ums-blue px-3 py-2 rounded-lg transition-all hover:bg-blue-50">
                        <i class="fas fa-newspaper mr-2"></i>Berita
                    </a>
                    <a href="#kontak"
                        class="text-gray-700 hover:text-ums-blue px-3 py-2 rounded-lg transition-all hover:bg-blue-50">
                        <i class="fas fa-phone mr-2"></i>Kontak
                    </a>
                    <a href="#login"
                        class="bg-gradient-to-r from-ums-blue to-blue-600 text-white px-6 py-2 rounded-lg hover:shadow-lg transition-all transform hover:-translate-y-0.5">
                        <i class="fas fa-sign-in-alt mr-2"></i>Login
                    </a>
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button id="mobile-menu-btn" class="text-gray-700 hover:text-ums-blue p-2">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="#home" class="text-ums-blue font-semibold block px-3 py-2 rounded-md bg-blue-50">
                <i class="fas fa-home mr-2"></i>Beranda
            </a>
            <a href="#profil" class="text-gray-700 hover:text-ums-blue block px-3 py-2 rounded-md hover:bg-blue-50">
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
