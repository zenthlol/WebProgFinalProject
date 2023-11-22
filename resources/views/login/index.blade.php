@include('template.partials.head')
<body>
    <div class="row justifiy-content-center">
        <div class="col-md-4">
            <main class="form-signin">
                <h1 class="h3 mb-3 fw-normal text-center">Please login</h1>
                {{-- Kalo user berhasil regist --}}
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                {{-- Kalo salah Login --}}
                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{session('loginError')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                <form action="/login" method="POST">
                    @csrf
                  <div class="form-floating">
                    <input type="email" name="email" class="form-control  @error('email')
                        is-invalid
                    @enderror" id="floatingInput" placeholder="name@example.com" autofocus required value="{{old('email')}}">
                    <label for="floatingInput">Email address</label>
                      @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                  </div>
                  <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                  </div>
                  <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                </form>
                <small class="d-block text-center">Not Registered? <a href="/register">Register Now!</a></small>
            </main>
        </div>
    </div>
</body>

@include('template.partials.footer')
