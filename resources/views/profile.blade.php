@extends('template.template')

@section('head')
@endsection

@section('body')
    <div class="profile-height row justify-content-center align-items-center">
        <div class="col-md-5 ">
            <main class="form-signin">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" ></button>
                    </div>
                @endif
                {{-- Kalo salah info --}}
                @if (session()->has('updateError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('updateError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <h1 class="h3 mb-4 fw-normal text-center">Update Your Profile!</h1>
                <form action="/profile" method="POST" class="d-flex align-items-center flex-column gap-3">
                    {{-- csrf biar secure & ga error (harusnya udah masuk middleware) --}}
                    @csrf
                    <div class="form-floating w-100">
                        <input type="text" name="name" id="name" placeholder="name" required
                            value="{{ auth()->user()->name }}"
                            class="shadow-none form-control 
                          @error('name')
                            is-invalid
                          @enderror">

                        <label for="name">Name</label>

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating w-100">
                        <input type="password" name="password" id="password" placeholder="Password" required
                            class="shadow-none form-control 
                          @error('password')
                            is-invalid
                          @enderror">
                        <label for="password">Enter Password to Update</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="w-50 btn btn-lg btn-primary mt-4" type="submit">Update Profile</button>
                </form>
            </main>
        </div>
    </div>
@endsection
