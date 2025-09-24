<div class="relative mb-6 w-full">
    <flux:heading size="xl" level="1">{{ __('Halaman Berita') }}</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('Silahkan kelola berita Anda di sini') }}</flux:subheading>
    <flux:separator variant="subtle" />
    
    {{-- Custom date input with Tailwind styling --}}
    <div class="mt-6">
        <label class="block text-sm font-medium text-gray-100 mb-2">
            Pilih Tanggal
        </label>
        <input 
            type="date" 
            wire:model="date"
            class="block w-full mb-5 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
        />
        <textarea class="summernote"></textarea>
    </div>
    
</div>

@script
<script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 200,         // tinggi editor
            placeholder: 'Tulis konten di sini...',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>
@endscript