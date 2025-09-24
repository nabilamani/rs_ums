<div>
    {{-- Modal Edit Spesialis --}}
    <flux:modal name="editSpecialty" class="md:w-[60rem]">
        <form wire:submit.prevent="update" class="space-y-4">
            <flux:heading size="lg">Edit Data Spesialis</flux:heading>

            <flux:input label="Nama Spesialis" placeholder="Contoh: Dokter Anak" wire:model="name" />

            <flux:textarea label="Deskripsi (opsional)" placeholder="Keterangan singkat" wire:model="description" />

            <div class="flex justify-end">
                <flux:button type="submit" variant="primary">Perbarui</flux:button>
            </div>
        </form>
    </flux:modal>


    @if (session('errors'))
        <livewire:components.notification :variant="'errors'" :message="session('errors')" />
    @elseif (session('success'))
        <livewire:components.notification :variant="'success'" :message="session('success')" />
    @endif

</div>
