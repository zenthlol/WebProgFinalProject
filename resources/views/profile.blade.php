@extends('template.template')

@section('head')
@endsection

@section('body')
    <div class="row justifiy-content-center">
        <div class="col-md-5">
            <main class="form-signin">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                {{-- Kalo salah info --}}
                @if (session()->has('updateError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{session('updateError')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                <h1 class="h3 mb-3 fw-normal text-center">Update Your Profile!</h1>
                <form action="/profile" method="POST">
                    {{-- csrf biar secure & ga error (harusnya udah masuk middleware)--}}
                    @csrf
                  <div class="form-floating">
                    <input type="text" class="form-control @error('name')
                        is-invalid
                    @enderror" name="name" id="name" placeholder="name" required value="{{auth()->user()->name}}">
                    <label for="name">Name</label>
                      @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                  </div>
                  <div class="form-floating">
                    <input type="password" class="form-control @error('password')
                        is-invalid
                    @enderror" name="password" id="password" placeholder="Password" required>
                    <label for="password">Enter password to update</label>
                      @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                  </div>
                  <button class="w-100 btn btn-lg btn-primary mb-5" type="submit">Update Profile</button>
                </form>
            </main>
        </div>
    </div>
@endsection
