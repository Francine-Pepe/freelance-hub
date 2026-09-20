<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use Illuminate\Support\Facades\Auth;

class ReminderController extends Controller
{
    public function store()
    {
        $validated = request()->validate([
            'content' => 'required|string|max:120',
        ]);

        Reminder::create([
            'content' => $validated['content'],
            'user_id' => Auth::id(),
        ]);

        return back();
    }

    public function destroy(Reminder $reminder)
    {
        abort_unless(
            $reminder->user_id === Auth::id(),
            403
        );

        $reminder->delete();

        return back();
    }
}
