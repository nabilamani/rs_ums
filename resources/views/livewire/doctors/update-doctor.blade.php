<div>
    {{-- Modal Edit Dokter --}}
    <flux:modal name="editDoctor" class="md:w-[60rem]">
        <form wire:submit.prevent="update" class="space-y-4">
            <flux:heading size="lg">Edit Data Dokter</flux:heading>

            {{-- Pilih Spesialis --}}
            <flux:select wire:model="specialty_id"
                         label="Spesialis"
                         placeholder="Pilih Spesialis">
                <option value="" disabled selected>Pilih Spesialis</option>
                @foreach ($specialties as $spec)
                    <option value="{{ $spec->id }}">{{ $spec->name }}</option>
                @endforeach
            </flux:select>

            <flux:input label="Nama Dokter"
                        placeholder="Nama lengkap"
                        wire:model="name" />

            <flux:input label="Email"
                        type="email"
                        placeholder="contoh@email.com"
                        wire:model="email" />

            <flux:input label="Nomor Telepon (opsional)"
                        placeholder="0812xxxx"
                        wire:model="phone" />

            <div class="flex justify-end">
                <flux:button type="submit" variant="primary">
                    Perbarui
                </flux:button>
            </div>
        </form>
    </flux:modal>


    @if (session('errors'))
        <livewire:components.notification :variant="'errors'" :message="session('errors')" />
    @elseif (session('success'))
        <livewire:components.notification :variant="'success'" :message="session('success')" />
    @endif
</div>
