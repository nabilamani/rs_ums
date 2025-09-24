<div>
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


    {{-- Modal Tambah Layanan --}}
    <flux:modal name="add-category" class="md:w-[90rem]">
        <form wire:submit.prevent="save" class="space-y-4">
            <flux:heading size="lg">Tambah Kategori Layanan</flux:heading>

            <flux:input label="Nama Kategori" placeholder="Contoh: Rawat Jalan" wire:model="title" />

            <flux:textarea label="Deskripsi (opsional)" placeholder="Keterangan singkat" wire:model="description" />

            {{-- Input Icon --}}
            <flux:input label="Icon (class)" placeholder="Contoh: fas fa-award text-ums-blue" wire:model="icon" />
            <p class="text-xs text-gray-500 dark:text-accent mt-1">
                Cari icon di
                <a href="https://fontawesome.com/search" target="_blank" class="text-ums-blue underline">
                    Font Awesome Search
                </a>
            </p>

            <div class="flex justify-end">
                <flux:button type="submit" variant="primary">Simpan</flux:button>
            </div>
        </form>
    </flux:modal>
</div>
