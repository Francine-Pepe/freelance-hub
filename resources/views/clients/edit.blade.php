@extends('layouts.app')

@section('title', 'Edit Client')

@section('content')

    <section class="client-form">

    <header class="client-form__header">
        <h1>Edit client</h1>
        <p>Update the information for this client.</p>
    </header>

    <form method="POST" action="/clients/{{ $client->id }}" class="client-form__form">
        @csrf
        @method('PUT')

        <div class="client-form__field">
            <label for="name">Name</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ $client->name }}"
                required
            >
        </div>

        <div class="client-form__field">
            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ $client->email }}"
            >
        </div>

        <div class="client-form__field">
            <label for="company">Company</label>
            <input
                type="text"
                id="company"
                name="company"
                value="{{ $client->company }}"
            >
        </div>

        <div class="client-form__field">
            <label for="phone">Phone</label>
            <input
                type="text"
                id="phone"
                name="phone"
                value="{{ $client->phone }}"
            >
        </div>

        <div class="client-form__actions">
            <a href="/clients/{{ $client->id }}">
                Cancel
            </a>

            <button type="submit">
                Update client
            </button>
        </div>

    </form>

</section>

@endsection
