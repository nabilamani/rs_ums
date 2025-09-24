<x-layouts.app.sidebar :title="$title ?? null">
    @livewireStyles
    <flux:main>
        {{ $slot }}
    </flux:main>
    @livewireScripts
</x-layouts.app.sidebar>
