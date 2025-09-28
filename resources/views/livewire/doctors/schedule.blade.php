<div class="space-y-8 p-6">
    <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <flux:heading size="xl">Manajemen Jadwal Dokter</flux:heading>
            <flux:subheading class="mt-1 text-gray-500 dark:text-gray-400">
                Kelola jadwal praktik dokter di sini.
            </flux:subheading>
        </div>
    </div>
    <flux:separator variant="subtle" />
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($doctors as $doctor)
            @php
                $hasSchedule = $doctor->schedules->isNotEmpty();
            @endphp

            <div
                class="rounded-xl border border-gray-200 dark:border-gray-700
                   bg-white dark:bg-gray-800 p-5 shadow-sm flex flex-col justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                        {{ $doctor->name }}
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        {{ $doctor->specialty->name ?? '-' }}
                    </p>
                    <p class="mt-1 text-sm text-gray-500">
                        {{ $doctor->email ?? 'Tidak ada email' }}
                    </p>
                </div>

                {{-- Tombol Jadwal --}}
                <div class="mt-4 flex justify-end">
                    @if ($hasSchedule)
                        {{-- Jika sudah ada jadwal --}}
                        <flux:button size="sm" variant="primary" wire:navigate
                            href="{{ route('schedules.show', $doctor->id) }}">
                            Atur Jadwal
                        </flux:button>
                    @else
                        {{-- Jika belum ada jadwal, arahkan ke form create --}}
                        <flux:button size="sm" variant="danger" wire:navigate
                            href="{{ route('schedules.show', $doctor->id) }}">
                            Belum ada Jadwal
                        </flux:button>
                    @endif

                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-6">
        {{ $doctors->links() }}
    </div>

</div>
