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
        $this->meeting->save();

        $this->user->name = $request->name;
        $this->user->meeting_id = $this->meeting->id;
        $this->user->admin = 1;
        $this->user->save();
        /// NOTE: redirect先を変更する
        return redirect('/');
    }
}
