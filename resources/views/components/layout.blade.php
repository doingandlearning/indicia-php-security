<html>

<head>
    <title>{{ $title ?? 'PHP Security' }}</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body>
    {{ $slot }}
</body>

</html>
