<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Client;

class ClientController extends Controller
{
    public function index(){
        $clients = Client::where('user_id', Auth::id())->get();

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

        $client = new Client($validated);
        $client->user_id = Auth::id();
        $client->save();

        return redirect('/clients');

        /* Client::create($validated);
        return redirect('/clients'); */
    }

    public function edit(Client $client)
    {
        abort_unless($client->user_id === Auth::id(), 403);
        return view('clients.edit', [
        'client' => $client,
        ]);
    }

    public function update(Client $client ) {

        abort_unless($client->user_id === Auth::id(), 403);
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

        abort_unless($client->user_id === Auth::id(), 403);
        $client->delete();

        return redirect('/clients');
    }

    public function show(Client $client) {

        abort_unless($client->user_id === Auth::id(), 403);
        $client->load('projects');
        return view('clients.show', [
            'client' => $client,
        ]);
    }
}

