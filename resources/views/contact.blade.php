@extends('template.template')

@section('head')

@endsection

@section('body')

    <section style='padding:50px'>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Contact Us</h3>
                        </div>
                        <div class="card-body">
                            @if (Session::has('message_sent'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('message_sent') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('contact.message') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Name">
                                <label for="name">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="subject" class="form-control" id="floatingInput" placeholder="Subject">
                                <label for="subject">Subject</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea name="msg" class="form-control" placeholder="Leave a message here" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="msg">Message</label>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
