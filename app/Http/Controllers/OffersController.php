<?php

namespace App\Http\Controllers;
use App\Models\Offers;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;


class OffersController extends Controller
{

    public function index()
    {
//        $categoryID = [];

        $offers = Offers::All();
       // dd(Categories::All());


        return view('Users.viewoffers',['allOffers'=>$offers,
                                             'categories' => Categories::All()]);
    }


    public function uploadCompetencies()
    {
        $data= Categories::all();
        return view('freelancer.createoffers',['competencies'=> $data]);
    }
    public function show(Offers $offer)
    {
//        $categoryID = Offers::category()->id;
//        Categories::find($categoryID);
        $offers = Offers::where('freelancerId', Auth::user()->id)->get();
        return view('freelancer.offershow', compact('offer'),[
            'categories' => Categories::All()]);

//        return view('freelancer.offershow', compact('offer'));
    }
    public function edit(Offers $offer)
    {
//        if(!Auth::user()->is_admin)
//            return back();
//
//        else
            return view('freelancer.editoffer', compact('offer'),[
                'categories' => Categories::All()]);
    }



    public function store(Request $request)
    {
        $freelancerId = Auth::user()->id;
        Offers::create([
                'service_name'=>$request->get('service_name'),
                'description'=>$request->get('description'),
                'price'=>$request->get('price'),
                'registration_times'=>$request->get('registration_times'),
                'city'=>$request->get('city'),
                'freelancerId'=> $freelancerId,
                'category'=>$request->get('category'),
            ]);

        return redirect ('/offers');
    }
    public function create()
    {
        return view ('freelancer.createoffers');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'service_name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'between:30,600'],
            'price' => ['required', 'double', 'max:255'],
            'registration_times' => ['required','date_format:Y-m-d H:i:s'],
            'freelancerId' => ['required', 'double', 'min:8'],

        ]);
    }



    public function update(Offers $offer)
    {
        $attributes = $this->validateOffer();

        $offer->update($attributes);

        return redirect('/offers')->with("status", "Paslaugos pasiūlymas atnaujintas sėkmingai!");
    }
    public function validateOffer()
    {
        return request()->validate([
            'service_name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'description' => 'required',
            'city' => 'required',
        ]);
    }

    public function destroy(Offers $offer)
    {
            $offer->delete();

        return redirect('/offers')->with("status", "Paslaugos pasiūlymas ištrintas sėkmingai!");
    }

}
