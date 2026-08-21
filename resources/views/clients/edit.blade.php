<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Client - Freelance Hub</title>
</head>
<body>
    <h1>Edit Client</h1>

    <form method="POST" action="/clients/{{ $client->id }}">
        @csrf
        @method('PUT')

        <label>
            Name
            <input type="text" name="name" value="{{ $client->name }}" >
        </label>

        <br>

        <label>
            Email
            <input type="email" name="email" value="{{ $client->email }}" >
        </label>

        <br>

        <label>
            Company
            <input type="text" name="company" value="{{ $client->company }}" >
        </label>

        <br>

        <label>
            Phone
            <input type="text" name="phone" value="{{ $client->phone }}" >
        </label>

        <br>

        <button type="submit">Update Client</button>

    </form>

</body>
</html>
