@extends('template.template')

@section('head')
@endsection

@section('body')
<div class="container">
    <div class="col-md-7 bg-light manage-wrapper">
        <h3><i class="uil uil-plus"></i>Add Book</h1>
        <p>Add the books you wanna read here !</p>
        <hr>
        <form action="{{ url('admin/create') }}" method="POST">
          @csrf


            <div class="mb-3">
              <label class="form-label">Book Title</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Input book title" name="title" value="{{ old('title') }}">
              @error('title') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
              <label class="form-label">Author</label>
              <input type="text" class="form-control" placeholder="Input Author" name="author" value="{{ old('author') }}">
              @error('author') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
              <label class="form-label">Year</label>
              <input type="number" class="form-control" placeholder="Input Year" name="year" value="{{ old('year') }}">
              @error('year') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
              <label class="form-label">Synopsis</label>
              <input type="text" class="form-control" placeholder="Input Book Synopsis" name="synopsis" value="{{ old('synopsis') }}">
              @error('synopsis') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="text" class="form-control" placeholder="Input Image directory" name="image" value="{{ old('image') }}">
                @error('image') <small class="text-danger">{{ $message }}</small> @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">Publisher ID</label>
                <input type="number" class="form-control" placeholder="Input Publisher ID" name="publisher_id" value="{{ old('publisher_id') }}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

    </div>
</div>

@endsection

