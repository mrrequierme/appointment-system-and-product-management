<!DOCTYPE html>
<html lang="en">
@include('layouts.partials.head')
<body>
    @include('layouts.navbar.guest_nav')
    <div class="container-fluid">
        @yield('content')
    </div>
    @include('layouts.partials.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
