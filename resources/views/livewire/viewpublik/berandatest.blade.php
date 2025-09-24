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


