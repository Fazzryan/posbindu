<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./index.html" class="text-nowrap logo-img">
                {{-- <img src="{{ asset('assets/be/images/logos/logo.svg') }}" alt="logo" /> --}}
                <h4 class="fw-bolder">POSBINDU</h4>
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('be.dashboard') }}" aria-expanded="false">
                        <iconify-icon icon="solar:widget-add-line-duotone"></iconify-icon>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li>
                    <span class="sidebar-divider lg"></span>
                </li>
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">MASTER DATA</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('be.pendaftaran.list') }}" aria-expanded="false">
                        <iconify-icon icon="solar:user-plus-rounded-broken"></iconify-icon>
                        <span class="hide-menu">Pendaftaran</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Route::currentRouteNamed('be.wawancara.add') || Route::currentRouteNamed('be.wawancara.show') ? 'active' : '' }}"
                        href="{{ route('be.wawancara.list') }}" aria-expanded="false">
                        <iconify-icon icon="solar:book-2-broken"></iconify-icon>
                        <span class="hide-menu">Wawancara</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Route::currentRouteNamed('be.pemeriksaan.add') || Route::currentRouteNamed('be.pemeriksaan.show') ? 'active' : '' }}"
                        href="{{ route('be.pemeriksaan.list') }}" aria-expanded="false">
                        <iconify-icon icon="solar:stethoscope-broken"></iconify-icon>
                        <span class="hide-menu">Pemeriksaan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Route::currentRouteNamed('be.riwayat.add') || Route::currentRouteNamed('be.riwayat.show') ? 'active' : '' }}"
                        href="{{ route('be.riwayat.list') }}" aria-expanded="false">
                        <iconify-icon icon="solar:history-broken"></iconify-icon>
                        <span class="hide-menu">Riwayat</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Route::currentRouteNamed('be.pasien.show') || Route::currentRouteNamed('be.pasien.edit') ? 'active' : '' }}"
                        href="{{ route('be.pasien.list') }}" aria-expanded="false">
                        <iconify-icon icon="solar:users-group-two-rounded-broken"></iconify-icon>
                        <span class="hide-menu">Data Pasien</span>
                    </a>
                </li>
                <li>
                    <span class="sidebar-divider lg"></span>
                </li>
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">LAPORAN</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('be.laporan.list') }}" aria-expanded="false">
                        <iconify-icon icon="solar:printer-2-broken"></iconify-icon>
                        <span class="hide-menu">Laporan</span>
                    </a>
                </li>
                <li>
                    <span class="sidebar-divider lg"></span>
                </li>
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">AUTH</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Route::currentRouteNamed('be.profile.detail') || Route::currentRouteNamed('be.profile.list') ? 'selected' : '' }}"
                        href="{{ route('be.profile.list') }}" aria-expanded="false">
                        <iconify-icon icon="solar:user-circle-linear"></iconify-icon>
                        <span class="hide-menu">Data Petugas</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('auth.actLogout') }}" aria-expanded="false">
                        <iconify-icon icon="solar:login-3-line-duotone"></iconify-icon>
                        <span class="hide-menu">Logout</span>
                    </a>
                </li>
                <li>
                    <span class="sidebar-divider lg"></span>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->
