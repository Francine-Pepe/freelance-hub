@extends('layouts.app')
@section('title', 'Add Project')
@section('content')

<section class="project-form">

    <header class="project-form__header">
        <h1>Add project</h1>
        <p>Create a new project and assign it to a client.</p>
    </header>

    <form method="POST" action="/projects" class="project-form__form">
        @csrf

        <div class="project-form__field">
            <label for="name">Project name</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}" {{--  old() preserves entered values if validation fails --}}
                required
            >
        </div>

        <div class="project-form__field">
            <label for="client_id">Client</label>

            <select id="client_id" name="client_id" required>
                <option value="">Select a client</option>

                @foreach ($clients as $client)
                    <option
                        value="{{ $client->id }}"
                        @selected(old('client_id') == $client->id)
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
            >{{ old('description') }}</textarea>
        </div>

        <div class="project-form__field">
            <label for="budget">Budget</label>

            <input
                type="number"
                id="budget"
                name="budget"
                value="{{ old('budget') }}"
                step="0.01"
                min="0"
            >
        </div>

        <div class="project-form__field">
            <label for="status">Status</label>

            <select id="status" name="status">
                <option value="planning" @selected(old('status', 'planning') === 'planning')>
                    Planning
                </option>

                <option value="in_progress" @selected(old('status') === 'in_progress')>
                    In progress
                </option>

                <option value="completed" @selected(old('status') === 'completed')>
                    Completed
                </option>

                <option value="cancelled" @selected(old('status') === 'cancelled')>
                    Cancelled
                </option>
            </select>
        </div>

        <div class="project-form__actions">
            <a href="/projects">
                Cancel
            </a>

            <button type="submit">
                Save project
            </button>
        </div>

    </form>

</section>

@endsection
