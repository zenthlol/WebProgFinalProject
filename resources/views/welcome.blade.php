{{-- NOTE:
    ini halaman homepage ga pake template sendiri, halaman lainnya pake template semua ya.

    soalny halaman home satu satuny hlm yg pake search bar.
--}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{-- bootstrap icon below--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>Inkwell and Quill BookStore | {{$title}}</title>
    @yield('head')
</head>

<body>
    <div class="d-flex justify-content-center bg-warning">
        <h1>Inkwell and Quill BookStore</h1>
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
                    <input class="form-control me-2" name ="search" type="search" placeholder="Search for Book Name" value="{{request('search')}}">
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
    <h1>Book List</h1>
    <div class="m-5 d-flex flex-row justify-content-center">
        @foreach ($bookAll as $book) {{--looping books jadi satu per satu dari banyak books di database --}}

        <div class="card m-3" style="width: 18rem;">
            <img src="{{ asset($book->image ) }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{ $book->title }}</h5>
              <p class="card-text">by</p>
              <h5>{{ $book->author }}</h5>
              <a href="{{ route('bookById', $book->id )}}" class="btn btn-primary">Details</a>
              {{-- ini route() utk define bahwa routingan yg bernama bookById, kita panggil. dan akan passing variable id ke dalamnya --}}
            </div>
          </div>

        @endforeach
    </div>

    {{-- ini authentication hanya user logged in yg bisa akses halaman admin. --}}
    @auth
    <button type="button" class="btn btn-primary" style="margin-left: 10px; margin-bottom:20px"><a href="{{ url('admin/index') }}" style="color:white">Become Admin</a></button>
    @endauth


    <div class="d-flex justify-content-center bg-primary">
        <p>@Happy Book Store 2022</p>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>










