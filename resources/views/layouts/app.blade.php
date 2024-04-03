<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME') }}</title>

    <!-- Styles -->
    @vite('resources/js/app.js')
    @yield('css')
</head>

<body>
    @include('layouts.partials.header')


    <main>
        @yield('content')
    </main>

    @include('layouts.partials.footer')

    @yield('modal')
    @yield('js')
</body>

</html>
