<style>
        .navbar.center .navbar-inner {
        text-align: center;
    }

    .navbar.center .navbar-inner .nav {
        display:inline-block;
        float: none;
    }
</style>
<div style="background-color: lightblue" class="d-flex justify-content-center">
    <h1>Inkwell and Quill BookStore</h1>
</div>
{{-- <div class="d-flex justify-content-center sticky-top"> --}}
    <nav style="box-shadow: 0 2px 4px 0 rgba(0,0,0,.2); " class="navbar navbar-expand-lg bg-body-tertiary d-flex justify-content-center sticky-top " >
        <div class="container-fluid d-flex justify-content-cen  ter">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 d-flex justify-content-center">
              <li class="nav-item">
                <a class="nav-link {{ ($active === "Home") ? 'active' : '' }}" aria-current="page" href="{{ route('welcome') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ ($active === "Publisher") ? 'active' : '' }}" href="{{ route('publisher') }}">Publisher</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ ($active === "Contact") ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ ($active === "Category") ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Category
                </a>
                <ul class="dropdown-menu">
                    {{-- @foreach ($categories as $cat)
                    <li><a class="dropdown-item" href="#">{{ $cat->name }}</a></li>
                    @endforeach --}}
                    <li>
                        <a class="dropdown-item" href="{{ route('categoryById', 1) }}">Romance</a>
                        <a class="dropdown-item" href="{{ route('categoryById', 2) }}">Fantasy</a>
                        <a class="dropdown-item" href="{{ route('categoryById', 3) }}">Action</a>
                        <a class="dropdown-item" href="{{ route('categoryById', 4) }}">Adventure</a>
                        <a class="dropdown-item" href="{{ route('categoryById', 5) }}">Mystery</a>
                    </li>
                </ul>
              </li>

            @if ($active === "Home")
                {{-- SEARCH--}}
                <form class="d-flex" action="/welcome">
                    <input class="form-control me-2" name ="search" type="search" placeholder="Search for Book Name" value="{{request('search')}}">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            @endif


            {{-- <ul class="navbar-nav ms-auto"> --}}
              @auth
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Welcome back, {{auth()->user()->name}}
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/profile"><i class="bi bi-person"></i> Profile</a></li>
                    <li><a class="dropdown-item" href="/password"><i class="bi bi-lock"></i> Change Password</a></li>
                    <li><a class="dropdown-item" href="/cart"><i class="bi bi-cart"></i> My Cart</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="bi bi-box-arrow-in-left"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
              </li>
              @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                </li>
              @endauth
            {{-- </ul> --}}


            </div>
        </div>
    </nav>

{{-- </div> --}}
