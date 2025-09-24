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
                <a href="#layanan"
                    class="text-gray-700 hover:text-ums-blue block px-3 py-2 rounded-md hover:bg-blue-50">
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
