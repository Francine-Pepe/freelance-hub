<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
        return view('projects.guest');
        }
        
        $projects = Project::with('client')
            ->whereHas('client', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->get();

        return view('projects.index', [
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::where('user_id', Auth::id())
            ->orderBy('name')
            ->get();

            /* Show me only the clients that belong to the person who is currently logged in. */

        return view('projects.create', [
            'clients' => $clients, //this is to populate the dropdown with clients when creating a new project, and it displays on Blade.
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $validated = request()->validate([
            'name' => 'required',
            'client_id' => 'required|exists:clients,id',
            'description' => 'nullable',
            'budget' => 'nullable|numeric',
            'status' => 'required|in:planning,in_progress,completed,cancelled',
        ]);

        /* ownership check: */

        $client = Client::where('id', $validated['client_id'])
            ->where('user_id', Auth::id())
            ->firstOrFail();

        /* then it creates the project using that verified client */

        $project = new Project($validated);
        $project->client_id = $client->id;
        $project->save();

        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        abort_unless($project->client->user_id === Auth::id(),
        403);

        return view('projects.show', [
            'project' => $project,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        abort_unless($project->client->user_id === Auth::id(),
        403);

        $clients = Client::where('user_id', Auth::id())
        ->orderBy('name')
        ->get();

        return view('projects.edit', [
            'project' => $project, // the existing project we’re editing
            'clients' => $clients, //    the list for our client dropdown
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Project $project)
    {
        abort_unless($project->client->user_id === Auth::id(),
        403);

        $validated = request()->validate([
            'name' => 'required',
            'client_id' => 'required|exists:clients,id',
            'description' => 'nullable',
            'budget' => 'nullable|numeric',
            'status' => 'required|in:planning,in_progress,completed,cancelled',
        ]);

        $client = Client::where('id', $validated['client_id'])
        ->where('user_id', Auth::id())
        ->firstOrFail();

        $project->update($validated);

        return redirect('/projects');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        abort_unless($project->client->user_id === Auth::id(),
        403);

        $project->delete();
        return redirect('/projects');

    }
}
