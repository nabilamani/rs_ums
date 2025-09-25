<div>
    <flux:modal name="add-category" class="md:w-[30rem]">
        <form wire:submit.prevent="save" class="space-y-4">
            <flux:heading size="lg">Tambah Kategori</flux:heading>

            <flux:input label="Nama Kategori" wire:model="name" />
            <flux:input label="Slug" wire:model="slug" />

            <div class="flex justify-end">
                <flux:button type="submit" variant="primary">Simpan</flux:button>
            </div>
        </form>
    </flux:modal>
</div>
