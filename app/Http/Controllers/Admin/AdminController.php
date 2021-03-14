<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
       // $this->middleware(['auth', 'admin']);
    }

    public function index(){

        return view('admin.index');
    }

//    public function verifyUser($id){
//        $user = User::find($id);
//        $user->type = 1;
//        $user->save();
//        return redirect()->back();
//    }
}
