<h1>Clients</h1>
<a href="/clients/create">Add Client</a>

@foreach ($clients as $client)
    <div>
        <h2> {{ $client->name }} </h2>
        <p> {{ $client->company }} </p>
        <p> {{ $client->email }} </p>

        <a href="/clients/{{ $client->id }}/edit">Edit</a>

        <form method="POST" action="/clients/{{ $client->id }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach

{{-- @foreach in blade is the same as clients.map in javascript --}}
