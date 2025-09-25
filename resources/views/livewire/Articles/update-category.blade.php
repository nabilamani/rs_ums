<div>
    <flux:modal name="edit-category" class="md:w-[30rem]">
        <form wire:submit.prevent="update" class="space-y-4">
            <flux:heading size="lg">Edit Kategori</flux:heading>

            <flux:input label="Nama Kategori" wire:model="name" />
            <flux:input label="Slug" wire:model="slug" />

            <div class="flex justify-end">
                <flux:button type="submit" variant="primary">Update</flux:button>
            </div>
        </form>
    </flux:modal>
</div>
