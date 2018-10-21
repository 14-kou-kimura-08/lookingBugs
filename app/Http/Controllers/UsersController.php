<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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

        /// NOTE: redirect先を変更する
        return redirect('/waiting');
    }
}
