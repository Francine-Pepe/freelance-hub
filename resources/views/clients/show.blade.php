@extends('layouts.app')

@section('title', $client->name)

@section('content')

    <section class="client-show">

    <header class="client-show__header">
        <div>
            <h1>{{ $client->name }}</h1>

            @if ($client->company)
                <p>{{ $client->company }}</p>
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
                <p>{{ $client->email }}</p>
            </div>
        @endif

        @if ($client->phone)
            <div class="client-show__detail">
                <span>Phone</span>
                <p>{{ $client->phone }}</p>
            </div>
        @endif

    </section>

    <section class="client-show__projects">

        <header>
            <h2>Projects</h2>
        </header>

        @forelse ($client->projects as $project)

            <article class="client-show__project">

                <div>
                    <h3>
                        <a href="/projects/{{ $project->id }}">
                            {{ $project->name }}
                        </a>
                    </h3>

                    @if ($project->budget)
                        <p>
                            Budget:
                            €{{ number_format($project->budget, 2, ',', '.') }}
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
        ← Back to clients
    </a>

</section>
@endsection
