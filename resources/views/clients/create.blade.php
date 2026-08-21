@extends('layouts.app')

@section('title', 'Add Client')

@section('content')

    <h1>Add client</h1>

    <form method="POST" action="/clients">
        @csrf
        {{-- @csrf is Laravel’s security protection for forms. --}}
        <label>
            Name
            <input type="text" name="name">
        </label>
        <label>
            Email
            <input type="email" name="email">
        </label>
        <label>
            Company
            <input type="text" name="company">
        </label>
        <label>
            Phone
            <input type="text" name="phone">
        </label>

        <button type="submit">
            Save Client
        </button>
    </form>

@endsection

