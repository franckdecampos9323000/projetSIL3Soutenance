<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route("Accueil.index")}}">

        <div class="sidebar-brand-text mx-3">Administrateur <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('gestion-utilisateurs.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Utilisateurs</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('gestion-annonces.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Annonces</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
