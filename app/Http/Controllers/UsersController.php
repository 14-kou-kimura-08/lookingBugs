<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create($id)
    {
        return view('users.create', ['id' => $id]);
    }

    public function store(Request $request, $id)
    {
        $user = $this->user;

        $user->name       = $request->name;
        $user->meeting_id = $id;
        $user->admin      = 0;
        $user->save();

        Auth::loginUsingId($user->id);
        return redirect('/meeting/confirm');
    }

    public function confirm()
    {
        $user = $this->user->find(Auth::id());

        if ($user->admin === 1 && !$user->position_id) {
            $meeting   = $user->meeting;
            $users = $this->user->where('meeting_id', $user->meeting_id)->get();
            $position = [1,1,1,2,2,3];
            shuffle($position);
            $key = 0;
            foreach ($users as $member) {
                $member->position_id = $position[$key];
                $member->update();
                $key++;
            }
        }

        return view('users.confirm', ['user' => $user]);
    }

    public function start()
    {
        $loginUser = $this->user->find(Auth::id());
        $meeting_id  = $this->user->find(Auth::id())->meeting_id;
        $users = $this->user->where('meeting_id', $meeting_id)->get();
        return view('users.start', ['loginUser' => $loginUser, 'users' => $users]);
    }
}
