<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\File;
use App\Models\Offers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    public function index()
    {
        $files = File::where('freelancerID', Auth::user()->id)->get();
        return view('files.index',['allFiles'=>$files]);
    }

    public function show($id)
    {
        //
    }
}
