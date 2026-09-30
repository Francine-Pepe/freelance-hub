@extends('layouts.app')

@section('title', 'Clients')

@section('content')

    <main class="main-content-with-bg">

        <header class="page-header">
            <div class="clients-header">
                <h1>Clients</h1>
                <p>Manage your clients and their projects.</p>
            </div>

            <a href="/clients/create" class="button" id="add-button">Add Client</a>
        </header>

            <section class="item-list">

                @foreach ($clients as $client)
                    <article class="item-card">
                        <div class="item-card__main">
                            <h2>
                                <x-css-profile class="icon" />
                                <a href="/clients/{{ $client->id }}" >
                                    {{ $client->name }}
                                </a>
                            </h2>

                            @if ($client->company)
                            <div class="item-card__main__client-details">
                                <x-mdi-home-silo-outline class="icon" />
                                <p>{{ $client->company }}</p>
                            </div>

                            @endif

                            @if ($client->email)
                            <div class="item-card__main__client-details">
                                <x-eva-email-outline class="icon" />
                                <p>{{ $client->email }}</p>
                            </div>

                            @endif

                            @if ($client->phone)
                            <div class="item-card__main__client-details">
                                <x-eva-phone-outline class="icon" />
                                <p>{{ $client->phone }}</p>
                            </div>

                            @endif

                        </div>

                        <div class="item-card__actions">
                            <a href="/clients/{{ $client->id }}/edit" class="edit-button">Edit</a>
                            <a href="/clients/{{ $client->id }}" class="view-client-button">View Client</a>

                            <form method="POST" action="/clients/{{ $client->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button">Delete</button>
                            </form>
                        </div>
                    </article>
                @endforeach
            </section>
            <section class="main-content-with-bg__bg-image">
                <x-background-image image="images/square-bg.jpg" />
            </section>
    </main>
@endsection


{{-- @foreach in blade is the same as clients.map in javascript --}}
