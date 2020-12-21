<nav class="navbar navbar-expand-lg text-white navbar-light bg-alan">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="#">Alan Finance</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto mr-auto">
                <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="#">Benefit</a>
                <a class="nav-item nav-link" href="#">Features</a>
                <a class="nav-item nav-link" href="#">Pricing</a>
                <a class="nav-item nav-link " href="#">Blog</a>
                <a class="nav-item nav-link " href="#">Guide</a>

                @guest

                    <a class="nav-item nav-link  tombol bg-purpel btn-md tombol"
                        style="width: 150px !important; margin-right:5px ;" href="{{ url('/register') }}">Register</a>
                    <a class="nav-item nav-link ili btn-light tombol  btn-md tombol itema" style="width:150px !important;"
                        href="{{ url('/login') }}">Login</a>
                @else
                <div class="nav-item dropdown">
                    <a class="nav-item  nav-link dropdown-toggle tombol bg-light text-dark btn-md tombol"
                        style="min-width: 150px !important; margin-right:5px ;" href="javascript:void(0)" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="css/src/assets/images/users/profile-pic.jpg" alt="user" class="rounded-circle"
                            width="20" />
                        <span class="text-dark">Hello,</span>
                        <span class="text-dark">{{ Auth::user()->name }}</span>
                        <!-- <i data-feather="chevron-down" class="svg-icon"></i> -->
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i data-feather="power"
                                class="svg-icon mr-2 ml-1"></i>{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>
