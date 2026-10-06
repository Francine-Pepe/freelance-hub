@extends('layouts.app')

@section('title', $client->name)

@section('content')

    <section class="client-show">

        <header class="client-show__header">
            <div>
                <div class="item-card__main__client-details">
                    <x-css-profile class="icon" />
                    <h1>{{ $client->name }}</h1>
                </div>


                @if ($client->company)
                <div class="item-card__main__client-details">
                    <x-mdi-home-silo-outline class="icon" />
                    <p>{{ $client->company }}</p>
                </div>
                @endif
            </div>

            <a href="/clients/{{ $client->id }}/edit" class="client-show__edit">
                Edit client
            </a>
        </header>

        <section class="client-show__details">

            @if ($client->email)
                <div class="client-show__detail">
                    <span>Email</span>
                    <p>
                        <a href="mailto:{{ $client->email }}">
                            {{ $client->email }}
                        </a>
                    </p>
                </div>
            @endif

            @if ($client->phone)
                <div class="client-show__detail">
                    <span>Phone</span>
                    <p>{{ $client->phone }}</p>
                </div>
            @endif

            @if ($client->company)
                <div class="client-show__detail">
                    <span>Company</span>
                    <p>{{ $client->company }}</p>
                </div>
            @endif

        </section>

        <section class="client-show__projects">

            <header>
                <h2>Projects</h2>
            </header>

            @forelse ($client->projects as $project)

                <article class="client-show__project">
                    <div class="client-show__show-project">
                        <h3>
                            <a href="/projects/{{ $project->id }}">
                                <x-css-work-alt class="icon" />
                                {{ $project->name }}
                            </a>
                        </h3>

                        @if ($project->budget)
                            <p>
                                <x-css-euro class="icon" />
                                {{ number_format($project->budget, 2, ',', '.') }}
                            </p>
                        @endif

                    </div>

                    <span class="client-show__status">
                        {{ $project->status->label() }}
                    </span>

                </article>

            @empty

                <p class="client-show__empty">
                    This client has no projects yet.
                </p>

            @endforelse

        </section>

        <a href="/clients" class="client-show__back">
            <x-css-arrow-left-o class="icon" />
            Back to clients
        </a>

    </section>
@endsection
