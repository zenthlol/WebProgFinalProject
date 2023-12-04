@include('template.partials.head')

<body>
    <div class="row justifiy-content-center">
        <div class="col-md-5">
            <main class="form-signin">
                <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
                <form action="/register" method="POST">
                    {{-- csrf biar secure & ga error (harusnya udah masuk middleware) --}}
                    @csrf
                    <div class="form-floating">
                        <input type="text"
                            class="form-control @error('name')
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
                            class="form-control @error('email')
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
                            class="form-control @error('password')
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
                <small class="d-block text-center">Already have an account? <a href="/login">Login Now!</a></small>
            </main>
        </div>
    </div>
</body>

@include('template.partials.footer')
