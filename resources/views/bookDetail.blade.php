@extends('template.template')


@section('head')

@endsection

@section('body')
<div class="d-flex justify-content-center">
    <div class="card m-3" style="width: 15rem;">
        <img style="padding-left: 10px; padding-right: 10px; padding-top: 5px" src="{{ asset('storage/' . $book->image ) }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Title : {{ $book->title }}</h5>
          <p>Author : {{ $book->author }}</p>
          <p>Publisher : {{ $book->bookToPublisher->name }}</p>
          <p>Year : {{ $book->year }}</p>
          <p>Synopsis : {{ $book->synopsis }}</p>
        </div>
      </div>
</div>
@endsection
