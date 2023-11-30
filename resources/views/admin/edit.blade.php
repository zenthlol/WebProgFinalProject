@extends('template.template')

@section('head')
@endsection

@section('body')
    <div class="container">
        <div class="col-md-7 bg-light manage-wrapper">
            <h3><i class="uil uil-edit-alt me-2"></i>Edit Book</h1>
                <p>Edit your book here !</p>
                <hr>

                <form action="{{ url('admin/edit/' . $book->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                            placeholder="Input book title" name="title" value="{{ $book->title }}">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Author</label>
                        <input type="text" class="form-control" placeholder="Input Author Name" name="author"
                            value="{{ $book->author }}">
                        @error('author')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Year</label>
                        <input type="number" class="form-control" placeholder="Input Year" name="year"
                            value="{{ $book->year }}">
                        @error('year')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Synopsis</label>
                        <input type="text" class="form-control" placeholder="Input Synopsis" name="synopsis"
                            value="{{ $book->synopsis }}">
                        @error('synopsis')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="text" class="form-control" placeholder="Input Image" name="image" value="{{ $book->image }}">
                @error('image') <small class="text-danger">{{ $message }}</small> @enderror
            </div> --}}

                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Book Cover</label>
                        @if ($book->image)
                        <img src="{{asset('storage/' . $book->image)}}" class="img-preview img-fluid mb-3 col-sm-3 d-block">

                        @else
                        <img class="img-preview img-fluid mb-3 col-sm-3">
                        @endif
                        <input class="form-control @error('image')is-invalid
                @enderror" type="file"
                            id="image" name="image" onchange=previewImage()>
                            <input type="hidden" name="oldImage" value="{{$book->image}}">
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Publisher ID</label>
                        <input type="number" class="form-control" placeholder="Input Publisher ID" name="publisher_id"
                            value="{{ $book->publisher_id }}">
                        @error('publisher_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

        </div>
    </div>
    <script src="{{ asset('js/imagePreview.js') }}"></script>
@endsection
