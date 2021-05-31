<?php

namespace App\Http\Controllers;
use App\Models\File;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    public function index()
    {
        $files = File::where('freelancerID', Auth::user()->id)->get();
        return view('files.index',['allFiles'=>$files]);
    }

    public function destroy(File $file)
    {
        File::where('id', $file->id)->delete();
        return redirect('/files/index')->with("success", "Darbo pavyzdys sėkmingai pašalintas");
    }
}
