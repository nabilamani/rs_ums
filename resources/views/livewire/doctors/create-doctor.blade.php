<div>
    {{-- Notifikasi Sukses --}}
    @if (session('errors'))
        <livewire:components.notification :variant="'errors'" :message="session('errors')" />
    @elseif (session('success'))
        <livewire:components.notification :variant="'success'" :message="session('success')" />
    @endif
    {{-- Modal Tambah Dokter --}}
    <flux:modal name="add-doctor" class="md:w-[40rem]">
        <form wire:submit.prevent="save" class="space-y-4">
            <flux:heading size="lg">Tambah Dokter</flux:heading>

            {{-- Pilih Spesialis --}}
            <flux:select wire:model="specialty_id" label="Spesialis">
                <option value="">-- Pilih Spesialis --</option>
                @foreach ($specialties as $spec)
                    <option value="{{ $spec->id }}">{{ $spec->name }}</option>
                @endforeach
            </flux:select>


            <flux:input wire:model="name" label="Nama Dokter" placeholder="Contoh: dr. Budi" />

            <flux:input wire:model="email" type="email" label="Email" placeholder="dokter@example.com" />

            <flux:input wire:model="phone" label="Telepon (opsional)" placeholder="+62..." />

            <div class="flex justify-end">
                <flux:button type="submit" variant="primary">Simpan</flux:button>
            </div>
        </form>
    </flux:modal>
</div>
