<div class="max-w-8xl mx-auto p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
    {{-- Header --}}
    <div class="mb-6">
        {{-- Tombol Kembali (Flux) --}}
        <flux:button variant="outline" class="mb-4" icon="chevron-left" href="{{ route('schedules.index') }}"
            wire:navigate>
            Kembali
        </flux:button>

        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-2">
            Jadwal Praktik – {{ $doctor->name }} ({{ $doctor->specialty->name }})
        </h1>
        <p class="text-sm text-gray-600 dark:text-gray-400">
            Pilih hari dan jam praktik. Anda dapat menambahkan beberapa slot waktu
            dalam satu hari, misalnya 09.00–12.00 dan 16.00–20.00.
        </p>
    </div>

    {{-- Flash sukses --}}
    @if (session('errors'))
        <livewire:components.notification :variant="'errors'" :message="session('errors')" />
    @elseif (session('success'))
        <livewire:components.notification :variant="'success'" :message="session('success')" />
    @endif



    {{-- Layout 2 Kolom --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Kolom Kiri: Form Jadwal --}}
        <div class="space-y-4">
            <h2
                class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4 pb-2 border-b border-gray-200 dark:border-gray-600">
                Atur Jadwal Praktik
            </h2>

            <form wire:submit.prevent="save" class="space-y-4">
                @php
                    $dayLabels = [
                        'monday' => 'Senin',
                        'tuesday' => 'Selasa',
                        'wednesday' => 'Rabu',
                        'thursday' => 'Kamis',
                        'friday' => 'Jumat',
                        'saturday' => 'Sabtu',
                        'sunday' => 'Minggu',
                    ];
                @endphp

                @foreach ($dayLabels as $day => $label)
                    <div class="border border-gray-200 dark:border-gray-600 rounded-lg p-3 bg-gray-50 dark:bg-gray-700">
                        {{-- Hari dengan Toggle --}}
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" wire:model.live="days.{{ $day }}.is_active"
                                        class="sr-only peer">
                                    <div
                                        class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                    </div>
                                </label>
                                <span class="ml-3 text-sm font-medium text-gray-800 dark:text-gray-200">
                                    {{ $label }}
                                </span>
                            </div>
                        </div>

                        {{-- Slot Waktu --}}
                        @if ($days[$day]['is_active'])
                            <div class="space-y-2 mt-2">
                                @forelse ($days[$day]['slots'] as $index => $slot)
                                    <div
                                        class="flex items-center space-x-2 bg-white dark:bg-gray-800 p-2 rounded-md border border-gray-200 dark:border-gray-600">
                                        {{-- Dari --}}
                                        <div class="flex-1">
                                            <label
                                                class="block text-xs font-medium text-gray-600 dark:text-gray-400 mb-1">
                                                Dari:
                                            </label>
                                            <input type="time"
                                                wire:model="days.{{ $day }}.slots.{{ $index }}.start_time"
                                                class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                                                required>
                                        </div>
                                        {{-- Sampai --}}
                                        <div class="flex-1">
                                            <label
                                                class="block text-xs font-medium text-gray-600 dark:text-gray-400 mb-1">
                                                Sampai:
                                            </label>
                                            <input type="time"
                                                wire:model="days.{{ $day }}.slots.{{ $index }}.end_time"
                                                class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                                                required>
                                        </div>
                                        {{-- Hapus --}}
                                        @if (count($days[$day]['slots']) > 1)
                                            <div class="flex flex-col justify-end">
                                                <button type="button"
                                                    wire:click="removeSlot('{{ $day }}', {{ $index }})"
                                                    class="mt-5 px-2 py-1 text-xs text-red-600 hover:text-red-800 hover:bg-red-50 dark:text-red-400 dark:hover:text-red-300 dark:hover:bg-red-900/20 rounded transition-colors duration-200 cursor-pointer">
                                                    ✕
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                @empty
                                    <p class="text-gray-500 dark:text-gray-400 text-xs italic">Belum ada slot waktu</p>
                                @endforelse

                                {{-- Tambah Slot --}}
                                <div class="mt-2">
                                    <button type="button" wire:click="addSlot('{{ $day }}')"
                                        class="inline-flex cursor-pointer items-center px-2 py-1 text-xs font-medium text-blue-600 bg-blue-50 hover:bg-blue-100 dark:bg-blue-900/20 dark:text-blue-400 dark:hover:bg-blue-900/30 border border-blue-200 dark:border-blue-800 rounded transition-colors duration-200">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4"></path>
                                        </svg>
                                        Tambah Slot
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach

                {{-- Tombol Simpan --}}
                <div class="flex justify-end pt-2">
                    <flux:button type="submit" variant="primary" wire:target="save" wire:loading.attr="disabled">
                        <span wire:loading.remove wire:target="save">
                            Simpan Jadwal
                        </span>

                        {{-- Spinner bawaan sendiri, bukan flux::spinner --}}
                        <span wire:loading wire:target="save" class="flex items-center">
                            <svg class="animate-spin mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0
                                     c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Menyimpan...
                        </span>
                    </flux:button>
                </div>
            </form>
        </div>

        {{-- Kolom Kanan: Preview/Tabel Jadwal --}}
        <div class="space-y-4">
            <h2
                class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4 pb-2 border-b border-gray-200 dark:border-gray-600">
                Preview Jadwal Praktik
            </h2>

            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                {{-- Tabel Jadwal --}}
                <div class="overflow-hidden">
                    <table class="min-w-full">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-600">
                                <th
                                    class="px-3 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Hari
                                </th>
                                <th
                                    class="px-3 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Jam Praktik
                                </th>
                                <th
                                    class="px-3 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-600">
                            @foreach ($dayLabels as $day => $label)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td
                                        class="px-3 py-3 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $label }}
                                    </td>
                                    <td class="px-3 py-3 text-sm text-gray-600 dark:text-gray-400">
                                        @if ($days[$day]['is_active'] && !empty($days[$day]['slots']))
                                            <div class="space-y-1">
                                                @foreach ($days[$day]['slots'] as $slot)
                                                    @if ($slot['start_time'] && $slot['end_time'])
                                                        <div class="flex items-center">
                                                            <span
                                                                class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-300">
                                                                {{ $slot['start_time'] }} - {{ $slot['end_time'] }}
                                                            </span>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        @else
                                            <span class="text-gray-400 dark:text-gray-500 italic text-xs">
                                                Tidak ada jadwal
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-3 py-3 whitespace-nowrap">
                                        @if ($days[$day]['is_active'])
                                            <span
                                                class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-300">
                                                Aktif
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-400">
                                                Tidak Aktif
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Statistik Singkat --}}
                <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center">
                            <div class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                {{ collect($days)->where('is_active', true)->count() }}
                            </div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">Hari Aktif</div>
                        </div>
                        <div class="text-center">
                            <div class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                {{ collect($days)->sum(function ($day) {return $day['is_active'] ? count($day['slots']) : 0;}) }}
                            </div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">Total Slot</div>
                        </div>
                    </div>
                </div>

                {{-- Catatan --}}
                <div
                    class="mt-4 p-3 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg">
                    <div class="flex">
                        <svg class="w-5 h-5 text-blue-400 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div class="text-xs text-blue-700 dark:text-blue-300">
                            <p class="font-medium">Tips:</p>
                            <ul class="mt-1 list-disc list-inside space-y-1">
                                <li>Pastikan tidak ada overlap waktu dalam satu hari</li>
                                <li>Berikan jeda waktu yang cukup antar slot</li>
                                <li>Slot akan tersimpan otomatis saat Anda klik "Simpan Jadwal"</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
