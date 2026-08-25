@extends('layouts.app')
@section('title', 'Edit Project')
@section('content')

    <h1>Edit Project</h1>

    <form method="POST" action="/projects/{{ $project->id }}">
        @csrf
        @method('PUT')

        <label>
            Project Name
            <input
                type="text"
                name="name"
                value="{{ $project->name }}"
            >
        </label>
        <br>
        <label>
            Client
            <select name="client_id">
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" @selected($client->id === $project->client_id)>
                        {{ $client->name }}
                    </option>
                @endforeach

            </select>
        </label>
        <br>
        <label>
            Description
            <textarea name="description">
                {{ $project->description }}
            </textarea>
        </label>
        <br>
        <label>
            Budget
            <input
                type="number"
                name="budget"
                step="0.01"
                value="{{ $project->budget }}"
            >
        </label>
        <br>
        <label>
            Status
            <select name="status">
                <option
                    value="planning"
                    @selected($project->status === 'planning')>
                        Planning
                </option>

                <option
                    value="in_progress"
                    @selected($project->status === 'in_progress')>
                        In Progress
                </option>

                <option
                    value="completed"
                    @selected($project->status === 'completed')>
                        Completed
                </option>

                <option
                    value="cancelled"
                    @selected($project->status === 'cancelled')>
                        Cancelled
                </option>
            </select>
        </label>

        <button type="submit">
            Update Project
        </button>

    </form>
@endsection
