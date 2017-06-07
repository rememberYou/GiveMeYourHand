<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        @include('partials._head')
    </head>

    <body data-spy="scroll" data-target=".navbar" data-offset="100">

        @yield('content')

        <!-- Footer -->
        <footer class="text-center wow fadeIn fg-white">
            @include('partials._footer')
        </footer>

        @include('partials._javascript')
    </body>
</html>
