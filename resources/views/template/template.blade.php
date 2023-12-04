<!DOCTYPE html>
<html lang="en">
@include('template.partials.head')

<body>
    {{-- navbar --}}
    @include('template.partials.navbar')

    @yield('body')

    {{-- footer --}}
    @include('template.partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
