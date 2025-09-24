<div class="space-y-6">
    {{-- Header --}}
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
            Layanan Kategori : {{ $category->title }}
        </h1>

        {{-- Tombol tambah layanan --}}
        <flux:modal.trigger name="add-service">
            <flux:button variant="primary">
                + Tambah Kategori Layanan
            </flux:button>
        </flux:modal.trigger>
    </div>

    {{-- Daftar Layanan --}}
    @forelse ($services as $service)
        <div
            class="rounded-xl border border-gray-200 dark:border-gray-700 
                   bg-white dark:bg-gray-800 p-4 shadow-sm hover:shadow-md 
                   transition">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="font-semibold text-gray-800 dark:text-gray-100">
                        {{ $service->name }}
                    </h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        {{ $service->description ?? 'Tidak ada deskripsi.' }}
                    </p>
                </div>

                {{-- Aksi opsional (misalnya edit & hapus) --}}
                <div class="flex items-center gap-2">
                    <flux:button size="xs" variant="primary" wire:click="editService({{ $service->id }})">
                        Edit
                    </flux:button>
                    <flux:button size="xs" variant="ghost" wire:click="confirmDelete({{ $service->id }})">
                        Hapus
                    </flux:button>
                </div>
            </div>
        </div>
    @empty
        <div class="text-center py-12 text-gray-500 dark:text-gray-400 border border-dashed rounded-xl">
            Belum ada layanan untuk kategori ini.
        </div>
    @endforelse

    {{-- Kirim instance kategori agar service_category_id otomatis terisi --}}
    <livewire:services.create-service :category="$category" />
</div>
