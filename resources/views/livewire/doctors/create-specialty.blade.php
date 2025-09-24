<div>
    @if (session('errors'))
        <livewire:components.notification :variant="'errors'" :message="session('errors')" />
    @elseif (session('success'))
        <livewire:components.notification :variant="'success'" :message="session('success')" />
    @endif

    {{-- Modal Tambah Spesialis --}}
    <flux:modal name="add-specialty" class="md:w-[40rem]">
        <form wire:submit.prevent="save" class="space-y-4">
            <flux:heading size="lg">Tambah Spesialis</flux:heading>

            <flux:input label="Nama Spesialis" placeholder="Contoh: Dokter Gigi" wire:model="name" />

            <flux:textarea label="Deskripsi (opsional)" placeholder="Keterangan singkat" wire:model="description" />

            <div class="flex justify-end">
                <flux:button type="submit" variant="primary">Simpan</flux:button>
            </div>
        </form>
    </flux:modal>
</div>
