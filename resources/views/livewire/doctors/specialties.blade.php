<div class="space-y-8 p-6">

    @if (session('errors'))
        <livewire:components.notification :variant="'errors'" :message="session('errors')" />
    @elseif (session('success'))
        <livewire:components.notification :variant="'success'" :message="session('success')" />
    @endif
    {{-- Header --}}
    <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <flux:heading size="xl">Manajemen Spesialis & Dokter</flux:heading>
            <flux:subheading class="mt-1 text-gray-500 dark:text-gray-400">
                Kelola data spesialis, dokter, dan jadwal praktik di sini.
            </flux:subheading>
        </div>

        {{-- Tombol Tambah Spesialis --}}
        <flux:modal.trigger name="add-specialty">
            <flux:button variant="primary">
                + Tambah Spesialis
            </flux:button>
        </flux:modal.trigger>
    </div>
    <flux:separator variant="subtle" />
    {{-- Tabel Data Spesialis --}}
    <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider
                               text-gray-600 dark:text-gray-300">
                        Nama Spesialis
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider
                               text-gray-600 dark:text-gray-300">
                        Deskripsi
                    </th>
                    <th
                        class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider
                               text-gray-600 dark:text-gray-300">
                        Aksi
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-900">
                @forelse ($specialties as $specialty)
                    <tr>
                        <td class="px-6 py-4 text-sm font-semibold text-gray-900 dark:text-gray-100">
                            {{ $specialty->name }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-300">
                            {{ $specialty->description ?: '-' }}
                        </td>
                        <td class="px-6 py-4 text-right text-sm">
                            <div class="flex justify-end gap-2">
                                <flux:button size="sm" variant="outline"
                                    wire:click="$dispatch('editSpecialty', { id: {{ $specialty->id }} })">
                                    Edit
                                </flux:button>
                                <flux:button size="sm" variant="danger"
                                    wire:click="confirmDelete({{ $specialty->id }})">
                                    Hapus
                                </flux:button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                            Belum ada data spesialis.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Modal Tambah Spesialis --}}
    <livewire:doctors.create-specialty />
    <livewire:doctors.update-specialty />



    {{-- Modal konfirmasi hapus --}}
    <flux:modal name="deleteSpecialty" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Hapus Spesialis?</flux:heading>
                <flux:text class="mt-2">
                    <p>Anda yakin ingin menghapus spesialis ini?</p>
                    <p class="text-red-500">Tindakan ini tidak bisa dibatalkan.</p>
                </flux:text>
            </div>

            <div class="flex gap-2">
                <flux:spacer />

                <flux:modal.close>
                    <flux:button variant="ghost">Batal</flux:button>
                </flux:modal.close>

                <flux:button wire:click="deleteSpecialty" variant="danger">
                    Hapus
                </flux:button>
            </div>
        </div>
    </flux:modal>

</div>
