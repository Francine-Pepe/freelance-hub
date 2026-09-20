@extends('layouts.app')
@section('title', 'Edit Project')
@section('content')

<section class="project-form">

    <header class="project-form__header">
        <h1>Edit project</h1>
        <p>Update the information for this project.</p>
    </header>

    <form
        method="POST"
        action="/projects/{{ $project->id }}"
        class="project-form__form"
    >
        @csrf
        @method('PUT')

        <div class="project-form__field">
            <label for="name">Project name</label>

            <input
                type="text"
                id="name"
                name="name"
                value="{{ $project->name }}"
                required
            >
        </div>

        <div class="project-form__field">
            <label for="client_id">Client</label>

            <select id="client_id" name="client_id" required>

                @foreach ($clients as $client)
                    <option
                        value="{{ $client->id }}"
                        @selected($client->id === $project->client_id)
                    >
                        {{ $client->name }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="project-form__field">
            <label for="description">Description</label>

            <textarea
                id="description"
                name="description"
                rows="5"
            >{{ $project->description }}</textarea>
        </div>

        <div class="project-form__field">
            <label for="budget">Budget</label>

            <input
                type="number"
                id="budget"
                name="budget"
                value="{{ $project->budget }}"
                step="0.01"
                min="0"
            >
        </div>

        <div class="project-form__field">
            <label for="status">Status</label>

            <select id="status" name="status">

                <option
                    value="planning"
                    @selected($project->status->value === 'planning')
                >
                    Planning
                </option>

                <option
                    value="in_progress"
                    @selected($project->status->value === 'in_progress')
                >
                    In progress
                </option>

                <option
                    value="completed"
                    @selected($project->status->value === 'completed')
                >
                    Completed
                </option>

                <option
                    value="cancelled"
                    @selected($project->status->value === 'cancelled')
                >
                    Cancelled
                </option>

            </select>
        </div>

        <div class="project-form__actions">

            <a href="/projects/{{ $project->id }}">
                Cancel
            </a>

            <button type="submit">
                Update project
            </button>

        </div>

    </form>

</section>
@endsection
