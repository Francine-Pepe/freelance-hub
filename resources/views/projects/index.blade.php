@extends('layouts.app')
@section('title', 'Projects')
@section('content')

    <header class="page-header">
        <div>
            <h1>Projects</h1>
            <p>Manage your projects and track their progress.</p>
        </div>

        <a href="/projects/create" class="button">Add Projects</a>

    </header>

    <section class="item-list">
        @forelse ($projects as $project)

            <article class="item-card">
                <div class="item-card__main">
                    <h2>
                        <a href="/projects/{{ $project->id }}">{{ $project->name }}</a>
                    </h2>

                    <p>
                        {{ $project->client->name }}
                    </p>
                </div>

                <div class="item-card__meta">
                    @if ($project->budget)
                        <span>{{ number_format($project->budget, 2, ',', '.') }}</span>
                    @endif

                    <span class="status-badge status-badge--{{ $project->status->value }}">
                        {{ $project->status->label() }}
                    </span>
                </div>

                <p>
                    Client: {{ $project->client->name }}
                </p>

                @if ($project->description)
                    <p>{{ $project->description }}</p>
                @endif

                @if ($project->budget)
                    <p>Budget: {{ $project->budget }}</p>
                @endif

                <p>Status: {{ $project->status->label() }}</p>

                <a href="/projects/{{ $project->id }}/edit">
                    Edit
                </a>

                <a href="/projects/{{ $project->id }}">
                    View
                </a>

                <form method="POST" action="/projects/{{ $project->id }}">
                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        Delete
                    </button>
                </form>
            </article>

            @empty

            <div class="empty-state">
                <p>No projects yet.</p>
                <a href="/projects/create" class="button">
                    Add your first project
                </a>
            </div>

        @endforelse

    </section>
@endsection
