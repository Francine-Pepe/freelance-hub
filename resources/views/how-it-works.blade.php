@extends('layouts.app')

@section('title', 'How Freelance Hub Works')

@section('content')

    <main class="how-it-works">

    {{-- Intro --}}
    <section class="how-it-works__intro">

        <div class="how-it-works__content">

            <span class="how-it-works__eyebrow">
                How it works
            </span>

            <h1>
                Your freelance work,
                <span>all in one place.</span>
            </h1>

            <p class="how-it-works__text">
                Freelance Hub helps you keep your clients, projects and
                reminders organized, so you can spend less time managing
                your work and more time doing it.
            </p>

        </div>

    </section>


    {{-- Workflow --}}
    <section class="how-it-works__section">

        <div class="how-it-works__section-header">

            <span class="how-it-works__eyebrow">
                Your workflow
            </span>

            <h2>
                A simple way to stay organized.
            </h2>

            <p>
                Start with a client, connect their projects, and keep
                track of the things that need your attention.
            </p>

        </div>


        <div class="how-it-works__steps">

            <article class="how-it-works__step">

                <span class="how-it-works__number">
                    01
                </span>

                <div>
                    <h3>Add your clients</h3>

                    <p>
                        Create a client profile and keep their contact
                        information in one place. You can come back to
                        their details whenever you need them.
                    </p>
                </div>

            </article>


            <article class="how-it-works__step">

                <span class="how-it-works__number">
                    02
                </span>

                <div>
                    <h3>Create projects</h3>

                    <p>
                        Create projects and connect them to your clients.
                        Use project status to see what is planned, what
                        is currently in progress and what is finished.
                    </p>
                </div>

            </article>


            <article class="how-it-works__step">

                <span class="how-it-works__number">
                    03
                </span>

                <div>
                    <h3>Add reminders</h3>

                    <p>
                        Keep small tasks and follow-ups out of your head.
                        Add a reminder whenever there is something you
                        don't want to forget.
                    </p>
                </div>

            </article>


            <article class="how-it-works__step">

                <span class="how-it-works__number">
                    04
                </span>

                <div>
                    <h3>Use your dashboard</h3>

                    <p>
                        Get a quick overview of your freelance activity.
                        Your dashboard brings your clients, projects and
                        reminders together.
                    </p>
                </div>

            </article>

        </div>

    </section>


    {{-- Features --}}
    <section class="how-it-works__section how-it-works__section--features">

        <div class="how-it-works__section-header">

            <span class="how-it-works__eyebrow">
                Inside Freelance Hub
            </span>

            <h2>
                Everything has its place.
            </h2>

        </div>


        <div class="how-it-works__features">

            <article class="how-it-works__feature">

                <span class="how-it-works__feature-number">
                    01
                </span>

                <div>
                    <h3>Clients</h3>

                    <p>
                        Store client names, contact details and other
                        information you need while working together.
                    </p>
                </div>

            </article>


            <article class="how-it-works__feature">

                <span class="how-it-works__feature-number">
                    02
                </span>

                <div>
                    <h3>Projects</h3>

                    <p>
                        Organize your work by project and keep track of
                        its progress from planning to completion.
                    </p>
                </div>

            </article>


            <article class="how-it-works__feature">

                <span class="how-it-works__feature-number">
                    03
                </span>

                <div>
                    <h3>Reminders</h3>

                    <p>
                        Add quick reminders for follow-ups, deadlines,
                        invoices or anything else that needs your attention.
                    </p>
                </div>

            </article>


            <article class="how-it-works__feature">

                <span class="how-it-works__feature-number">
                    04
                </span>

                <div>
                    <h3>Profile</h3>

                    <p>
                        Manage your account information and keep your
                        profile details up to date.
                    </p>
                </div>

            </article>

        </div>

    </section>


    {{-- Tip --}}
    <section class="how-it-works__tip">

        <div>
            <span class="how-it-works__eyebrow">
                A little tip
            </span>

            <h2>
                Make Freelance Hub part of your routine.
            </h2>

            <p>
                Add clients when you start working with them, create
                projects when the work begins, and add reminders whenever
                something needs your attention.
            </p>
        </div>

        <div class="how-it-works__tip-card">
            <span>✦</span>

            <p>
                The goal isn't to add more administration to your day.
                It's to keep the administration simple.
            </p>
        </div>

    </section>


    {{-- Action --}}
    <section class="how-it-works__actions">

        <div>
            <h2>
                Ready to get organized?
            </h2>

            <p>
                Go to your dashboard and start building your workspace.
            </p>
        </div>

        <div class="how-it-works__buttons">

            <a
                href="{{ route('dashboard') }}"
                class="button"
            >
                Go to dashboard
            </a>

        </div>

    </section>

</main>

@endsection
