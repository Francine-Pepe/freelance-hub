@extends('layouts.app')

@section('title', $client->name)

@section('content')

    <h1>{{ $client->name }}</h1>

    @if ($client->company)
        <p>Company: {{ $client->company }}</p>
    @endif

    @if ($client->email)
        <p>Email: {{ $client->email }}</p>
    @endif

    @if ($client->phone)
        <p>Phone: {{ $client->phone }}</p>
    @endif

    <a href="/clients">Back to clients</a>

@endsection
