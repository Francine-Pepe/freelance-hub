@extends('layouts.app')

@section('title', 'Clients')

@section('content')

    <header class="page-header">
        <div>
            <h1>Clients</h1>
            <p>Manage your clients and their projects.</p>
        </div>

        <a href="/clients/create">Add Client</a>
    </header>

    <section class="item-list">

        @foreach ($clients as $client)
            <article class="item-card">

                <div class="item-card__main">
                    <h2>
                        <a href="/clients/{{ $client->id }}">
                            {{ $client->name }}
                        </a>
                    </h2>

                    @if ($client->company)
                        <p>{{ $client->company }}</p>
                    @endif

                    @if ($client->email)
                        <p>{{ $client->email }}</p>
                    @endif

                    @if ($client->phone)
                        <p>{{ $client->phone }}</p>
                    @endif

                </div>

                <div class="item-card__actions">
                    <a href="/clients/{{ $client->id }}/edit">Edit</a>
                    <a href="/clients/{{ $client->id }}">View Client</a>

                    <form method="POST" action="/clients/{{ $client->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
                </div>
            </article>
        @endforeach

    </section>
@endsection


{{-- @foreach in blade is the same as clients.map in javascript --}}
