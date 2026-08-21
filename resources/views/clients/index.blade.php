@extends('layouts.app')

@section('title', 'Clients')

@section('content')

    <h1>Clients</h1>
    <a href="/clients/create">Add Client</a>

    @foreach ($clients as $client)
        <article>
            <h2> {{ $client->name }} </h2>

            @if ($client->company)
                <p>{{ $client->company }}</p>
            @endif

            @if ($client->email)
                <p>{{ $client->email }}</p>
            @endif

            @if ($client->phone)
                <p>{{ $client->phone }}</p>
            @endif

            <a href="/clients/{{ $client->id }}/edit">Edit</a>
            <a href="/clients/{{ $client->id }}">View Client</a>

            <form method="POST" action="/clients/{{ $client->id }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </article>

    @endforeach

@endsection


{{-- @foreach in blade is the same as clients.map in javascript --}}
