@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

    <h1>Freelance Hub</h1>
    <section>
        <div>
            <h2>Clients</h2>
            <p>{{ $clientCount }}</p>
            <a href="/clients">
                View Clients
            </a>
        </div>

        <div>
            <h2>Projects</h2>
            <p>{{ $projectCount }}</p>
            <a href="/projects">View Projects</a>
        </div>
    </section>

    <section>
        <h2>Recent Projects</h2>

        @forelse ($recentProjects as $project)

        <article>
            <h3>
                <a href="/projects/{{ $project->id }}">{{ $project->name }}</a>
            </h3>
            <p>
                Client: {{ $project->client->name }}
            </p>

            @if ($project->budget)
                <p>
                    Burget:
                    €{{ number_format($project->burdget, 2, ',', '.') }}
                </p>
            @endif
        </article>

    @empty
        <p>No projects yet.</p>
    @endforelse
    </section>

    <section>
        <h2>Project Status</h2>
        <ul>
            @foreach ($statusCounts as $status => $count)
                <li>
                    {{ $status }} {{ $count }}
                </li>
            @endforeach
        </ul>
    </section>

@endsection
