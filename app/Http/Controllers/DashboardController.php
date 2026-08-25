<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index() {
        $clientCount = Client::count(); /* count: total clients */
        $projectCount = Project::count();
        $recentProjects = Project::with('client') /* with(): eager loading */
            ->latest() /* latest(): newest records */
            ->take(5) /* take(): limit results */
            ->get();

        /* the code below means:
            How many projects have status = planning?
            How many have status = in_progress?
            How many have status = completed?
            How many have status = cancelled?
        */

        /* $planningCount = Project::where('status', 'planning')->count();
        $inProgressCount = Project::where('status', 'in_progress')->count();
        $completedCount = Project::where('status', 'completed')->count();
        $cancelledCount = Project::where('status', 'cancelled')->count(); */

        /* The code below, is the refactored code from above */

        $statuses = [
            'planning',
            'in_progress',
            'completed',
            'cancelled'
        ];

        $statusCounts = [];
        foreach ($statuses as $status) {
            $statusCounts[$status] = Project::where('status', $status)->count();
        }

            /* This is a chain of Eloquent methods. */

        return view('dashboard', [
            'clientCount' => $clientCount,
            'projectCount' => $projectCount,
            'recentProjects' => $recentProjects,
            'statusCounts' => $statusCounts,
            /* 'planningCount' => $planningCount,
            'inProgressCount' => $inProgressCount,
            'completedCount' => $completedCount,
            'cancelledCount' => $cancelledCount, */
        ]);
    }
}
