
<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('home') }}" class="nav-link px-2 text-white">Home</a></li>
                <li><a href="{{ route('about') }}" class="nav-link px-2 text-white">About</a></li>
                <li><a href="{{ route('forum') }}" class="nav-link px-2 text-white">Forum</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
            </form>

            <div class="text-end">
                @if(Auth::check())
                    <div class="row">
                        <div class="col-6">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger me-2">Logout</button>
                            </form>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('profile') }}"><button type="button" class="btn btn-outline-warning">Profile</button></a>
                        </div>
                    </div>
                @else
                    <a href="{{ route('loginForm') }}"><button type="button" class="btn btn-outline-light me-2">Login</button></a>
                    <a href="{{ route('registerForm') }}"><button type="button" class="btn btn-outline-warning">Sign-up</button></a>
                @endif
            </div>
        </div>
    </div>
</header>
