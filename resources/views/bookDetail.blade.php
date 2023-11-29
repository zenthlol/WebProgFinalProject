@extends('template.template')


@section('head')

@endsection

@section('body')
<div class="d-flex justify-content-center">
    <div class="card m-3" style="width: 30rem;">
        <img src="{{ asset('storage/' . $book->image ) }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Title : {{ $book->title }}</h5>
          <h5>Author : {{ $book->author }}</h5>
          <h5>{{ $book->bookToPublisher->name }}</h5>
          <h5>Year : {{ $book->year }}</h5>
          <h5>Synopsis : {{ $book->synopsis }}</h5>
        </div>
      </div>
</div>
@endsection
