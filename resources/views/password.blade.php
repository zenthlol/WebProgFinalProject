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
                <h1 class="h3 mb-3 fw-normal text-center">Change Password</h1>
                <form action="/password" method="POST">
                    {{-- csrf biar secure & ga error (harusnya udah masuk middleware)--}}
                    @csrf
                  <div class="form-floating">
                    <input type="password" class="form-control @error('oldPassword')
                        is-invalid
                    @enderror" name="oldPassword" id="oldPassword" placeholder="Password" required>
                    <label for="oldPassword">Old Password</label>
                      @error('oldPassword')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                  </div>
                  <div class="form-floating">
                    <input type="password" class="form-control @error('newPassword')
                        is-invalid
                    @enderror" name="newPassword" id="newPassword" placeholder="Password" required>
                    <label for="newPassword">New Password</label>
                      @error('newPassword')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                  </div>
                  <div class="form-floating">
                    <input type="password" class="form-control @error('confirmPassword')
                        is-invalid
                    @enderror" name="confirmPassword" id="confirmPassword" placeholder="Password" required>
                    <label for="confirmPassword">Confirm Password</label>
                      @error('confirmPassword')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                  </div>
                  <button class="w-100 btn btn-lg btn-primary mb-5" type="submit">Change Password</button>
                </form>
            </main>
        </div>
    </div>
@endsection
