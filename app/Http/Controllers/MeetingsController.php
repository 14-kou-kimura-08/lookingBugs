<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meeting;
use App\user;
use Illuminate\Support\Facades\Auth;

class MeetingsController extends Controller
{
    public function __construct(Meeting $meeting, User $user)
    {
        $this->meeting = $meeting;
        $this->user    = $user;
    }

    public function store(Request $request)
    {
        $newMeeting = $this->meeting;
        $newMeeting->save();

        $this->validate($request,[
            'name' => 'string|required'
        ]);

        $adminUser = $this->user;

        $adminUser->name       = $request->name;
        $adminUser->meeting_id = $this->meeting->id;
        $adminUser->admin      = 1;
        $adminUser->save();

        Auth::loginUsingId($adminUser->id);
        return redirect("/meeting");
    }

    public function wait()
    {
        $user      = $this->user->find(Auth::id());
        $meeting   = $user->meeting;

        return view('meeting', ['meeting' => $meeting, 'user' => $user]);
    }

    public function start($id)
    {
        $meeting = $this->meeting->find($id);
        $meeting->update(['started_at' => now()]);

        return view('meeting');
    }
}
