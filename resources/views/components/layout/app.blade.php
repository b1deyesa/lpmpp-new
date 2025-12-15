<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" />
    <script src="https://kit.fontawesome.com/4419d23bf4.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="{{ $class }}">
    {{ $slot }}
    @livewireScripts
</body>
</html>