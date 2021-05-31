<?php

namespace App\Http\Controllers;

use App\Models\Comparison;
use App\Models\Offers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ComparisonController extends Controller
{

    public function index()
    {


        $comparisons = Comparison::where('clientId', Auth::user()->id)->get();
        $offers = Offers::all()->sortByDesc('price');
        $temp = Offers::query()->orderByDesc('price')->get();
        return view('comparison.index', compact('comparisons'),[
        'users' => User::All(),
        'offers'=>$temp]);
    }

    public function  store(Request $request)
    {
        $comparisons = Comparison::where('clientId', Auth::user()->id)->get();
        $id = [];

        foreach ($comparisons as $comparison) {
            if (!empty($comparison->offerId))
                array_push($id, $comparison->offerId);
        }
        if (in_array($request['id'], $id)) {
            return redirect::back()->with('danger', 'Paslauga  jau yra įtraukta į Jūsų palyginimų sąrašą');
        } else {
            Comparison::create([
                'clientId' => Auth::user()->id,
                'offerId' => $request['id'],
            ]);

            return redirect::back()->with('success', 'Paslauga sėkmingai įtraukta į palyginimą');
        }
    }

        public function destroy(Comparison $comparison)
        {
            Comparison::where('id', $comparison->id)->delete();
            return redirect::back()->with('success', 'Palyginimas ištrintas');
        }

}
