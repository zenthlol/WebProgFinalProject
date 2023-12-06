<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- buat icon, nanti diganti sama logo --}}
    <link rel="icon" href="{{ asset('asset/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{-- bootstrap icon below--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>Inkwell and Quill BookStore | {{$title}}</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700&display=swap');
        
        *{
            font-family: 'Montserrat', sans-serif;
        }
    </style>
    @yield('head')
</head>
