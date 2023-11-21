@extends('template.template')

@section('head')
@endsection

@section('body')
<div class="container">
    <div class="col-md-7 bg-light manage-wrapper">
        <h3><i class="uil uil-plus"></i>Assign Book Categories</h1>
        <p>--</p>
        <hr>
        <form action="{{ url('bookCategory/assignCategory') }}" method="POST">
          @csrf


            {{-- <div class="mb-3">
              <label class="form-label">Book Title</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Input book title" name="title" value="{{ old('title') }}">
              @error('title') <small class="text-danger">{{ $message }}</small> @enderror
            </div> --}}

            <div class="mb-3">
                <label class="form-label">Book</label>
                <select class="form-select" aria-label="Default select example" name="book_id">
                    <option selected>Select Book</option>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                    @endforeach
                </select>
                @error('book_id') <small class="text-danger">{{ $message }}</small> @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">Category Name</label>
                <select class="form-select" aria-label="Default select example" name="category_id">
                    <option selected>Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('book_id') <small class="text-danger">{{ $message }}</small> @enderror
              </div>




            {{-- <div class="mb-3">
                <label class="form-label">Book ID</label>
                <input type="integer" class="form-control @error('book_id') is-invalid @enderror" placeholder="Input book ID" name="book_id" value="{{ old('book_id') }}">
                @error('book_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Category ID</label>
                <input type="integer" class="form-control @error('category_id') is-invalid @enderror" placeholder="Input category ID" name="category_id" value="{{ old('category_id') }}">
                @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div> --}}

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>



    </div>
</div>

@endsection

