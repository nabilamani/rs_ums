<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    @include('partials.head')
</head>
<body class="min-h-screen">

    {{-- HEADER / NAVBAR --}}
    <flux:header container class="fixed top-0 left-0 right-0 z-50 bg-blue-800 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700 rounded-4xl m-5">
        {{-- Toggle Sidebar Mobile --}}
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        {{-- Logo + Brand --}}
        <flux:brand 
            href="#" 
            logo="{{ asset('assets/logo_ums.png') }}"
            logo:dark="{{ asset('assets/logo_warna.png') }}"
            name="RS UMS"
            class="max-lg:hidden! hidden dark:flex"
        />

        {{-- NAVBAR MENU --}}
        <flux:navbar class="-mb-px max-lg:hidden ">
            <flux:navbar.item icon="home" href="#">Beranda</flux:navbar.item>
            <flux:navbar.item icon="building-office" href="#">Profil</flux:navbar.item>
            <flux:navbar.item icon="heart" href="#">Layanan</flux:navbar.item>
            <flux:navbar.item icon="newspaper" href="#">Berita</flux:navbar.item>
            <flux:navbar.item icon="phone" href="#">Kontak</flux:navbar.item>
        </flux:navbar>

        <flux:spacer />


        {{-- Tombol login sederhana --}}
        <flux:navbar>
            <flux:navbar.item icon="arrow-right-start-on-rectangle" href="#">
                Login
            </flux:navbar.item>
        </flux:navbar>

        
        {{-- Theme Toggle (Light/Dark) --}}
        <flux:switch x-data x-model="$flux.dark" label="Dark mode"  />
    </flux:header>

    {{-- SIDEBAR untuk mobile --}}
    <flux:sidebar sticky collapsible="mobile" class="lg:hidden bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
        <flux:sidebar.header>
            <flux:sidebar.brand
                href="#"
                logo="{{ asset('assets/logo_ums.png') }}"
                logo:dark="{{ asset('assets/logo_warna.png') }}"
                name="RS UMS"
            />
            <flux:sidebar.collapse />
        </flux:sidebar.header>

        <flux:sidebar.nav>
            <flux:sidebar.item icon="home" href="#">Beranda</flux:sidebar.item>
            <flux:sidebar.item icon="building-office" href="#">Profil</flux:sidebar.item>
            <flux:sidebar.item icon="heart" href="#">Layanan</flux:sidebar.item>
            <flux:sidebar.item icon="newspaper" href="#">Artkel</flux:sidebar.item>
            <flux:sidebar.item icon="phone" href="#">Kontak</flux:sidebar.item>
        </flux:sidebar.nav>
    </flux:sidebar>

    @fluxScripts
</body>
</html>
