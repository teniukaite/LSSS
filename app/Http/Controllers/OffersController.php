<?php

namespace App\Http\Controllers;
use App\Models\File;
use App\Models\Offers;
use App\Models\Categories;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use Carbon\Carbon;



class OffersController extends Controller
{

    public function index(Request $request)
    {
//        $categoryID = [];
        $offers = Offers::paginate(9);



        return view('Users.viewoffers',['allOffers'=>$offers,
                                             'categories' => Categories::All(),
                                            'users' => User::All()]);
    }

//    public function filter($category){
//
////        $images = Image::where('category_id', '=', $category);
//        $offers = Offers::paginate(9);
//        $categories = Categories::all();
//
//    return View ('Users.filter', array('categories' => $categories),['allOffers'=>$offers]);
//
//}
    public function uploadCompetencies()
    {
        $data= Categories::all();
        return view('freelancer.createoffers',['competencies'=> $data]);
    }
    public function show(Offers $offer)
    {
//        $offer = Offers::where('freelancerId', Auth::user()->id)->get();

        return view('Users.offershow', compact('offer'),[
            'categories' => Categories::All(),
            'users' => User::All(),
            'times'=>Schedule::All()->where('date','>',Carbon::now()->format('Y-m-d'))->sortBy(function ($inquiry) {
                return sprintf('%s%s', $inquiry->date, $inquiry->time);
            })->values(),
            'allFiles'=>File::All()]);

        return view('freelancer.offershow', compact('offer'));
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

//failų įkėlimui
    public function createForm(){
        return view('/freelancer/offer_photo_upload');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'file' => 'required|mimes:png,jpg|max:2048',
            'service_name' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'city' => ['required', 'string', 'max:15'],
        ]);

        $fileModel = new Offers();

        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storePubliclyAs('photosoffers', $fileName, 'public');

            $fileModel->file_name = time() . '_' . $request->file->getClientOriginalName();
            $fileModel->file_path = '/' . $filePath;

            $freelancerId = Auth::user()->id;
        Offers::create([
                'service_name'=>$request->get('service_name'),
                'description'=>$request->get('description'),
                'price'=>$request->get('price'),
                'price_content'=>$request->get('price_content'),
                'duration'=>$request->get('duration'),
                'city'=>$request->get('city'),
                'freelancerId'=> $freelancerId,
                'category'=>$request->get('category'),
                'file_name'=>time() . '_' . $request->file->getClientOriginalName(),
                'file_path'=> '/' . $filePath
            ]);
        }

        return redirect ('/offers');
    }

    public function create()
    {
        return view ('freelancer.createoffers');
    }
//    protected function validator(array $data)
//    {
//        return Validator::make($data, [
//            'service_name' => ['required', 'string', 'max:255'],
//            'description' => ['required', 'string', 'between:30,600'],
//            'price' => ['required', 'double', 'max:255'],
//            'registration_times' => ['required','date_format:Y-m-d H:i:s'],
//            'freelancerId' => ['required'],
//
//        ]);
//    }



    public function update(Request $request,Offers $offer)
    {
//        $attributes = $this->validateOffer();
//
//        $offer->update($attributes);
//        $offer = Offers::find($request->get('id'));
//        $offer->service_name = $request->get('service_name');
//        $offer->description = $request->get('description');
//        $offer->price = $request->get('price');
//        $offer->category = $request->get('category');
//        $offer->city = $request->get('city');
//        $offer->update();
        $attributes = $this->validateOffer();

        $offer->update($attributes);
        return redirect('/freelancer/offers')->with("status", "Paslaugos pasiūlymas atnaujintas sėkmingai!");
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
    public function search(Request $request){
        $search_text=$_GET['query'];
        $offers=Offers::where('service_name','Like','%'.$search_text.'%')
//        ->orWhere('category', 'LIKE', '%' . $search_text . '%')
        ->orWhere('city', 'LIKE', '%' . $search_text . '%')->get();


        return view('Users.search',compact('offers'));
    }
    public function filter(Request $request)
    {

        request()->validate([
            'priceFrom' => ['required','numeric','min:0'],
            'priceTo' => ['required','numeric','min:0'],
        ]);

        $priceFrom = $request->get('priceFrom');
        $priceTo = $request->get('priceTo');

        if ($priceFrom > $priceTo)
            return redirect('/offers')->with("statusDanger", "\"KAINA NUO\", turi būti mažesnė už \"KAINA IKI\".");

        $offers = Offers::where('price','>', $priceFrom)->where('price','<', $priceTo)->get();
        return view('Users.filter', compact('offers','priceFrom','priceTo'));
    }
}

