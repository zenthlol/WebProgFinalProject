<div class="d-flex justify-content-center bg-warning">
    <h1>Giant Book Supplier</h1>
</div>
<div class="d-flex justify-content-center">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
                        <a class="dropdown-item" href="{{ route('categoryById', 2) }}">Action</a>
                        <a class="dropdown-item" href="{{ route('categoryById', 3) }}">Adventure</a>
                    </li>


                </ul>
              </li>

            </ul>
              {{-- SEARCH--}}
            <form class="d-flex" action="/welcome">
                <input class="form-control me-2" name ="search" type="search" placeholder="Search" value="{{request('search')}}">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

              <ul class="navbar-nav ms-auto">
              @auth
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Welcome back, {{auth()->user()->name}}
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/cart"><i class="bi bi-cart"></i> My Cart</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="bi bi-box-arrow-in-left"></i>Logout
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
        </div>
      </nav>

</div>
