<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name', 'Laravel').' | '.$title}}</title>
    @vite(['resources/js/jquery-3.7.0.min.js', 'resources/css/app.css'])
</head>
<body class="bg-emerald-100 hr-solutions-bg nunito-font">

    @yield('pdf')

</body>
</html>