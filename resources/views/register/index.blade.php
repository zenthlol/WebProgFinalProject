@include('template.partials.head')

<body>
    {{-- <div class="row justifiy-content-center" style="height: 100vh"> --}}
    <div class="row align-items-center justify-content-center h-100">
        {{-- <div style="margin-left: 30%; margin-top:10%" class="col-md-5"> --}}
        <div class="col-md-4 border border-success h-50 w-50 d-flex flex-column justify-content-center">
            {{-- <main class="form-signin"> --}}
            <main class="form-signin d-flex flex-column justify-content-center mx-auto gap-5 w-75">
                <h1 class="h3 fw-normal text-center">Registration Form</h1>
                
                <form action="/register" method="POST" class="d-flex flex-column justify-content-center gap-3">
                    {{-- csrf biar secure & ga error (harusnya udah masuk middleware) --}}
                    @csrf
                    <div class="form-floating">
                        <input type="text"
                            class="form-control border-primary shadow-none @error('name')
                        is-invalid
                    @enderror"
                            name="name" id="name" placeholder="name" required value="{{ old('name') }}">
                        <label for="name">Name</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email"
                            class="form-control border-primary shadow-none @error('email')
                        is-invalid
                    @enderror"
                            name="email" id="email" placeholder="email@example.com" required
                            value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password"
                            class="form-control border-primary shadow-none @error('password')
                        is-invalid
                    @enderror"
                            name="password" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                </form>
                <small class="fs-5 d-block text-center">Already have an account? <a href="/login">Login Now!</a></small>
            </main>
        </div>
    </div>
</body>

@include('template.partials.footer')
