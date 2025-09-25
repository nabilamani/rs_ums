<div class="space-y-8 p-6">
    @if (session('errors'))
        <livewire:components.notification :variant="'errors'" :message="session('errors')" />
    @elseif (session('success'))
        <livewire:components.notification :variant="'success'" :message="session('success')" />
    @endif

    <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <flux:heading size="xl">Manajemen Kategori Artikel</flux:heading>
            <flux:subheading class="mt-1 text-gray-500 dark:text-gray-400">
                Tambah, ubah, atau hapus kategori berita/artikel.
            </flux:subheading>
        </div>

        <flux:modal.trigger name="add-category">
            <flux:button variant="primary">
                + Tambah Kategori
            </flux:button>
        </flux:modal.trigger>
    </div>

    <flux:separator variant="subtle" />

    <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-600 dark:text-gray-300">
                        Nama Kategori
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-600 dark:text-gray-300">
                        Slug
                    </th>
                    <th
                        class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider text-gray-600 dark:text-gray-300">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-900">
                @forelse ($categories as $cat)
                    <tr>
                        <td class="px-6 py-4 text-sm font-semibold text-gray-900 dark:text-gray-100">
                            {{ $cat->name }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-300">
                            {{ $cat->slug }}
                        </td>
                        <td class="px-6 py-4 text-right text-sm">
                            <div class="flex justify-end gap-2">
                                <flux:button size="sm" variant="outline"
                                    wire:click="$dispatch('editCategory', { id: {{ $cat->id }} })">
                                    Edit
                                </flux:button>

                                {{-- Tombol hapus --}}
                                <flux:button size="sm" variant="danger"
                                    wire:click="confirmDelete({{ $cat->id }})">
                                    Hapus
                                </flux:button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                            Belum ada data kategori.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <livewire:articles.create-category />
    <livewire:articles.update-category />

    {{-- Modal konfirmasi hapus --}}
    <flux:modal name="deleteCategory" class="min-w-[22rem]">
        <div class="space-y-6">
            <flux:heading size="lg">Hapus Kategori?</flux:heading>
            <flux:text class="mt-2">
                <p>Anda yakin ingin menghapus kategori ini?</p>
                <p class="text-red-500">Tindakan ini tidak bisa dibatalkan.</p>
            </flux:text>

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
