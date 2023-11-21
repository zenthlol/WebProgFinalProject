@extends('template.template')

@section('head')
@endsection

@section('body')


<div class="container">
    <div class="col-md-8 bg-light manage-wrapper">
        <h3 >Admin Management Book Page</h1>
        <p>Manage your books, tidy them up!</p>
        <hr>
        <a href="{{ url('admin/create') }}" class="btn btn-dark btn-sm mb-2">Add Books</a>
        <a href="{{ url('bookCategory/assignCategory') }}" class="btn btn-secondary btn-sm mb-2" style="margin-left:10px">Assign Category</a>

        @if(session('status_sukses'))
          <div class="alert alert-success" role="alert">
            {{ session('status_sukses') }}
        @endif

        <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
                <th>Synopsis</th>
                <th>Image</th>
                <th>Publisher-ID</th>
              </tr>
            </thead>
            <tbody>
              {{-- @php $num = 1 @endphp --}}
              @foreach($books as $book)
                <tr>
                  <td>{{$book->id}}</td>
                  <td>{{$book->title}}</td>
                  <td>{{$book->author}}</td>
                  <td>{{$book->year}}</td>
                  <td>{{$book->synopsis}}</td>
                  <td>{{asset($book->image)}}</td>
                  <td>{{$book->publisher_id}}</td>
                  <td>
                    {{-- EDIT --}}
                    <a href="{{ url('admin/edit/' . $book->id) }}" class="text-primary">Edit</a>

                    {{-- DELETE --}}
                    <a href="#" class="text-danger" onclick="event.preventDefault();document.getElementById('delete-form-{{ $book->id }}').submit();">
                      Delete

                      <form id="delete-form-{{ $book->id }}" action="{{ url('admin/destroy/' . $book->id) }}"
                        method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                      </form>

                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection
