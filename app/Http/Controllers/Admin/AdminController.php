<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $users = User::all();
        $count = count($users);

        return view('admin.index',[
            'count' => $count
        ]);
    }

    public function showUsers()
    {
        return view('admin.users.index', [
            'users' => User::all(),
        ]);
    }

    public function showOneUser($id)
    {
        return view ('admin.users.oneUser', [
            'user' => User::findOrFail($id),
            ]);
    }

    public function statistics ()
    {
        return view('admin.statistics.index');
    }
    public function bonus(Request $request)
    {
        $user = User::find($request->get('id'));
        $user->points = $user->points + $request->get('id');
        $user->save();

        return view('admin.users.oneUser');
    }
}
