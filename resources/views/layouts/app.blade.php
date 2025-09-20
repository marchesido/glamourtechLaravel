<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GlamourTech</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<body>
    @include('components.header')
    <main class="container">
        @yield('content')
    </main>
    @include('components.footer')
</body>
</html>