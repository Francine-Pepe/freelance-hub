@extends('layouts.app')

@section('title', 'Projects — Freelance Hub')

@section('content')

    <section class="intro-page">

        <div class="intro-page__content">

            <span class="intro-page__eyebrow">
                Your projects, under control
            </span>

            <h1>
                Keep track of your<br>
                freelance projects.
            </h1>

            <p class="intro-page__text">
                Freelance Hub gives you a simple place to organize
                your projects, connect them to clients and keep an
                eye on their progress.
            </p>

            <div class="intro-page__features">

                <div class="intro-page__feature">
                    <h2>Project details</h2>
                    <p>
                        Keep descriptions, budgets and important
                        information together with each project.
                    </p>
                </div>

                <div class="intro-page__feature">
                    <h2>Project status</h2>
                    <p>
                        Track your projects from planning and
                        in-progress work through to completion.
                    </p>
                </div>

                <div class="intro-page__feature">
                    <h2>Connected to your clients</h2>
                    <p>
                        Link every project to a client and keep
                        everything connected and easy to manage.
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
