<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar float navbar-expand-md">
        <div class="navbar-header" data-logobg="skin6">
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i></a>
            <div class="navbar-brand">
                <a href="{{ route('home') }}">
                    <b class="logo-text">
                        Alan Finance
                    </b>
                </a>
            </div>
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>

        <div class="navbar-collapse collapse " id="navbarSupportedContent">

            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-right navbar-right ml-auto">
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link" href="javascript:void(0)">
                        <form>
                            <div class="customize-input">
                                <input class="form-control custom-shadow custom-radius border-0 bg-white" type="search"
                                    placeholder="Search" aria-label="Search" />
                                <i class="form-control-icon" data-feather="search"></i>
                            </div>
                        </form>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)" id="bell"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span><i data-feather="bell" class="svg-icon"></i></span>
                        <span class="badge badge-primary notify-no rounded-circle">5</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                        <ul class="list-style-none">
                            <li>
                                <div class="message-center notifications position-relative">
                                    <!-- Message -->
                                    <a href="javascript:void(0)"
                                        class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                        <div class="btn btn-danger rounded-circle btn-circle"><i data-feather="airplay"
                                                class="text-white"></i></div>
                                        <div class="w-75 d-inline-block v-middle pl-2">
                                            <h6 class="message-title mb-0 mt-1">Luanch Admin</h6>
                                            <span class="font-12 text-nowrap d-block text-muted">Just see
                                                the my new
                                                admin!</span>
                                            <span class="font-12 text-nowrap d-block text-muted">9:30 AM</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)"
                                        class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                        <span class="btn btn-success text-white rounded-circle btn-circle"><i
                                                data-feather="calendar" class="text-white"></i></span>
                                        <div class="w-75 d-inline-block v-middle pl-2">
                                            <h6 class="message-title mb-0 mt-1">Event today</h6>
                                            <span class="font-12 text-nowrap d-block text-muted text-truncate">Just
                                                a reminder that you have event</span>
                                            <span class="font-12 text-nowrap d-block text-muted">9:10 AM</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)"
                                        class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                        <span class="btn btn-info rounded-circle btn-circle"><i data-feather="settings"
                                                class="text-white"></i></span>
                                        <div class="w-75 d-inline-block v-middle pl-2">
                                            <h6 class="message-title mb-0 mt-1">Settings</h6>
                                            <span class="font-12 text-nowrap d-block text-muted text-truncate">You
                                                can customize this template
                                                as you want</span>
                                            <span class="font-12 text-nowrap d-block text-muted">9:08 AM</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)"
                                        class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                        <span class="btn btn-primary rounded-circle btn-circle"><i data-feather="box"
                                                class="text-white"></i></span>
                                        <div class="w-75 d-inline-block v-middle pl-2">
                                            <h6 class="message-title mb-0 mt-1">Pavan kumar</h6> <span
                                                class="font-12 text-nowrap d-block text-muted">Just
                                                see the my admin!</span>
                                            <span class="font-12 text-nowrap d-block text-muted">9:02 AM</span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link pt-3 text-center text-dark" href="javascript:void(0);">
                                    <strong>Check all notifications</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('css/src/assets/images/users/profile-pic.jpg') }}" alt="user"
                            class="rounded-circle" width="40" />
                        <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span>
                            <span class="text-dark">{{ Auth::user()->name }}</span>
                            <i data-feather="chevron-down" class="svg-icon"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <a class="dropdown-item" href="javascript:void(0)"><i data-feather="user"
                                class="svg-icon mr-2 ml-1"></i>
                            My
                            Profile</a>
                        <a class="dropdown-item" href="javascript:void(0)"><i data-feather="credit-card"
                                class="svg-icon mr-2 ml-1"></i>
                            My Balance</a>
                        <a class="dropdown-item" href="javascript:void(0)"><i data-feather="mail"
                                class="svg-icon mr-2 ml-1"></i>
                            Inbox</a>
                        <a class="dropdown-item" href="javascript:void(0)"><i data-feather="settings"
                                class="svg-icon mr-2 ml-1"></i>
                            Account Setting</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i data-feather="power"
                                class="svg-icon mr-2 ml-1"></i>{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<aside class="left-sidebar" data-sidebarbg="skin6">
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{ url('/dashboard') }}" aria-expanded="false"><i
                            data-feather="home" class="feather-icon text-white"></i><span
                            class="hide-menu">Dashboard</span></a>
                </li>
                <!-- Buku Kas -->
                <li class=" buku sidebar-item">
                    <a class="buku sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i
                            data-feather="book" class="feather-icon text-white "></i><span class="hide-menu ">Buku
                            Kas
                        </span></a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item ">
                            <a href="{{ route('kas') }}" class="sidebar-link "><span class="hide-menu "> Buku Kas
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="{{ route('bukukas') }}" class="sidebar-link"><span class="hide-menu">
                                    Tambah Buku Kas
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="{{ route('kategori') }}" class="sidebar-link"><span class="hide-menu">
                                    Kategori
                                </span>
                            </a>
                        </li>
                        {{-- <li class="sidebar-item">
                            <a href="{{ route('transaksi') }}" class="sidebar-link"><span class="hide-menu"> Cari
                                    Transaksi </span></a>
                        </li> --}}
                    </ul>
                    <!-- End Buku  Kas -->
                </li>
                <!-- Hutang Piutang -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i
                            data-feather="grid" class="feather-icon text-white"></i><span class="hide-menu">Hutang
                            Piutang </span></a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="{{ url('/hutang') }}" class="sidebar-link"><span class="hide-menu"> Hutang
                                </span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ url('/piutang') }}" class="sidebar-link"><span class="hide-menu"> Piutang
                                </span></a>
                        </li>

                    </ul>
                </li>
                <!-- end Hutang Piutang -->

                <!-- Laporan Kas -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i
                            data-feather="file-text" class="feather-icon text-white"></i><span class="hide-menu">Laporan
                            Kas
                        </span></a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="{{ url('/laporan-kas/harian') }}" class="sidebar-link"><span class="hide-menu"> Laporan Kas
                                </span></a>
                        </li>
                        {{-- <li class="sidebar-item">
                            <a href="{{ url('/laporan-bulanan') }}" class="sidebar-link"><span class="hide-menu">
                                    Bulanan
                                </span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ url('/laporan-tahunan') }}" class="sidebar-link"><span class="hide-menu">
                                    Tahunan
                                </span></a>
                        </li> --}}
                    </ul>
                    <!-- End Laporan Kas -->
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i
                            data-feather="file-text" class="feather-icon text-white"></i><span class="hide-menu">Surat
                            Menyurat</span></a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="{{ url('/surat') }}" class="sidebar-link"><span class="hide-menu"> Surat
                                    Menyurat</span></a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ url('/pengaturan-surat') }}" class="sidebar-link"><span
                                    class="hide-menu">Pengaturan</span></a>
                        </li>

                    </ul>
                </li>
                <!-- Pengaturan -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i
                            data-feather="settings" class="feather-icon text-white"></i><span
                            class="hide-menu">Pengaturan</span></a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        {{-- <li class="sidebar-item">
                            <a href="{{ url('/pengaturan-kategori') }}" class="sidebar-link"><span class="hide-menu">
                                    Kategori
                                </span></a>
                        </li> --}}
                        <!-- <li class="sidebar-item">
                            <a href="" class="sidebar-link"><span class="hide-menu">
                                    Buku Kas
                                </span></a>
                        </li> -->
                        <li class="sidebar-item">
                            <a href="{{ url('/pengaturan-akun') }}" class="sidebar-link"><span class="hide-menu"> Akun
                                    Saya
                                </span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ url('/pengaturan-multiUser') }}" class="sidebar-link"><span class="hide-menu">
                                    Multi User
                                </span></a>
                        </li>

                    </ul>
                </li>
                <!-- Pengaturan -->

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
