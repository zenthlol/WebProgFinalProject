@extends('template.template')

@section('head')
@endsection

@section('body')

<div class="container m-5 d-flex justify-content-center">
    <div class="col-md-8 bg-light manage-wrapper">
        <h3 >Admin Management Book Categories Page</h1>
        <p>--</p>
        <hr>
        <a href="{{ url('bookCategory/assignCategory') }}" class="btn btn-dark btn-sm mb-2">Add Book Categories</a>

        @if(session('status_sukses'))
          <div class="alert alert-success" role="alert">
            {{ session('status_sukses') }}
          </div>
        @endif

        <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Book ID</th>
                <th>Book Category ID</th>

              </tr>
            </thead>
            <tbody>
              {{-- @php $num = 1 @endphp --}}
              @foreach($bookCats as $bookCat)
                <tr>
                  <td>{{$bookCat->id}}</td>
                  <td>{{$bookCat->book_id}}</td>
                  <td>{{$bookCat->category_id}}</td>

                  {{-- <td>

                    <a href="{{ url('admin/edit/' . $book->id) }}" class="text-primary">Edit</a>


                    <a href="#" class="text-danger" onclick="event.preventDefault();document.getElementById('delete-form-{{ $book->id }}').submit();">
                      Delete

                      <form id="delete-form-{{ $book->id }}" action="{{ url('admin/destroy/' . $book->id) }}"
                        method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                      </form>

                    </a>
                  </td> --}}
                </tr>
              @endforeach
            </tbody>
          </table>

    </div>
</div>
@endsection
