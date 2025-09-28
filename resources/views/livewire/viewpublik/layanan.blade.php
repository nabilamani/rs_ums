<style>
    html {
    overflow-y: scroll; /* Paksa scrollbar vertikal selalu tampil */
}

</style>
{{-- Navbar --}}
@include('livewire.viewpublik.components.navbar')
<!-- Hero Section -->
<section id="layanan" class="pt-24 pb-16 relative overflow-hidden">
    <!-- Background decorative elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-32 w-80 h-80 bg-green-200 rounded-full opacity-20 animate-pulse-slow"></div>
        <div class="absolute top-20 -left-32 w-64 h-64 bg-blue-200 rounded-full opacity-20 animate-float"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center  mt-10">
            <div
                class="inline-flex items-center px-4 py-2 bg-green-100 rounded-full text-green-700 text-sm font-medium mb-6 animate-fade-in-up">
                <i class="fas fa-stethoscope mr-2"></i>
                Layanan Kesehatan Terbaik
            </div>
            <h1 class="text-5xl lg:text-6xl font-bold text-gray-900 leading-tight mb-6 animate-fade-in-up">
                Layanan
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-ums-blue to-ums-orange">
                    Medis RS UMS
                </span>
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">
                Pelayanan kesehatan komprehensif dengan teknologi modern dan tenaga medis profesional berpengalaman
            </p>
        </div>
    </div>
</section>

<!-- Quick Services Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">
                Layanan
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-ums-blue to-ums-orange">
                    Unggulan
                </span>
            </h2>
            <p class="text-xl text-gray-600">Pelayanan cepat dan tepat untuk kebutuhan kesehatan Anda</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Emergency -->
            <div
                class="group bg-gradient-to-br from-red-50 to-pink-50 p-8 rounded-2xl hover:shadow-xl transition-all duration-300 animate-fade-in-up text-center border border-red-100">
                <div
                    class="w-20 h-20 bg-gradient-to-br from-red-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                    <i class="fas fa-ambulance text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Unit Gawat Darurat</h3>
                <p class="text-gray-600 mb-4">Layanan 24 jam untuk kondisi medis darurat dengan tim medis siaga</p>
                <div class="text-2xl font-bold text-red-600">24/7</div>
            </div>

            <!-- ICU -->
            <div class="group bg-gradient-to-br from-blue-50 to-indigo-50 p-8 rounded-2xl hover:shadow-xl transition-all duration-300 animate-fade-in-up text-center border border-blue-100"
                style="animation-delay: 0.1s">
                <div
                    class="w-20 h-20 bg-gradient-to-br from-ums-blue to-indigo-500 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                    <i class="fas fa-heartbeat text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">ICU & NICU</h3>
                <p class="text-gray-600 mb-4">Perawatan intensif dengan monitoring ketat dan peralatan canggih</p>
                <div class="text-2xl font-bold text-ums-blue">Premium</div>
            </div>

            <!-- Surgery -->
            <div class="group bg-gradient-to-br from-green-50 to-emerald-50 p-8 rounded-2xl hover:shadow-xl transition-all duration-300 animate-fade-in-up text-center border border-green-100"
                style="animation-delay: 0.2s">
                <div
                    class="w-20 h-20 bg-gradient-to-br from-green-500 to-emerald-500 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                    <i class="fas fa-procedures text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Kamar Operasi</h3>
                <p class="text-gray-600 mb-4">Fasilitas operasi modern dengan teknologi minimal invasif</p>
                <div class="text-2xl font-bold text-green-600">Modern</div>
            </div>

            <!-- Laboratory -->
            <div class="group bg-gradient-to-br from-purple-50 to-violet-50 p-8 rounded-2xl hover:shadow-xl transition-all duration-300 animate-fade-in-up text-center border border-purple-100"
                style="animation-delay: 0.3s">
                <div
                    class="w-20 h-20 bg-gradient-to-br from-purple-500 to-violet-500 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                    <i class="fas fa-microscope text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Laboratorium</h3>
                <p class="text-gray-600 mb-4">Pemeriksaan laboratorium lengkap dengan hasil akurat dan cepat</p>
                <div class="text-2xl font-bold text-purple-600">Akurat</div>
            </div>
        </div>
    </div>
</section>

