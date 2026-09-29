@extends('layouts.app')
@section('title', 'Projects')
@section('content')

    <main class="main-content-with-bg">
        <header class="page-header">
            <div class="page-header__projects">
                <h1>Projects</h1>
                <p>Manage your projects and track their progress.</p>
            </div>

            <a href="/projects/create" class="button" id="add-button">
                Add project
            </a>
        </header>

        <section class="item-list">

            @forelse ($projects as $project)
                <article class="item-card">
                    <div class="item-card__main">
                        <h2>
                            <x-css-work-alt class="icon" />
                            <a href="/projects/{{ $project->id }}">
                                {{ $project->name }}
                            </a>
                            <span class="status-badge status-badge--{{ $project->status->value }}">
                                {{ $project->status->label() }}
                            </span>
                        </h2>

                        @if ($project->client)
                            <p>
                                <x-css-profile class="icon" />
                                {{ $project->client->name }}
                            </p>
                        @endif

                        <div class="item-card__meta">
                            @if ($project->budget)
                                <span>
                                    <x-css-euro class="icon"  />
                                    {{ number_format($project->budget, 2, ',', '.') }}
                                </span>
                            @endif



                        </div>

                    </div>



                    <div class="item-card__actions">
                        <a href="/projects/{{ $project->id }}/edit" class="edit-button">
                            Edit
                        </a>

                        <a href="/projects/{{ $project->id }}" class="view-client-button">
                            View Project
                        </a>

                        <form method="POST" action="/projects/{{ $project->id }}">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="delete-button">
                                Delete
                            </button>
                        </form>

                    </div>
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
        {{-- <section class="main-content-with-bg__bg-image">
            <x-background-image image="images/project-bg.jpg" />
        </section> --}}
    </main>

@endsection
