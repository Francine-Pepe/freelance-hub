@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <section class="dashboard-page-container">

        <section class="dashboard">
            <header class="dashboard__header">
                <h1>Dashboard</h1>
                <p>Welcome back, {{ Auth::user()->name }}.</p>
            </header>

            <div class="dashboard__content">
                <div class="dashboard__card">
                    <h2>Welcome to Freelance Hub</h2>
                    <p>
                        Manage your clients and projects in one place.
                    </p>
                </div>
            </div>

            <div class="dashboard__stats">
                <div class="dashboard__card">
                    <span class="dashboard__card-label">
                        Clients
                    </span>
                    <strong class="dashboard__card-value">
                        {{ $clientCount }}
                    </strong>
                </div>

                <div class="dashboard__card">
                    <span class="dashboard__card-label">
                        Projects
                    </span>
                    <strong class="dashboard__card-value">
                        {{ $projectCount }}
                    </strong>
                </div>
            </div>

            <section class="dashboard__statuses">
                <h2>Project Statuses</h2>

                <div class="dashboard__status-grid">
                    <div class="dashboard__status">
                        <span>Planning</span>
                        <strong>{{ $statusCounts['planning'] }}</strong>
                    </div>

                    <div class="dashboard__status">
                        <span>In Progress</span>
                        <strong>{{ $statusCounts['in_progress'] }}</strong>
                    </div>

                    <div class="dashboard__status">
                        <span>Completed</span>
                        <strong>{{ $statusCounts['completed'] }}</strong>
                    </div>

                    <div class="dashboard__status">
                        <span>Canceled</span>
                        <strong>{{ $statusCounts['cancelled'] }}</strong>
                    </div>
                </div>
            </section>

            <section class="dashboard__recent">
                <h2>Recent Projects</h2>

                @if ($recentProjects->isEmpty())
                    <p class="dashboard__empty">No projects yet</p>
                @else
                    <div class="dashboard__projects">
                        @foreach ($recentProjects as $project)
                            <div class="dashboard__project">
                                <div>
                                    <h3>{{ $project->name }}</h3>

                                    @if ($project->client)
                                        <span>{{ $project->client->name }}</span>
                                    @endif
                                </div>

                                <span class="dashboard__project-status">{{ str_replace('_', ' ', ucfirst($project->status->value)) }}
                                </span>
                            </div>
                        @endforeach

                    </div>
                @endif
            </section>
            <section class="little-reminders">
                <h2>TEST — Corkboard area</h2>
                <x-corkboard :reminders="$reminders" />
            </section>
        </section>
    </section>

@endsection
