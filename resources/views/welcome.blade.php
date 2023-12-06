@extends('template.template')

@section('head')
@endsection

@section('body')
    <h1 class="m-3 fw-bold d-flex justify-content-center ">Books</h1>
    <div class="" style="height: 100vh">
        <div style="flex-direction: row; flex-wrap: wrap; justify-content: space-around" class="m-3 d-flex justify-content-center">
            @foreach ($bookAll as $book)
                {{-- looping books jadi satu per satu dari banyak books di database --}}

                <div class="card m-3" style="width: 13rem;">
                    <img style="padding-left: 10px; padding-right: 10px; padding-top: 5px" src="{{ asset('storage/' . $book->image)}}" class="card-img-top" alt="...">
                    <div  class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <div style="bottom: 0">
                            <p >
                                by
                                <br>
                                {{ $book->author }}
                            </p>
                            <a href="{{ route('bookById', $book->id) }}" class="btn bg-primary-subtle">Details</a>
                        </div>

                        {{-- ini route() utk define bahwa routingan yg bernama bookById, kita panggil. dan akan passing variable id ke dalamnya --}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ini authentication hanya user logged in yg bisa akses halaman admin. --}}
    @auth
        <button type="button" class="btn btn-primary" style="margin-left: 10px; margin-bottom:20px"><a
                href="{{ url('admin/index') }}" style="color:white">Become Admin</a></button>
    @endauth
@endsection
