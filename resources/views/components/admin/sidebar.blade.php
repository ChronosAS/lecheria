<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        {{-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> --}}
        <div class="sidebar-brand-text mx-3">Lecheria</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <x-admin.navigation.item title="Dashboard" route="admin.dashboard">
        <x-slot name="icon">
            <i class="fas fa-fw fa-tachometer-alt"></i>
        </x-slot>
    </x-admin.navigation.item>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Modulos
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <x-admin.navigation.menu route="news" title="Noticias" name="News" header="Modulos">
        <x-slot name="icon">
            <i class="fas fa-fw fa-newspaper"></i>
        </x-slot>
        <x-slot name="link">
            <x-admin.navigation.link title="Index" route="admin.news.index"/>
        </x-slot>
    </x-admin.navigation.menu>

    <x-admin.navigation.menu route="#" title="Registro Civil" name="civiRegistry" header="Modulos">
        <x-slot name="icon">
            <i class="fas fa-fw fa-address-book"></i>
        </x-slot>
        <x-slot name="link">
            <a class="collapse-item">Estadisticas</a>
        </x-slot>
    </x-admin.navigation.menu>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
