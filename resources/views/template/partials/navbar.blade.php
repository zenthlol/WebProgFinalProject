<style>
    /* Custom CSS */
    .navbar {

      padding: 10px 20px;
      background-color: #f8f9fa;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

</style>
<div style="background-color: lightblue" class="d-flex justify-content-center">
    <h1>Inkwell and Quill BookStore</h1>
</div>

    <nav style="box-shadow: 0 2px 4px 0 rgba(0,0,0,.2); " class="navbar navbar-expand-lg bg-body-tertiary sticky-top d-flex" >
        {{-- DIV 1 -=-=-------- --}}
        <div class=" " id="navbarSupportedContent">
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

              <li class="nav-item">
                @auth
                    <a class="nav-link"
                    href="{{ url('admin/index') }}" style="color:black">Admin Management Page</a>
                @endauth
              </li>
            </ul>
        </div>

        {{-- DIV 2 ================= --}}
        <div style="margin-left: 18%" class="" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 d-flex justify-content-center">
              {{-- SEARCH--}}
            @if ($active === "Home")

                <form class="d-flex" action="/welcome">
                    <input class="form-control me-2" name ="search" type="search" placeholder="Search for Book Name" value="{{request('search')}}">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
            @endif
            </ul>
        </div>

        {{-- DIV 3 ================= --}}
        <div style="margin-left: auto" class="" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 ">
                {{-- PROFILE BAR --}}
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
            </ul>
        </div>




    </nav>


