@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

    <h1>Freelance Hub</h1>
    <section class="stats-grid">
        <article class="stat-card">
            <span class="stat-card__label">Clients</span>
            <strong class="stat-card__value">{{ $clientCount }}</strong>
            <a href="/clients">
                View Clients
            </a>
        </article>


        <article class="stat-card">
            <span class="stat-card__label">Projects</span>
            <strong class="stat-card__value">{{ $projectCount }}</strong>
            <a href="/projects">View Projects</a>
        </article>
    </section>

    <section class="dashboard-section">
        <div class="section-heading">
            <h2>Recent Projects</h2>
            <a href="/projects">View all</a>
        </div>

    <div class="project-list">

        @forelse ($recentProjects as $project)

        <article class="project-card">
            <div class="project-card__main">
                <h3>
                    <a href="/projects/{{ $project->id }}">{{ $project->name }}</a>
                </h3>
                <p>
                    Client: {{ $project->client->name }}
                </p>
            </div>

            <div class="project-card__meta">
                @if ($project->budget)
                    <p>
                        Budget:
                        €{{ number_format($project->budget, 2, ',', '.') }}
                    </p>
                @endif

                <span class="status-badge">
                    {{ $project->status->label() }}
                </span>
            </div>
        </article>

        @empty
        <p>No projects yet.</p>
        @endforelse
    </div>
    </section>

    <section>
        <h2>Project Status</h2>
        <ul>
            @foreach (($statusCounts ?? []) as $status => $count)
                <li>
                    {{ $status }} {{ $count }}
                </li>
            @endforeach
        </ul>
    </section>

@endsection
