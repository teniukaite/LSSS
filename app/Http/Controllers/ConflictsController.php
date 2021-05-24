<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Conflicts;
use App\Models\User;

class ConflictsController extends Controller
{
    public function index()
    {
        $conflicts  = Conflicts::All();
        $users = User::All();
        return view('admin.conflicts.index', [
            'conflicts' => $conflicts,
            'users' => $users
        ]);
    }

    public function showOne($id)
    {
        $users = User::All();
        return view ('admin.conflicts.showInfo', [
            'conflict' => Conflicts::findOrFail($id),
            'users' => $users,
        ]);
    }

}
