@php
    function vite($asset) {
        $path = glob(public_path('/build/assets/' . str_replace('.', '.*.', $asset)))[0];
        return ltrim(str_replace(public_path(), '', $path), '\\');
    }
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ env('APP_NAME') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="{{ vite('app.css') }}">
</head>
<body>
    <div id="app"></div>
    @devserver
        <script type="module" src="http://localhost:3000/@vite/client"></script>
        <script type="module" src="http://localhost:3000/resources/js/app.js"></script>
    @else
        <script type="module" src="{{ vite('app.js') }}"></script>
    @enddevserver
</body>
</html>
