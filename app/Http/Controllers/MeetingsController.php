<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meeting;
use App\user;

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

        $adminUser = $this->user;

        $adminUser->name       = $request->name;
        $adminUser->meeting_id = $this->meeting->id;
        $adminUser->admin      = 1;
        $adminUser->save();

        /// NOTE:URLは変更していない
        return view('waiting', ['newMeeting' => $newMeeting, 'adminUser' => $adminUser]);
    }

    public function start($id)
    {
        $meeting = $this->meeting->find($id);
        $meeting->update(['started_at' => now()]);

        return view('welcome');
    }
}
