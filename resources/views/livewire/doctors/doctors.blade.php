<div class="space-y-8 p-6">
    {{-- Notifikasi Sukses --}}
    @if (session('errors'))
        <livewire:components.notification :variant="'errors'" :message="session('errors')" />
    @elseif (session('success'))
        <livewire:components.notification :variant="'success'" :message="session('success')" />
    @endif

    {{-- Header --}}
    <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <flux:heading size="xl">Daftar Dokter</flux:heading>
            <flux:subheading class="mt-1 text-gray-500 dark:text-gray-400">
                Kelola data dokter dan spesialis.
            </flux:subheading>
        </div>

        {{-- Tombol Tambah Dokter --}}
        <flux:modal.trigger name="add-doctor">
            <flux:button variant="primary">
                + Tambah Dokter
            </flux:button>
        </flux:modal.trigger>
    </div>

    <flux:separator variant="subtle" />

    {{-- Daftar Dokter dalam Card --}}
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($doctors as $doctor)
            <div
                class="group relative rounded-2xl border border-gray-200 dark:border-gray-700 
                   bg-white dark:bg-gray-800 p-5 shadow-sm hover:shadow-lg hover:-translate-y-1 flex flex-col justify-between">

                {{-- Header (Avatar + Info) --}}
                <div class="flex items-center gap-4">
                    {{-- Avatar dengan inisial dokter --}}
                    <div
                        class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full 
                           bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 
                           font-semibold text-lg shadow-inner">
                        {{ strtoupper(substr($doctor->name, 0, 1)) }}
                    </div>

                    <div>
                        <h2
                            class="text-lg font-semibold text-gray-800 dark:text-gray-100 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition">
                            {{ $doctor->name }}
                        </h2>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            {{ $doctor->specialty?->name ?? '—' }}
                        </p>
                    </div>
                </div>

                {{-- Detail Kontak --}}
                <div class="mt-4 space-y-1 text-sm">
                    <p class="flex items-center gap-2 text-gray-500 dark:text-gray-400">
                        <i class="mdi mdi-email text-lg"></i> {{ $doctor->email }}
                    </p>
                    @if ($doctor->phone)
                        <p class="flex items-center gap-2 text-gray-500 dark:text-gray-400">
                            <i class="mdi mdi-phone text-lg"></i> {{ $doctor->phone }}
                        </p>
                    @endif
                </div>

                {{-- Actions --}}
                <div class="flex justify-end gap-2 mt-5 pt-3 border-t border-gray-100 dark:border-gray-700">
                    <flux:button size="sm" variant="outline"
                        wire:click="$dispatch('editDoctor', { id: {{ $doctor->id }} })">
                        Edit
                    </flux:button>


                    <flux:button size="sm" variant="danger" wire:click="confirmDelete({{ $doctor->id }})">
                        <i class="mdi mdi-delete mr-1"></i> Hapus
                    </flux:button>
                </div>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500 dark:text-gray-400 py-8">
                Belum ada data dokter.
            </p>
        @endforelse
    </div>
    <div class="mt-6">
        {{ $doctors->links() }}
    </div>


    {{-- Modal Konfirmasi Hapus --}}
    <flux:modal name="deleteDoctor" class="md:w-[30rem]">
        <div class="space-y-4">
            <flux:heading size="lg">Hapus Dokter</flux:heading>
            <p class="text-gray-600 dark:text-gray-300">
                Apakah Anda yakin ingin menghapus data dokter ini?
            </p>
            <div class="flex justify-end gap-2">
                <flux:button variant="outline" @click="Flux.modal('deleteDoctor').close()">Batal</flux:button>
                <flux:button variant="danger" wire:click="deleteDoctor">Hapus</flux:button>
            </div>
        </div>
    </flux:modal>

    {{-- Modal Tambah Dokter --}}
    <livewire:doctors.create-doctor />
    <livewire:doctors.update-doctor />
</div>
