@extends('layouts.app')

@section('title', 'Clients — Freelance Hub')

@section('content')

    <section class="intro-page">

        <div class="intro-page__content">

            <span class="intro-page__eyebrow">
                Your clients, organized
            </span>

            <h1>
                Keep your client information<br>
                in one place.
            </h1>

            <p class="intro-page__text">
                Freelance Hub helps you keep track of the people and
                businesses you work with, so you can spend less time
                searching for information and more time working on
                your projects.
            </p>

            <div class="intro-page__features">

                <div class="intro-page__feature">
                    <h2>Client details</h2>
                    <p>
                        Keep names, companies, email addresses and
                        phone numbers organized and easy to find.
                    </p>
                </div>

                <div class="intro-page__feature">
                    <h2>Projects in one place</h2>
                    <p>
                        Connect your clients with their projects and
                        keep your freelance work organized.
                    </p>
                </div>

                <div class="intro-page__feature">
                    <h2>Your own workspace</h2>
                    <p>
                        Your clients and projects belong to your
                        account and are only visible to you.
                    </p>
                </div>

            </div>

            <div class="intro-page__actions">
                <a href="{{ route('register') }}" class="button">
                    Create your account
                </a>

                <a href="{{ route('login') }}" class="button button--secondary">
                    Already have an account?
                </a>
            </div>

        </div>

    </section>

@endsection
