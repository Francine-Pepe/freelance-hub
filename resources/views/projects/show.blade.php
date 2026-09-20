@extends('layouts.app')
@section('title', $project->name)
@section('content')

<section class="project-show">

    <header class="project-show__header">
        <div>
            <h1>{{ $project->name }}</h1>

            @if ($project->client)
                <p>
                    Client:
                    <a href="/clients/{{ $project->client->id }}">
                        {{ $project->client->name }}
                    </a>
                </p>
            @endif
        </div>

        <a
            href="/projects/{{ $project->id }}/edit"
            class="project-show__edit"
        >
            Edit project
        </a>
    </header>

    <section class="project-show__details">

        @if ($project->description)
            <div class="project-show__detail project-show__detail--description">
                <span>Description</span>
                <p>{{ $project->description }}</p>
            </div>
        @endif

        @if ($project->budget)
            <div class="project-show__detail">
                <span>Budget</span>
                <p>
                    €{{ number_format($project->budget, 2, ',', '.') }}
                </p>
            </div>
        @endif

        <div class="project-show__detail">
            <span>Status</span>
            <p>
                {{ $project->status->label() }}
            </p>
        </div>

    </section>

    <section class="project-show__actions">

        <form method="POST" action="/projects/{{ $project->id }}">
            @csrf
            @method('DELETE')

            <button type="submit" class="delete-button">
                Delete project
            </button>
        </form>

    </section>

    <a href="/projects" class="project-show__back">
        ← Back to projects
    </a>

</section>
@endsection
