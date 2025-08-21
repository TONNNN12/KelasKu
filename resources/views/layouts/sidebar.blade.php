<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" 
    style="background: #002D72;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" 
       href="{{ route('welcome') }}" 
       style="background: #002D72;">
        <div class="sidebar-brand-icon">
            <i class="fas fa-tasks" style="color:#FFB703;"></i>
        </div>
        <div class="sidebar-brand-text mx-3" style="color:#FFB703; font-weight:700;">
            KelasKu
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0" style="border-color:#FFB703;">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $menuDashboard ?? '' }}">
        <a class="nav-link custom-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" style="border-color:#FFB703;">

    @if (auth()->user()->jabatan== 'Admin')
        <!-- Heading -->
        <div class="sidebar-heading" style="color:#FFB703;">
            MENU ADMIN
        </div>

        <!-- Nav Item - Data User -->
        <li class="nav-item {{ $menuAdminUser ?? '' }}">
            <a class="nav-link custom-link" href="{{ route('user') }}">
                <i class="fas fa-user"></i>
                <span>Data User</span></a>
        </li>

        <!-- Nav Item - Data Tugas -->
        <li class="nav-item {{ $menuAdminTugas ?? '' }}">
            <a class="nav-link custom-link" href="{{ route('tugas') }}">
                <i class="fas fa-tasks"></i>
                <span>Data Tugas</span></a>
        </li>
    @else
        <!-- Heading -->
        <div class="sidebar-heading" style="color:#FFB703;">
            MENU SISWA
        </div>

        <!-- Nav Item - Tugas -->
        <li class="nav-item {{ $menuSiswaTugas ?? '' }}">
            <a class="nav-link custom-link" href="{{ route('tugas') }}">
                <i class="fas fa-tasks"></i>
                <span>Data Tugas</span></a>
        </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block" style="border-color:#FFB703;">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle" 
            style="background:#FFB703;"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Custom CSS -->
<style>
    /* warna link default */
    .sidebar .nav-link {
        color: #ffffff !important;
        transition: 0.3s;
        font-weight: 500;
    }

    /* efek hover */
    .sidebar .nav-link:hover {
        background-color: #FFB703;
        color: #0A174E !important;
        border-radius: 8px;
        font-weight: 600;
    }

    /* ikon ikut berubah warna saat hover */
    .sidebar .nav-link:hover i {
        color: #0A174E !important;
    }

    /* ikon default */
    .sidebar .nav-link i {
        color: #FFB703;
        margin-right: 6px;
    }

    /* teks aktif */
    .sidebar .nav-item.active .nav-link {
        background-color: #FFB703;
        color: #0A174E !important;
        font-weight: 700;
        border-radius: 8px;
    }

    .sidebar .nav-item.active .nav-link i {
        color: #0A174E !important;
    }
</style>
