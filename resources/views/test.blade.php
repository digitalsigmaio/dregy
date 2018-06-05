<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ __('words.dir') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
<div id="app">
    <example-component></example-component>
</div>

</body>
</html>