<!-- Medical Specialties Section -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">
                Spesialisasi
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-ums-blue to-ums-orange">
                    Medis
                </span>
            </h2>
            <p class="text-xl text-gray-600">Tim dokter spesialis berpengalaman dengan kompetensi terdepan</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Cardiology -->
            <div
                class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-all duration-300 animate-fade-in-up">
                <div class="flex items-center mb-6">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-red-500 to-pink-500 rounded-2xl flex items-center justify-center mr-4">
                        <i class="fas fa-heart text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Kardiologi</h3>
                        <p class="text-sm text-gray-600">Jantung & Pembuluh Darah</p>
                    </div>
                </div>
                <p class="text-gray-600 mb-4">Pelayanan komprehensif untuk kesehatan jantung dan pembuluh darah dengan
                    teknologi diagnostik terkini.</p>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li><i class="fas fa-check text-red-500 mr-2"></i>EKG & Echocardiography</li>
                    <li><i class="fas fa-check text-red-500 mr-2"></i>Kateterisasi Jantung</li>
                    <li><i class="fas fa-check text-red-500 mr-2"></i>Treadmill Test</li>
                </ul>
            </div>

            <!-- Pediatrics -->
            <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-all duration-300 animate-fade-in-up"
                style="animation-delay: 0.1s">
                <div class="flex items-center mb-6">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center mr-4">
                        <i class="fas fa-baby text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Pediatri</h3>
                        <p class="text-sm text-gray-600">Kesehatan Anak</p>
                    </div>
                </div>
                <p class="text-gray-600 mb-4">Pelayanan kesehatan anak dari bayi hingga remaja dengan pendekatan yang
                    ramah dan profesional.</p>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li><i class="fas fa-check text-blue-500 mr-2"></i>Imunisasi Lengkap</li>
                    <li><i class="fas fa-check text-blue-500 mr-2"></i>Tumbuh Kembang Anak</li>
                    <li><i class="fas fa-check text-blue-500 mr-2"></i>Pediatric Emergency</li>
                </ul>
            </div>

            <!-- Orthopedics -->
            <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-all duration-300 animate-fade-in-up"
                style="animation-delay: 0.2s">
                <div class="flex items-center mb-6">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center mr-4">
                        <i class="fas fa-bone text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Ortopedi</h3>
                        <p class="text-sm text-gray-600">Tulang & Sendi</p>
                    </div>
                </div>
                <p class="text-gray-600 mb-4">Penanganan komprehensif masalah tulang, sendi, dan sistem muskuloskeletal.
                </p>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li><i class="fas fa-check text-green-500 mr-2"></i>Operasi Tulang & Sendi</li>
                    <li><i class="fas fa-check text-green-500 mr-2"></i>Arthroscopy</li>
                    <li><i class="fas fa-check text-green-500 mr-2"></i>Fisioterapi</li>
                </ul>
            </div>

            <!-- Obstetrics -->
            <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-all duration-300 animate-fade-in-up"
                style="animation-delay: 0.3s">
                <div class="flex items-center mb-6">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-pink-500 to-rose-500 rounded-2xl flex items-center justify-center mr-4">
                        <i class="fas fa-female text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Obsgyn</h3>
                        <p class="text-sm text-gray-600">Kandungan & Kebidanan</p>
                    </div>
                </div>
                <p class="text-gray-600 mb-4">Pelayanan kesehatan reproduksi wanita, kehamilan, dan persalinan dengan
                    fasilitas modern.</p>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li><i class="fas fa-check text-pink-500 mr-2"></i>USG 4D</li>
                    <li><i class="fas fa-check text-pink-500 mr-2"></i>Persalinan Normal & Caesar</li>
                    <li><i class="fas fa-check text-pink-500 mr-2"></i>KB & Konseling</li>
                </ul>
            </div>

            <!-- Internal Medicine -->
            <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-all duration-300 animate-fade-in-up"
                style="animation-delay: 0.4s">
                <div class="flex items-center mb-6">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-ums-blue to-indigo-500 rounded-2xl flex items-center justify-center mr-4">
                        <i class="fas fa-stethoscope text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Penyakit Dalam</h3>
                        <p class="text-sm text-gray-600">Internal Medicine</p>
                    </div>
                </div>
                <p class="text-gray-600 mb-4">Diagnosis dan pengobatan penyakit internal dewasa seperti diabetes,
                    hipertensi, dan gangguan metabolik.</p>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li><i class="fas fa-check text-ums-blue mr-2"></i>Diabetes Management</li>
                    <li><i class="fas fa-check text-ums-blue mr-2"></i>Hypertension Care</li>
                    <li><i class="fas fa-check text-ums-blue mr-2"></i>Endokrinologi</li>
                </ul>
            </div>

            <!-- Surgery -->
            <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-all duration-300 animate-fade-in-up"
                style="animation-delay: 0.5s">
                <div class="flex items-center mb-6">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-ums-orange to-amber-500 rounded-2xl flex items-center justify-center mr-4">
                        <i class="fas fa-cut text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Bedah Umum</h3>
                        <p class="text-sm text-gray-600">General Surgery</p>
                    </div>
                </div>
                <p class="text-gray-600 mb-4">Pelayanan bedah komprehensif dengan teknologi minimal invasif dan
                    laparoskopi.</p>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li><i class="fas fa-check text-ums-orange mr-2"></i>Bedah Laparoskopi</li>
                    <li><i class="fas fa-check text-ums-orange mr-2"></i>Bedah Digestif</li>
                    <li><i class="fas fa-check text-ums-orange mr-2"></i>One Day Surgery</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Medical Check-up Packages Section -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">
                Paket
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-ums-blue to-ums-orange">
                    Medical Check-up
                </span>
            </h2>
            <p class="text-xl text-gray-600">Investasi terbaik untuk kesehatan Anda dan keluarga</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Basic Package -->
            <div
                class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-all duration-300 animate-fade-in-up relative overflow-hidden">
                <div
                    class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-blue-100 to-blue-200 rounded-bl-3xl">
                </div>
                <div class="relative z-10">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-clipboard-check text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Paket Basic</h3>
                    <div class="text-3xl font-bold text-ums-blue mb-6">Rp 500K</div>
                    <ul class="space-y-3 text-gray-600 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-blue-500 mr-3"></i>
                            <span>Pemeriksaan Fisik</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-blue-500 mr-3"></i>
                            <span>Lab Darah Rutin</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-blue-500 mr-3"></i>
                            <span>Urine Lengkap</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-blue-500 mr-3"></i>
                            <span>EKG</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-blue-500 mr-3"></i>
                            <span>Rontgen Thorax</span>
                        </li>
                    </ul>
                    <button
                        class="w-full bg-gradient-to-r from-blue-500 to-indigo-500 text-white py-3 rounded-xl hover:shadow-lg transition-all transform hover:-translate-y-1">
                        Pilih Paket
                    </button>
                </div>
            </div>

            <!-- Premium Package -->
            <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-all duration-300 animate-fade-in-up relative overflow-hidden border-2 border-ums-orange"
                style="animation-delay: 0.1s">
                <div
                    class="absolute -top-2 left-1/2 transform -translate-x-1/2 bg-ums-orange text-white px-6 py-2 rounded-full text-sm font-bold">
                    POPULER
                </div>
                <div
                    class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-orange-100 to-orange-200 rounded-bl-3xl">
                </div>
                <div class="relative z-10 mt-4">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-ums-orange to-amber-500 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-star text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Paket Premium</h3>
                    <div class="text-3xl font-bold text-ums-orange mb-6">Rp 1.2M</div>
                    <ul class="space-y-3 text-gray-600 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-ums-orange mr-3"></i>
                            <span>Semua Paket Basic</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-ums-orange mr-3"></i>
                            <span>USG Abdomen</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-ums-orange mr-3"></i>
                            <span>Treadmill Test</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-ums-orange mr-3"></i>
                            <span>Lab Kimia Klinik</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-ums-orange mr-3"></i>
                            <span>Konsultasi Spesialis</span>
                        </li>
                    </ul>
                    <button
                        class="w-full bg-gradient-to-r from-ums-orange to-amber-500 text-white py-3 rounded-xl hover:shadow-lg transition-all transform hover:-translate-y-1">
                        Pilih Paket
                    </button>
                </div>
            </div>

            <!-- Executive Package -->
            <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-all duration-300 animate-fade-in-up relative overflow-hidden"
                style="animation-delay: 0.2s">
                <div
                    class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-purple-100 to-purple-200 rounded-bl-3xl">
                </div>
                <div class="relative z-10">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-purple-500 to-violet-500 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-crown text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Paket Executive</h3>
                    <div class="text-3xl font-bold text-purple-600 mb-6">Rp 2.5M</div>
                    <ul class="space-y-3 text-gray-600 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-purple-500 mr-3"></i>
                            <span>Semua Paket Premium</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-purple-500 mr-3"></i>
                            <span>CT Scan Thorax</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-purple-500 mr-3"></i>
                            <span>Echocardiography</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-purple-500 mr-3"></i>
                            <span>Tumor Marker</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-purple-500 mr-3"></i>
                            <span>VIP Room</span>
                        </li>
                    </ul>
                    <button
                        class="w-full bg-gradient-to-r from-purple-500 to-violet-500 text-white py-3 rounded-xl hover:shadow-lg transition-all transform hover:-translate-y-1">
                        Pilih Paket
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Appointment Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <!-- Left Content -->
            <div class="animate-fade-in-up">
                <h2 class="text-4xl font-bold text-gray-900 mb-6">
                    Buat Janji
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-ums-blue to-ums-orange">
                        Temu Online
                    </span>
                </h2>
                <p class="text-lg text-gray-600 leading-relaxed mb-8">
                    Hemat waktu Anda dengan sistem appointment online. Pilih dokter, jadwal, dan layanan yang diinginkan
                    dengan mudah dan praktis.
                </p>

                <div class="space-y-6">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-calendar-alt text-ums-blue"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Pilih Jadwal Fleksibel</h4>
                            <p class="text-sm text-gray-600">Tersedia jadwal pagi, siang, dan malam</p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-user-md text-green-600"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Pilih Dokter Spesialis</h4>
                            <p class="text-sm text-gray-600">Tim dokter berpengalaman dan profesional</p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-bell text-ums-orange"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Notifikasi Otomatis</h4>
                            <p class="text-sm text-gray-600">Pengingat via SMS dan WhatsApp</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <button
                        class="bg-gradient-to-r from-ums-blue to-blue-600 text-white px-8 py-4 rounded-xl hover:shadow-lg transition-all transform hover:-translate-y-1 mr-4">
                        <i class="fas fa-calendar-plus mr-2"></i>Buat Appointment
                    </button>
                    <button
                        class="border-2 border-ums-blue text-ums-blue px-8 py-4 rounded-xl hover:bg-ums-blue hover:text-white transition-all">
                        <i class="fas fa-phone mr-2"></i>Hubungi Kami
                    </button>
                </div>
            </div>

            <!-- Right Content - Contact Form -->
            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-8 rounded-2xl shadow-lg animate-slide-in-right">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Quick Appointment</h3>
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-ums-blue focus:border-transparent"
                            placeholder="Masukkan nama lengkap">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                        <input type="tel"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-ums-blue focus:border-transparent"
                            placeholder="08xxx-xxxx-xxxx">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Layanan</label>
                        <select
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-ums-blue focus:border-transparent">
                            <option>Pilih Layanan</option>
                            <option>Konsultasi Umum</option>
                            <option>Spesialis Jantung</option>
                            <option>Spesialis Anak</option>
                            <option>Medical Check-up</option>
                            <option>Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal & Waktu</label>
                        <input type="datetime-local"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-ums-blue focus:border-transparent">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Catatan</label>
                        <textarea rows="3"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-ums-blue focus:border-transparent"
                            placeholder="Keluhan atau catatan tambahan..."></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-gradient-to-r from-ums-blue to-blue-600 text-white py-3 rounded-lg hover:shadow-lg transition-all transform hover:-translate-y-1">
                        <i class="fas fa-paper-plane mr-2"></i>Kirim Permintaan
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Emergency Contact Section -->
<section class="py-20 bg-gradient-to-r from-red-600 to-pink-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="animate-fade-in-up">
            <div
                class="inline-flex items-center px-6 py-3 bg-white/20 rounded-full text-white text-sm font-medium mb-6">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                Layanan Darurat 24 Jam
            </div>
            <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                Kondisi Darurat?
            </h2>
            <p class="text-xl text-red-100 mb-8 max-w-3xl mx-auto">
                Tim medis darurat RS UMS siap melayani Anda 24/7. Jangan tunda, hubungi segera untuk penanganan cepat
                dan profesional.
            </p>

            <div class="grid md:grid-cols-3 gap-8 mt-12">
                <!-- Emergency Call -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-phone-alt text-red-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Telepon Darurat</h3>
                    <p class="text-3xl font-bold text-white">(0271) 911</p>
                </div>

                <!-- Ambulance -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-ambulance text-red-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Ambulance</h3>
                    <p class="text-3xl font-bold text-white">0812-911-UMS</p>
                </div>

                <!-- WhatsApp -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fab fa-whatsapp text-red-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">WhatsApp</h3>
                    <p class="text-3xl font-bold text-white">0812-3456-7890</p>
                </div>
            </div>

            <div class="mt-12">
                <button
                    class="bg-white text-red-600 px-8 py-4 rounded-xl font-bold hover:shadow-lg transition-all transform hover:-translate-y-1 mr-4">
                    <i class="fas fa-phone mr-2"></i>Hubungi Sekarang
                </button>
                <button
                    class="border-2 border-white text-white px-8 py-4 rounded-xl font-bold hover:bg-white hover:text-red-600 transition-all">
                    <i class="fas fa-map-marker-alt mr-2"></i>Lokasi RS
                </button>
            </div>
        </div>
    </div>
</section>

{{-- Footer --}}
@include('livewire.viewpublik.components.footer')
