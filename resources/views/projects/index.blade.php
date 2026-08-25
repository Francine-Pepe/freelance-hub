@extends('layouts.app')
@section('title', 'Projects')
@section('content')

    <h1>Projects</h1>

    <a href="/projects/create">Add Projects</a>

    @foreach ($projects as $project)

        <article>
            <h2>{{ $project->name }}</h2>

            <p>
                Client: {{ $project->client->name }}
            </p>

            @if ($project->description)
                <p>{{ $project->description }}</p>
            @endif

            @if ($project->budget)
                <p>Budget: {{ $project->budget }}</p>
            @endif

            <p>Status: {{ $project->statusLabel() }}</p>

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

    @endforeach
@endsection
