<?php

namespace App\Http\Controllers;

use App\Models\Offers;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    public function create(Offers $offer)
    {
        if(Auth::check())
            return view('review.create', compact('offer'));
        else
            return redirect('/offers');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'review' => 'required',
            'rating' => 'required', 'digits_between:0,10',
        ]);

        Review::create([
            'fk_client_id' => Auth::user()->id,
            'fk_freelancer_id' => $request->get('freelancer_id'),
            'fk_offer_id' => $request->get('offer_id'),
            'text' => $request->input('review'),
            'rating' => $request->input('rating'),
            'user_id' => Auth::user()->id,
        ]);

        return redirect('offers/'.$request->input('offer_id'))->with("status", "Jūsų atsiliepimas sėkmingai paliktas šiai paslaugai.");
    }
    
}
