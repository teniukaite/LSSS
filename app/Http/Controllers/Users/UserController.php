<?php

namespace App\Http\Controllers;
use App\Models\Competencies;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pagrindinis');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $competencies = new Competencies;
        $competencies->feelancerID = $request -> input('freelancerID');
        $competencies->education = $request -> input('education');
        $competencies->categories = $request -> input('categories');
        $competencies->description = $request -> input('description');
        $competencies->examples_of_work = $request -> input('examples_of_work');
        $competencies->save();
//        $competencies= Competencies::create([
//
//            'freelancerID' = $request -> input('freelancerID'),
//            'education' = $request -> input('education'),
//            'categories' = $request -> input('categories'),
//            'description' = $request -> input('description'),
//            'examples_of_work' = $request -> input('examples_of_work'),
//            ]);

        return  redirect('/pagrindinis');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
