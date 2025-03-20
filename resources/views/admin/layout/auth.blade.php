<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>{{ isset($title)?(ucwords($title).' | '.config('app.name')):config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ Vite::asset('resources/assets/images/logo/favicon.ico') }}"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>

    @vite(['resources/assets/css/app.css','resources/assets/mv/plugins.bundle.css','resources/assets/mv/style.bundle.css'])

</head>
<body id="kt_body" class="app-blank">
@yield('content')

<script src="{{ asset('/build/mv/plugins.bundle.js') }}"></script>
<script src="{{ asset('/build/mv/scripts.bundle.js') }}"></script>
@vite('resources/assets/js/app.js')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
{{--@vite('resources/assets/js/alpinejs.cdn.min.js')--}}
@yield('script')
</body>
</html>
