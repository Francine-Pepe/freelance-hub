<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index(){
        $clients = Client::all();

        return view('clients.index', [
            'clients' => $clients,
    ]);
    }

    public function create() {
        return view('clients.create');
    }

    public function store() {
        $validated = request()->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'company' => 'nullable',
            'phone' => 'nullable',
        ]);
        Client::create($validated);
        return redirect('/clients');
    }

    public function edit(Client $client) {
        return view('clients.edit', [
            'client' => $client,
        ]);
    }

    public function update(Client $client ) {
        $validated = request()->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'company' => 'nullable',
            'phone' => 'nullable',
        ]);
        $client->update($validated);
        return redirect('/clients');
    }

    public function destroy(Client $client) {
        $client->delete();

        return redirect('/clients');
    }

    public function show(Client $client) {
        return view('clients.show', [
            'client' => $client
        ]);
    }
}

