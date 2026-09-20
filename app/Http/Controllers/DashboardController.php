<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use App\Models\Reminder;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $clientCount = Client::where('user_id', Auth::id())->count(); /* Only count clients belonging to the logged-in user */

        $projectCount = Project::whereHas('client', function ($query) {
            $query->where('user_id', Auth::id());
        })->count(); /* Only count projects belonging to the logged-in user's clients */

        $recentProjects = Project::with('client')
            ->whereHas('client', function ($query) {
                $query->where('user_id', Auth::id());
            }) /* Only show recent projects belonging to the logged-in user */
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
            $statusCounts[$status] = Project::where('status', $status)
                ->whereHas('client', function ($query) {
                    $query->where('user_id', Auth::id());
            })
            ->count();
        }

            /* This is a chain of Eloquent methods. */

        $reminders = Reminder::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('dashboard', [
            'clientCount' => $clientCount,
            'projectCount' => $projectCount,
            'recentProjects' => $recentProjects,
            'statusCounts' => $statusCounts,
            'reminders' => $reminders,
            /* 'planningCount' => $planningCount,
            'inProgressCount' => $inProgressCount,
            'completedCount' => $completedCount,
            'cancelledCount' => $cancelledCount, */
        ]);
    }
}
