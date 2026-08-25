@extends('layouts.app')
@section('title', 'Add Project')
@section('content')

    <h1>Add Project</h1>

    <form method="POST" action="/projects">
        @csrf
        <label>
            Project Name
            <input
                type="text"
                name="name"
            >
        </label>
        <br>
        <label>
            Client
            <select name="client_id">
                <option value="">
                    Select a client
                </option>

                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">
                        {{ $client->name }}
                    </option>
                @endforeach
            </select>
        </label>
        <br>
        <label>
            Description
            <textarea name="description"></textarea>
        </label>
        <br>
        <label>
            Budget
            <input
                type="number"
                name="budget"
                step="0.01"
            >
        </label>
        <br>
        <label>
            Status
            <select name="status">
                <option value="planning">Planning</option>
                <option value="in_progress">In progress</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </label>

        <button type="submit">Save Project</button>
    </form>

@endsection
