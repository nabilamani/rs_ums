<div class="space-y-8 p-6">


    {{-- Heading --}}
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="xl">Manajemen Layanan RS</flux:heading>
            <flux:subheading class="mt-1 text-gray-500 dark:text-gray-400">
                Kelola kategori dan layanan rumah sakit Anda di sini.
            </flux:subheading>
        </div>

        {{-- Tombol tambah layanan --}}
        <flux:modal.trigger name="add-category">
            <flux:button variant="primary">
                + Tambah Kategori Layanan
            </flux:button>
        </flux:modal.trigger>
    </div>
    <flux:separator variant="subtle" />
    {{-- Grid Card --}}
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($categories as $category)
            <div
                class="group relative rounded-2xl p-6 shadow-md 
                       bg-white dark:bg-gray-800 border border-gray-200 
                       dark:border-gray-700 hover:shadow-lg 
                       transition-transform transform hover:-translate-y-1">
                {{-- Icon lingkaran --}}
                <div
                    class="flex h-12 w-12 items-center justify-center rounded-full
           bg-indigo-100 dark:bg-indigo-400/40 text-indigo-600
           dark:text-indigo-300 mb-4">
                    {{-- Icon dinamis dari database --}}
                    <i class="{{ $category->icon }}"></i>
                </div>



                {{-- Nama kategori --}}
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                    {{ $category->title }}
                </h2>

                {{-- Deskripsi --}}
                <p class="mt-2 text-gray-600 dark:text-gray-400 line-clamp-3">
                    {{ $category->description ?: 'Tidak ada deskripsi.' }}
                </p>

                {{-- Footer info --}}
                <div class="mt-9 text-sm text-gray-500 dark:text-gray-400">
                    Dibuat: {{ $category->created_at->format('d M Y') }}
                </div>

                {{-- Aksi opsional --}}
                <div class="absolute top-4 right-4 flex items-center gap-2">
                    {{-- Tombol Edit --}}
                    <button
                        class="p-2 rounded-full cursor-pointer transition hover:bg-indigo-100 dark:hover:bg-indigo-800 text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-300"
                        title="Edit" wire:click="edit({{ $category->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687 1.687a1.5 1.5 0
                   010 2.121l-8.484 8.485a1.5 1.5 0
                   01-.53.35l-4 1.333a.75.75 0
                   01-.949-.949l1.333-4a1.5 1.5 0
                   01.35-.53l8.485-8.484a1.5 1.5 0
                   012.121 0z" />
                        </svg>
                    </button>

                    {{-- Tombol Hapus --}}
                    <button
                        class="p-2 rounded-full cursor-pointer transition hover:bg-red-100 dark:hover:bg-red-800 text-gray-400 hover:text-red-600 dark:hover:text-red-400"
                        title="Hapus" wire:click="confirmDelete({{ $category->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107
                   1.022.166m-1.022-.165L18.16 19.673A2.25 2.25 0
                   0115.916 22H8.084a2.25 2.25 0
                   01-2.244-2.327L5.772 5.79m12.456 0a48.108 48.108
                   0 00-12.456 0m12.456 0L15.75 4.5a3 3 0
                   00-7.5 0l-2.478.29" />
                        </svg>
                    </button>
                </div>

                {{-- Tombol Tambahkan Layanan --}}
                <div class="absolute bottom-4 right-4">
                    <flux:button size="sm" variant="primary" wire:navigate
                        href="{{ route('services.byCategory', $category->id) }}">
                        + Tambah Layanan
                    </flux:button>

                </div>


            </div>
        @empty
            <div class="col-span-full text-center text-gray-500 dark:text-gray-400">
                Belum ada kategori layanan.
            </div>
        @endforelse
    </div>

    <livewire:services.create-service-category />
    <livewire:services.edit-service-category />

    @session('success')
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
            class="fixed top-4 right-4 z-50 w-full max-w-sm rounded-lg bg-emerald-500 p-4 text-sm text-white shadow-lg"
            role="alert" x-transition>
            <div class="flex items-center justify-between">
                <span>{{ session('success') }}</span>
                <button @click="show = false" class="ml-3 text-white/80 hover:text-white">
                    ✕
                </button>
            </div>
        </div>
    @endsession


    {{-- Modal konfirmasi hapus --}}
    <flux:modal name="deleteServiceCategory" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Hapus Kategori?</flux:heading>
                <flux:text class="mt-2">
                    <p>Anda yakin ingin menghapus kategori layanan ini?</p>
                    <p class="text-red-500">Tindakan ini tidak bisa dibatalkan.</p>
                </flux:text>
            </div>

            <div class="flex gap-2">
                <flux:spacer />

                <flux:modal.close>
                    <flux:button variant="ghost">Batal</flux:button>
                </flux:modal.close>

                <flux:button wire:click="deleteCategory" variant="danger">
                    Hapus
                </flux:button>
            </div>
        </div>
    </flux:modal>
</div>
