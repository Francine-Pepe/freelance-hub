<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Client;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $projects = Project::with('client')->get(); //Get the projects, and also load their related clients.

            return view('projects.index', [
                'projects' => $projects
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::orderBy('name')->get();

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
            'status' => 'required|in:planning, in_progress, completed, cancelled',
        ]);

        Project::create($validated);
        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('projects.show', [
            'project' => $project,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $clients = Client::orderBy('name')->get();
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
        $validated = request()->validate([
            'name' => 'required',
            'client_id' => 'required|exists:clients,id',
            'description' => 'nullable',
            'budget' => 'nullable|numeric',
            'status' => 'required|in:planning,in_progress,completed,cancelled',
        ]);
        $project->update($validated);
        return redirect('/projects');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect('/projects');

    }
}
