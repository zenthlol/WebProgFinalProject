@extends('template.template')

@section('head')
@endsection

@section('body')
    <div class="m-5 d-flex-column justify-content-center">
        @foreach ($publishers as $publisher)
            {{-- looping books jadi satu per satu dari banyak books di database --}}
            <h1>Pubisher:</h1>
            <div class="card m-3" style="width: 18rem;">
                <img src="{{ asset('storage/' . $publisher->image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Name : {{ $publisher->name }}</h5>
                    <h5 class="card-title">Address : {{ $publisher->address }}</h5>
                    <h5 class="card-title">Phone : {{ $publisher->phone }}</h5>
                    <h5 class="card-title">Email : {{ $publisher->email }}</h5>

                    {{-- ini route() utk define bahwa routingan yg bernama bookById, kita panggil. dan akan passing variable id ke dalamnya --}}
                </div>
            </div>
            <h1>Books Published:</h1>
            <div class="d-flex flex-row">
                @foreach ($publisher->publisherToBook as $item)
                    {{-- ini publisherToBook dari function di model publisher --}}
                    <div class="card m-3 " style="width: 18rem;">
                        <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Book Title = {{ $item->title }}</h5>
                            <p class="card-text">Written by</p>
                            <h5 class="card-title">{{ $item->author }}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
            <h1>================================================================</h1>
        @endforeach
    </div>
@endsection
