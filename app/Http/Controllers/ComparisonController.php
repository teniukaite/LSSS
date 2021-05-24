<?php

namespace App\Http\Controllers;

use App\Models\Comparison;
use App\Models\Offers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
//use App\Models\File;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Redirect;

class ComparisonController extends Controller
{

    public function index()
    {


        $comparisons = Comparison::where('clientId', Auth::user()->id)->get();

//        $offers = Offers::sortBy('price',$request->sort ?? 'ASC')->get();
        $offers =  Offers::All();
//        $offers=Offers::All()->sortByDesc(function ($inquiry) {
//            return sprintf('%s', $inquiry->price);
//        })->values();

        return view('comparison.index', compact('comparisons'),[
        'users' => User::All(),
        'offers'=>$offers]);
    }

//    public function include()
//    {
//
//
//    }
//
//    public function create($id)
//    {
//
//    }


    public function  store(Request $request)
    {
//        Request $request
//        $offerId = Offers::find('id');
//        $offerId = Offers::find($offer->id);
        Comparison::create([
            'clientId'=>Auth::user()->id,
            'offerId' =>$request['id'],
        ]);
        return redirect::back()->with('success', 'Paslauga sėkmingai įtraukta į palyginimą');
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
        public function destroy(Offers $offer)
        {
            Comparison::where('offerId', $offer->id)->delete();
//            $comparison->delete();
//            Comparison::where('offerId')>delete();
            return redirect::back()->with('success', 'Palyginimas ištrintas');
        }
}
