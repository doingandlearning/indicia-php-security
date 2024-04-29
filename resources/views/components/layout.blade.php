<html>

<head>
    <title>{{ $title ?? 'PHP Security' }}</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="container mx-auto mt-10">
    {{ $slot }}
</body>

</html>
