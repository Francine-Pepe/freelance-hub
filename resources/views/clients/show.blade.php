@extends('layouts.app')

@section('title', $client->name)

@section('content')

    <h1>{{ $client->name }}</h1>

    @if ($client->company)
        <p>Company: {{ $client->company }}</p>
    @endif

    @if ($client->email)
        <p>Email: {{ $client->email }}</p>
    @endif

    @if ($client->phone)
        <p>Phone: {{ $client->phone }}</p>
    @endif

    <h2>Projects</h2>

    @forelse ($client->projects as $project) {{-- this line is using this: public function projects(): HasMany --}}

        <article>
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

            <p>
                Status: {{ $project->statusLabel() }}
            </p>
        </article>
    @empty

        <p>This client has no projects yet.</p>

    @endforelse

    <a href="/clients/{{ $client->id }}/edit">Edit Client</a>

    <a href="/clients">Back to clients</a>

@endsection
