@extends('template.template')

@section('head')
@endsection

@section('body')
    {{-- Pakai Component Accordion Bootstrap --}}
    <div class="container-fluid w-75 text-center">
        <div class="accordion accordion-flush d-flex flex-column gap-4 py-3 " id="accordionFlushExample">
            {{-- Judul --}}
            <h1>Publisher List</h1>

            {{-- List Publisher --}}
            @foreach ($publishers as $publisher)
                <div class="accordion-item border">
                    <h2 class="accordion-header">

                        {{-- Kotak per Publisher --}}
                        <button
                            class="
                                accordion-button collapsed shadow-none btn btn-outline-primary"
                            type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse{{ preg_replace('/[^A-Za-z]/', '', $publisher->name) }}">

                            {{-- Nama Publisher --}}
                            <h5>{{ $publisher->name }}</h5>

                            <i class="fa fa-angle-down"></i>
                        </button>
                    </h2>

                    {{-- Buku apa saja yang dipublish oleh publisher --}}
                    <div id="flush-collapse{{ preg_replace('/[^A-Za-z]/', '', $publisher->name) }}"
                        class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="d-flex flex-row">

                                {{-- Buku-buku --}}
                                @foreach ($publisher->publisherToBook as $item)
                                    <div class="card m-3 " style="width: 18rem;">
                                        <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">Title : {{ $item->title }}</h5>
                                            <p class="card-text">Synopsis</p>
                                            <h5 class="card-title">{{ $item->synopsis }}</h5>
                                            <a href="{{ route('bookById', $item->id) }}" class="btn btn-primary">Details</a>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
