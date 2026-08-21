<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $client->name }}</title>
</head>
<body>
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
</body>
</html>
