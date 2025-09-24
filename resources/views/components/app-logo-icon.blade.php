{{-- Logo dinamis sesuai mode --}}
<img src="{{ asset('assets/logo_warna.png') }}" 
     alt="Logo RS UMS" 
     class="block dark:hidden" 
     {{ $attributes }}>

<img src="{{ asset('assets/logo_ums.png') }}" 
     alt="Logo RS UMS" 
     class="hidden dark:block" 
     {{ $attributes }}>
