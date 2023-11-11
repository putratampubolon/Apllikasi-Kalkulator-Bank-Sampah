<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link {{ request()->is('/') ? '' : 'collapsed' }}" href="/">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <!-- End Dashboard -->

        <li class="nav-heading">Pages</li>

            <!-- Data Bank Sampah -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('sampah') ? '' : 'collapsed' }}" href="/sampah">
                        <i class="ri-file-user-line"></i>
                        <span>Kalkulator Bank Sampah</span>
                    </a>
                </li>
            <!-- End Data Bank Sampah -->

            <!-- Data User -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('user') ? '' : 'collapsed' }}" href="/user">
                        <i class="ri-ancient-gate-line"></i>
                        <span>Data User</span>
                    </a>
                </li>
            <!-- End Data User -->
    </ul>
</aside>
<!-- End Sidebar -->
