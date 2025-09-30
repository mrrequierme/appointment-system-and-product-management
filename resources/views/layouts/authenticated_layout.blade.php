<!DOCTYPE html>
<html lang="en">
@include('layouts.partials.head')

<body>
    @include('layouts.partials.header')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            @include('layouts.navbar.authenticated_nav')
            <!-- Main content -->
            <main class="col-md-9 col-lg-10 p-1 main-content d-flex align-items-center">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <script src="{{asset('js/custom.js')}}"></script>
</body>

</html>
