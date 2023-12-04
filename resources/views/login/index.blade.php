@include('template.partials.head')

<body>
    <div class="row align-items-center justify-content-center h-100">
        {{-- <div style="margin-left: 30%; margin-top:10%" class="col-md-4 border"> --}}
        <div class=" col-md-4 border border-success h-50 w-50 d-flex flex-column justify-content-center">
            <main class="form-signin d-flex flex-column justify-content-center mx-auto gap-5 w-75">

                <h1 class="h3 fw-normal text-center">Please Login</h1>


                {{-- Kalo user berhasil regist --}}
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif


                {{-- Kalo salah Login --}}
                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif


                <form action="/login" method="POST" class="d-flex flex-column justify-content-center gap-3">
                    @csrf
                    <div class="form-floating">
                        <input type="email" name="email"
                            class="form-control border-primary shadow-none
                            @error('email')
                              is-invalid
                            @enderror"
                            id="floatingInput" placeholder="name@example.com" autofocus required
                            value="{{ old('email') }}">

                        <label for="floatingInput">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control border-primary shadow-none"
                            id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                </form>

                <small class="fs-5 d-block text-center">Not Registered? <a href="/register">Register Now!</a></small>
            </main>
        </div>
    </div>
</body>
