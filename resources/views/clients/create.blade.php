@extends('layouts.app')

@section('title', 'Add Client')

@section('content')

    <section class="client-form">
        <header class="client-form__header">
            <h1>Add Client</h1>
            <p>Create a new client for your freelance projects.</p>
        </header>

        <form method="POST" action="/clients" class="client-form__form">
            @csrf

            <div class="client-form__field">
                <label for="name">Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    required
                >
            </div>

            <div class="client-form__field">
                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                >
            </div>

            <div class="client-form__field">
                <label for="company">Company</label>
                <input
                    type="text"
                    id="company"
                    name="company"
                    value="{{ old('company') }}"
                >
            </div>

            <div class="client-form__field">
                <label for="phone">Phone</label>
                <input
                    type="text"
                    id="phone"
                    name="phone"
                    value="{{ old('phone') }}"
                >
            </div>

            <div class="client-form__actions">
                <a href="/clients">Cancel</a>

                <button type="submit">
                    Save client
                </button>
            </div>

        </form>

    </section>

@endsection
