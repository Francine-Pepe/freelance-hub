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

    <div class="main-content">

        <section class="app">

            {{-- Sidebar --}}
            <aside class="sidebar">

                <div class="sidebar__header">

                    <div class="sidebar__logo">
                        <a href="/">Freelance Hub</a>
                    </div>

                    <button
                        type="button"
                        class="sidebar__toggle"
                        aria-expanded="false"
                        aria-controls="sidebar-navigation"
                        aria-label="Open navigation"
                    >
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                </div>

                <nav
                    class="sidebar__nav"
                    id="sidebar-navigation"
                >

                    <a href="/clients">
                        <x-bytesize-work class="icon" />
                        Clients
                    </a>

                    <a href="/projects">
                        <x-simpleline-notebook class="icon" />
                        Projects
                    </a>

                    <a href="/how-it-works">
                        <x-simpleline-info class="icon" />
                        Learn
                    </a>

                    @auth

                        <a href="{{ route('dashboard') }}">
                            <x-radix-dashboard class="icon" />
                            Dashboard
                        </a>

                    @endauth

                    @guest

                        <a
                            href="{{ route('login') }}"
                            class="login-button"
                        >
                            <x-simpleline-login class="icon" />
                            Login
                        </a>

                    @endguest

                    @auth

                        <div class="sidebar__user">

                            <form
                                method="POST"
                                action="{{ route('logout') }}"
                            >
                                @csrf

                                <button
                                    type="submit"
                                    class="sidebar__logout"
                                >
                                    <x-simpleline-logout class="icon" />
                                    Logout
                                </button>

                            </form>

                        </div>

                    @endauth

                </nav>

            </aside>


            {{-- Page content --}}
            <div class="page">

                <main class="main">

                    @yield('content')

                </main>


                {{-- Footer --}}
                <footer class="footer">

                    <div class="footer__content">

                        <div class="footer__brand">

                            <a href="/">
                                Freelance Hub
                            </a>

                            <p>
                                A simple space to manage your freelance work.
                            </p>

                        </div>

                        <nav
                            class="footer__nav"
                            aria-label="Footer navigation"
                        >

                            <a href="/how-it-works">
                                Learn
                            </a>

                            <a href="/clients">
                                Clients
                            </a>

                            <a href="/projects">
                                Projects
                            </a>

                            @guest

                                <a href="{{ route('login') }}">
                                    Login
                                </a>

                            @endguest

                            @auth

                                <a href="{{ route('dashboard') }}">
                                    Dashboard
                                </a>

                            @endauth

                        </nav>

                    </div>


                    <div class="footer__bottom">

                        <p>
                            &copy; {{ date('Y') }} Freelance Hub.
                            All rights reserved.
                        </p>

                        <p>
                            Built with Laravel.
                        </p>

                    </div>

                </footer>

            </div>

        </section>

    </div>

</body>

</html>
