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
    <main class="main-content">
        <section class="app">
            <aside class="sidebar">
                <div class="sidebar__logo">
                    <a href="/">Freelance Hub</a>
                </div>

                <nav class="sidebar__nav">
                    <a href="/clients">
                        <x-bytesize-work class="icon" />
                        Clients

                    </a>
                    <a href="/projects">
                        <x-simpleline-notebook class="icon" />
                        Projects</a>

                    {{-- <div class="corkboard">
                        <div class="corkboard__note">
                            <a href="/clients">Clients</a>
                        </div>
                        <div class="corkboard__note">
                            <a href="/projects">Projects</a>
                        </div>
                    </div> --}}

                </nav>
            </aside>
        </section>

        <main>
            <div class="main">
                @yield('content')
            </div>
        </main>
    </main>
</body>
</html>
