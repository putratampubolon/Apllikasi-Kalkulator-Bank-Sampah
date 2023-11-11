<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="dashboard" class="logo d-flex align-items-center">
            <img src="{{ asset('NiceAdmin/assets/img/apple-touch-icon.png') }}" alt="">
            <span class="d-none d-lg-block">Kalkulator Bank Sampah</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="mt-3 ms-2">
        {{-- <h3>Selamat Datang {{ auth()->user()->name }}</h3> --}}
        <h3>Selamat Datang </h3>
    </div>

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            <li class="nav-item dropdown pe-3">
                {{-- @if (auth()->check())
                    @php
                        $user = auth()->user();
                    @endphp --}}

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    {{-- <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile" class="rounded-circle"> --}}
                    {{-- <span class="d-none d-md-block dropdown-toggle ps-2">{{ $user->name }}</span> --}}
                    <span class="d-none d-md-block dropdown-toggle ps-2">Menu</span>
                </a><!-- End Profile Iamge Icon -->
                {{-- @endif --}}
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        {{-- @if (auth()->check())
                            <h6>{{ $user->name }}</h6>
                            <span>{{ $user->role }}</span>
                        @endif --}}                        
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/login">
                            <i class="bi bi-box-arrow-left"></i>
                            <span>Login</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/logout">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Logout</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
