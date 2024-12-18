<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body class="d-flex flex-column min-vh-100 bg-light">
    <header>
        @include('layouts.navigation')
    </header>
    <main class="mt-4">
        <div class="container">
            @if(request()->session()->has('message'))
                <div class="alert alert-success">
                    {!! request()->session()->get('message') !!}
                </div>
            @endif
            {{ $slot }}
        </div>
    </main>
    <footer class="mt-auto">
        @include('layouts.footer')
    </footer>
</body>

</html>
