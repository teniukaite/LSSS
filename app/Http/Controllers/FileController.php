<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        $files = File::All();
        return view('files.index',['allFiles'=>$files]);
    }

    public function show($id)
    {
        //
    }
}
