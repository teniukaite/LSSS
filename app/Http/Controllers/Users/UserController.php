<?php

namespace App\Http\Controllers;
use App\Models\Competencies;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return view('pagrindinis');
    }
    
    public function store(Request $request)
    {
        $competencies = new Competencies;
        $competencies->feelancerID = $request -> input('freelancerID');
        $competencies->education = $request -> input('education');
        $competencies->categories = $request -> input('categories');
        $competencies->description = $request -> input('description');
        $competencies->examples_of_work = $request -> input('examples_of_work');
        $competencies->save();


        return  redirect('/pagrindinis');
    }

}
