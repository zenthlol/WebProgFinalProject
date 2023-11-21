<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Giant Book Store | {{$title}}</title>
    @yield('head')
</head>
<body>
    {{-- navbar --}}
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
                  {{-- SEARCH (NT)--}}
                    <form action="/welcome">
                        <label for="search" class="form-label">Search:</label>
                        <input type="text" id="search" name="search" class="form-control" placeholder="Search.." value="{{request('search')}}">
                        <button type="submit" class="btn btn-primary">Search</button>
                      </form>
                  </li>

                </ul>
              </div>
            </div>
          </nav>

    </div>
    @yield('body')

    {{-- footer --}}
    <div class="d-flex justify-content-center bg-primary">
        <p>@Happy Book Store 2022</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
