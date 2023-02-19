<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todos</title>
    
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.*/css/pico.min.css">
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    @livewireStyles
    <style>
        .margin-bot{
            margin: 0 0 12px 0;
        }
    </style>
</head>
<body>
    <main class="container">
        @yield('content')
    </main>
</body>
@livewireScripts
</html>