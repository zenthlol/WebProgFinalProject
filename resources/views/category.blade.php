@extends('template.template')

@section('head')

@endsection

@section('body')
    <<h1>Book List Category</h1>
    <div class="m-5 d-flex flex-row justify-content-center">
        @foreach ($bookCats as $book) {{--looping books jadi satu per satu dari banyak books di database --}}

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

@endsection