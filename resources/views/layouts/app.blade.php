<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Freelance Hub')</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body>
    <header>
        <nav>
            <a href="/clients">Clients</a>
            <a href="/projects">Projects</a>
        </nav>
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
</body>
</html>
