@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <section class="home">

        <x-background-image image="images/home-bg.jpg" />
        <section class="home__content">
            <div class="home__title">
                <p class="home__eyebrow">Your Freelance workspace</p>
            </div>

            <h1>
                Freelance work, <br>
                all in one place.
            </h1>
            <p class="home__description">
                Freelance Hub is a space to organize your clients and projects, keep track of your work, and stay on top of what comes next.
            </p>


        </div>
        </section>
    </section>

@endsection
