<style>
    html {
        overflow-y: scroll;
        /* Paksa scrollbar vertikal selalu tampil */
    }
</style>
{{-- Navbar --}}
@include('livewire.viewpublik.components.navbar')

<!-- Main Content -->
<div class="pt-16" x-data="doctorSchedule()">
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-ums-blue to-blue-700 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">
                    Jadwal Dokter
                    <span class="text-yellow-300">RS UMS</span>
                </h1>
                <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                    Temukan jadwal praktek dokter spesialis kami untuk konsultasi dan pemeriksaan kesehatan
                </p>
                <div class="mt-6 flex items-center justify-center text-blue-200">
                    <i class="fas fa-clock mr-2"></i>
                    <span>
        Terakhir diperbarui:
        {{ $lastUpdated ? $lastUpdated->format('d-m-Y H:i:s') : '-' }}
    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="py-8 bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap gap-4 items-center justify-between">
                <div class="flex flex-wrap gap-4">
                    <!-- Filter by Specialty -->
                    <div class="relative">
                        <select x-model="selectedSpecialty" @change="filterDoctors()"
                            class="appearance-none bg-white border border-gray-300 rounded-lg px-4 py-2 pr-8 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            <option value="">Semua Spesialisasi</option>
                            @foreach ($specialties as $specialty)
                                <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                            @endforeach
                        </select>
                        <i
                            class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                    </div>

                    <!-- Filter by Day -->
                    <div class="relative">
                        <select x-model="selectedDay" @change="filterDoctors()"
                            class="appearance-none bg-white border border-gray-300 rounded-lg px-4 py-2 pr-8 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                            <option value="">Semua Hari</option>
                            <option value="monday">Senin</option>
                            <option value="tuesday">Selasa</option>
                            <option value="wednesday">Rabu</option>
                            <option value="thursday">Kamis</option>
                            <option value="friday">Jumat</option>
                            <option value="saturday">Sabtu</option>
                            <option value="sunday">Minggu</option>
                        </select>
                        <i
                            class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                    </div>

                    <!-- Search -->
                    <div class="relative">
                        <input type="text" x-model="searchQuery" @input="debounceFilter()"
                            placeholder="Cari nama dokter..."
                            class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- View Toggle -->
                <div class="flex bg-gray-100 rounded-lg p-1">
                    <button @click="viewMode = 'grid'" :class="viewMode === 'grid' ? 'bg-white shadow' : ''"
                        class="px-3 py-1 rounded-md text-sm font-medium">
                        <i class="fas fa-th-large mr-1"></i>
                        Grid
                    </button>
                    <button @click="viewMode = 'list'" :class="viewMode === 'list' ? 'bg-white shadow' : ''"
                        class="px-3 py-1 rounded-md text-sm font-medium">
                        <i class="fas fa-list mr-1"></i>
                        List
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-white rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-user-md text-blue-600 text-xl"></i>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-1">{{ $doctors->count() }}</div>
                    <div class="text-sm text-gray-600">Total Dokter</div>
                </div>
                <div class="bg-white rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-calendar-check text-green-600 text-xl"></i>
                    </div>
                    <div class="text-3xl font-bold text-green-600 mb-1">
                        {{ $todayActiveCount }}
                    </div>
                    <div class="text-sm text-gray-600">Jadwal Aktif Hari Ini</div>
                </div>

                <div class="bg-white rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-stethoscope text-purple-600 text-xl"></i>
                    </div>
                    <div class="text-3xl font-bold text-purple-600 mb-1">{{ $specialties->count() }}</div>
                    <div class="text-sm text-gray-600">Spesialisasi</div>
                </div>
                <div class="bg-white rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-clock text-orange-600 text-xl"></i>
                    </div>
                    <div class="text-3xl font-bold text-orange-600 mb-1">24/7</div>
                    <div class="text-sm text-gray-600">Layanan</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Doctors Schedule Section -->
    <section class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Loading State -->
            <div x-show="loading" class="text-center py-12">
                <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
                <p class="mt-2 text-gray-600">Memuat jadwal dokter...</p>
            </div>

            <!-- Results Count -->
            <div x-show="!loading" class="mb-6">
                <p class="text-gray-600">
                    Menampilkan <span x-text="filteredDoctors.length"></span> dari <span
                        x-text="allDoctors.length"></span> dokter
                </p>
            </div>

            <!-- No Results -->
            <div x-show="!loading && filteredDoctors.length === 0" class="text-center py-12">
                <i class="fas fa-calendar-times text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Tidak ada jadwal ditemukan</h3>
                <p class="text-gray-600">Coba ubah filter atau kata kunci pencarian Anda</p>
                <button @click="clearFilters()"
                    class="mt-4 bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                    Reset Filter
                </button>
            </div>

            <!-- Grid View -->
            <div x-show="!loading && viewMode === 'grid'" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <template x-for="doctor in filteredDoctors" :key="doctor.id">
                    <div
                        class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <!-- Doctor Header -->
                        <div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white p-6">
                            <div class="flex items-center">
                                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-user-md text-2xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold" x-text="doctor.name"></h3>
                                    <p class="text-blue-200" x-text="doctor.specialty.name"></p>
                                </div>
                            </div>
                        </div>

                        <!-- Schedule Content -->
                        <div class="p-6">
                            <div class="mb-4">
                                <div class="flex items-center text-sm text-gray-500 mb-2">
                                    <i :class="doctor.specialty.icon || 'fas fa-stethoscope'"
                                        class="mr-2 text-blue-600"></i>
                                    <span x-text="doctor.specialty.name"></span>
                                </div>
                            </div>

                            <!-- Weekly Schedule -->
                            <div class="space-y-2">
                                <template x-for="schedule in doctor.schedules" :key="schedule.id">
                                    <div class="flex items-center justify-between py-2 border-b border-gray-100">
                                        <div class="flex items-center">
                                            <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                                            <span class="font-medium text-gray-900"
                                                x-text="getDayName(schedule.day_of_week)"></span>
                                        </div>
                                        <div class="text-sm text-gray-600">
                                            <span x-text="formatTime(schedule.start_time)"></span> -
                                            <span x-text="formatTime(schedule.end_time)"></span>
                                        </div>
                                    </div>
                                </template>
                                <!-- Pesan jika tidak ada jadwal -->
                                <div x-show="doctor.schedules.length === 0"
                                    class="text-sm text-gray-500 italic text-center py-3">
                                    Tidak ada jadwal untuk dokter ini.
                                </div>

                            </div>

                            <!-- Contact Info -->
                            <div class="mt-6 pt-4 border-t border-gray-200">
                                <div class="flex items-center text-sm text-gray-600 mb-1" x-show="doctor.email">
                                    <i class="fas fa-envelope mr-2"></i>
                                    <span x-text="doctor.email"></span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600" x-show="doctor.phone">
                                    <i class="fas fa-phone mr-2"></i>
                                    <span x-text="doctor.phone"></span>
                                </div>
                            </div>

                            <!-- Action Button -->
                            <div class="mt-6">
                                <button @click="makeAppointment(doctor.id)"
                                    class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-3 rounded-xl font-semibold hover:shadow-lg transition-all transform hover:-translate-y-0.5">
                                    <i class="fas fa-calendar-plus mr-2"></i>
                                    Buat Janji
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- List View -->
            <div x-show="!loading && viewMode === 'list'" class="space-y-4">
                <template x-for="doctor in filteredDoctors" :key="doctor.id">
                    <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all">
                        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                            <!-- Doctor Info -->
                            <div class="flex items-center mb-4 lg:mb-0">
                                <div
                                    class="w-16 h-16 bg-gradient-to-r from-blue-600 to-blue-700 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-user-md text-white text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-900" x-text="doctor.name"></h3>
                                    <div class="flex items-center text-gray-600">
                                        <i :class="doctor.specialty.icon || 'fas fa-stethoscope'"
                                            class="mr-2 text-blue-600"></i>
                                        <span x-text="doctor.specialty.name"></span>
                                    </div>
                                    <div class="flex flex-wrap items-center text-sm text-gray-500 mt-1">
                                        <span x-show="doctor.email" class="flex items-center mr-4">
                                            <i class="fas fa-envelope mr-1"></i>
                                            <span x-text="doctor.email"></span>
                                        </span>
                                        <span x-show="doctor.phone" class="flex items-center">
                                            <i class="fas fa-phone mr-1"></i>
                                            <span x-text="doctor.phone"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Schedule Grid -->
                            <div class="flex-1 lg:max-w-2xl">
                                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                                    <template x-for="schedule in doctor.schedules" :key="schedule.id">
                                        <div
                                            class="bg-gradient-to-r from-green-50 to-green-100 border border-green-200 rounded-lg p-3 text-center">
                                            <div class="text-sm font-semibold text-green-800"
                                                x-text="getDayName(schedule.day_of_week)"></div>
                                            <div class="text-xs text-green-600 mt-1">
                                                <span x-text="formatTime(schedule.start_time)"></span><br>
                                                <span x-text="formatTime(schedule.end_time)"></span>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>

                            <!-- Action Button -->
                            <div class="mt-4 lg:mt-0 lg:ml-6">
                                <button @click="makeAppointment(doctor.id)"
                                    class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg transition-all transform hover:-translate-y-0.5">
                                    <i class="fas fa-calendar-plus mr-2"></i>
                                    Buat Janji
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

    </section>

    <!-- Quick Info Section -->
    <section class="py-12 bg-gradient-to-r from-blue-600 to-blue-700 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold mb-4">Informasi Penting</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-calendar-check text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Reservasi Online</h3>
                    <p class="text-blue-100">Booking jadwal dokter dapat dilakukan 24/7 melalui website atau telepon
                    </p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-clock text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Tepat Waktu</h3>
                    <p class="text-blue-100">Harap datang 15 menit sebelum jadwal untuk proses administrasi</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-id-card text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Bawa Dokumen</h3>
                    <p class="text-blue-100">Jangan lupa membawa KTP, kartu BPJS, atau asuransi kesehatan lainnya</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Include Footer --}}
    @include('livewire.viewpublik.components.footer')

    @push('scripts')
        <script>
            function doctorSchedule() {
                return {
                    loading: true,
                    viewMode: 'grid',
                    selectedSpecialty: '',
                    selectedDay: '',
                    searchQuery: '',
                    lastUpdated: '',
                    allDoctors: @json($doctors),
                    specialties: @json($specialties),
                    filteredDoctors: [],
                    debounceTimeout: null,

                    init() {
                        this.filteredDoctors = [...this.allDoctors];
                        this.lastUpdated = new Date().toLocaleString('id-ID');
                        this.loading = false;
                    },
                    today: '',
                    init() {
                        this.filteredDoctors = [...this.allDoctors];
                        this.lastUpdated = new Date().toLocaleString('id-ID');

                        // simpan nama hari (lowercase) sesuai data di DB (monday, tuesday, dst.)
                        this.today = new Date().toLocaleDateString('en-US', {
                            weekday: 'long'
                        }).toLowerCase();

                        this.loading = false;
                    },


                    debounceFilter() {
                        clearTimeout(this.debounceTimeout);
                        this.debounceTimeout = setTimeout(() => {
                            this.filterDoctors();
                        }, 300);
                    },

                    filterDoctors() {
                        this.loading = true;

                        // Simulate loading delay for better UX
                        setTimeout(() => {
                            let filtered = [...this.allDoctors];

                            // Filter by specialty
                            if (this.selectedSpecialty) {
                                filtered = filtered.filter(doctor => doctor.specialty_id == this.selectedSpecialty);
                            }

                            // Filter by day
                            if (this.selectedDay) {
                                filtered = filtered.filter(doctor =>
                                    doctor.schedules.some(schedule =>
                                        schedule.day_of_week === this.selectedDay
                                    )
                                );
                            }

                            // Filter by search query
                            if (this.searchQuery) {
                                const query = this.searchQuery.toLowerCase();
                                filtered = filtered.filter(doctor =>
                                    doctor.name.toLowerCase().includes(query) ||
                                    doctor.specialty.name.toLowerCase().includes(query)
                                );
                            }

                            this.filteredDoctors = filtered;
                            this.loading = false;
                        }, 300);
                    },

                    clearFilters() {
                        this.selectedSpecialty = '';
                        this.selectedDay = '';
                        this.searchQuery = '';
                        this.filterDoctors();
                    },

                    getDayName(day) {
                        const days = {
                            'monday': 'Senin',
                            'tuesday': 'Selasa',
                            'wednesday': 'Rabu',
                            'thursday': 'Kamis',
                            'friday': 'Jumat',
                            'saturday': 'Sabtu',
                            'sunday': 'Minggu'
                        };
                        return days[day] || day;
                    },

                    formatTime(time) {
                        if (typeof time === 'string') {
                            return time.substring(0, 5);
                        }
                        return time;
                    },

                    makeAppointment(doctorId) {
                        // Redirect to appointment booking page or open modal
                        alert(`Membuat janji dengan dokter ID: ${doctorId}`);
                        // window.location.href = `/appointment/create?doctor_id=${doctorId}`;
                    }
                }
            }
        </script>
