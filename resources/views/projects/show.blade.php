@extends('layouts.app')
@section('title', $project->name)
@section('content')

    <h1>{{ $project->name }}</h1>
    <p>
        <strong>Client:</strong>
        {{ $project->client->name }} {{-- is the relationship in action --}}
    </p>

    @if ($project->description)
        <p>
            <strong>Description:</strong>
            {{ $project->description }}
        </p>
    @endif

    @if ($project->budget)
        <p>
            <strong>Budget:</strong>
            €{{ number_format($project->budget, 2, ',', '.') }}
        </p>
    @endif

    <p>
        <strong>Status:</strong>
        {{ $project->status->label() }}
    </p>

    <a href="/projects/{{ $project->id }}/edit">
        Edit
    </a>


    <form method="POST" action="/projects/{{ $project->id }}">
        @csrf
        @method('DELETE')

        <button type="submit">
            Delete
        </button>
    </form>
    <br>
    <a href="/projects">
        <- Back to Projects
    </a>
@endsection
