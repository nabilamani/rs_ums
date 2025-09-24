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
    <flux:modal name="add-service" class="md:w-[40rem]">
        <form wire:submit.prevent="save" class="space-y-4">
            <flux:heading size="lg">Tambah Layanan</flux:heading>

            {{-- sesuai kolom name --}}
            <flux:input label="Nama Layanan" placeholder="Contoh: Poli Anak"
                        wire:model.defer="name" />

            {{-- sesuai kolom description --}}
            <flux:textarea label="Deskripsi (opsional)" placeholder="Keterangan singkat"
                           wire:model.defer="description" />

            {{-- sesuai kolom details --}}
            <flux:textarea label="Detail (opsional)" placeholder="Detail layanan (Markdown/JSON)"
                           wire:model.defer="details" />

            {{-- sesuai kolom room --}}
            <flux:input label="Ruangan (opsional)" placeholder="Contoh: Lantai 2"
                        wire:model.defer="room" />

            {{-- sesuai kolom base_price --}}
            <flux:input label="Harga Dasar" type="number" step="0.01"
                        wire:model.defer="base_price" />

            {{-- sesuai kolom is_active --}}
            <flux:switch label="Aktif?" wire:model.defer="is_active" />

            <div class="flex justify-end">
                <flux:button type="submit" variant="primary">Simpan</flux:button>
            </div>
        </form>
    </flux:modal>
</div>
