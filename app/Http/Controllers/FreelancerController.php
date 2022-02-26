<?php


namespace App\Http\Controllers;
use App\Models\Offers;
use App\Models\Order;
use App\Models\Review;
use App\Models\Schedule;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Competencies;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\File;



class FreelancerController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $offers = Offers::where('freelancerId', Auth::user()->id)->get();
        return view('freelancer.offers',['allOffers'=>$offers,
        'categories' => Categories::All()]);
    }
    public function allFreelancers()
    {
        $freelancers = User::where('type','=','1')->paginate(6);
        $competencies = Competencies::All();
        return view('freelancer.freelancerslist',['allFreelancers'=>$freelancers,
            'allCompetencies'=>$competencies]);
    }
    public function show(User $freelancer)
    {
        $competencies = Competencies::All();
        $allReviews = Review::all();
        $offers=Offers::All();
        foreach ($allReviews as $review) {
            $rating = \App\Models\Review::all()->where('fk_freelancer_id',$freelancer->id);
        }
        $rating=$rating->avg('rating');


        return view('freelancer.freelancerInfoView', compact('freelancer', 'offers', 'allReviews'),[
            'categories' => Categories::All(),
            'users' => User::All(),
            'rating'=>$rating,
            'allCompetencies'=>$competencies,
            'times'=>Schedule::All()->where('date','>',Carbon::now()->format('Y-m-d'))->sortBy(function ($inquiry) {
                return sprintf('%s%s', $inquiry->date, $inquiry->time);
            })->values(),
            ]);
    }

    public function becomequestion()
    {
        return view('freelancer.question');
    }
    public function uploadCompetencies()
    {
        $data= Categories::all();

        return view('freelancer.getcompetencies',['competencies'=> $data]);
    }
    public function create()
    {
        return view ('profile.index');
    }
    public function store(Request $request)
    {
       $freelancerID = Auth::user()->id;
        Competencies::create([
            'freelancerID'=> $freelancerID,
            'education'=>$request->get('education'),
            'categories'=>$request->get('categories'),
            'description'=>$request->get('description'),

        ]);


        return redirect ('/upload-file');
    }
    //failų įkėlimui
    public function createForm(){
        return view('/freelancer/file-upload');
    }

    public function fileUpload(Request $req)
    {
        $req->validate([
            'file' => 'required|mimes:png,jpg,jng|max:2048'
        ]);
        //file system configuration symb nuoroda
        $fileModel = new File;

        if ($req->file()) {
            $fileName = time() . '_' . $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storePubliclyAs('upload', $fileName, 'public');

            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/' . $filePath;
            $fileModel->freelancerID = Auth::user()->id;
            $fileModel->save();

            $freelancerID = Auth::user()->id;
            User::findOrNew($freelancerID)->update(['type' => "1"]);

            return redirect('/files/index')->with('success',  'Darbo pavyzdys įkeltas sėkmingai. Galite įkelti daugiau savo darbų pavyzdžių!');
        }
    }
    public function freelancerorders()
    {
        $freelancerorders = Order::where('fk_freelancer_id', Auth::user()->id)->get();

        return view('freelancer.orders', compact('freelancerorders'),[
            'offers' => Offers::All(),
            'users' => User::All(),
            'orderDates' => Schedule::All()->where('date','>',Carbon::now()->format('Y-m-d'))->sortBy(function ($inquiry) {
                return sprintf('%s%s', $inquiry->date, $inquiry->time);
            })->values()]);
    }


    public function update(Request $request)
    {
        $request = User::find($request->get('id'));
        $request->type = 1;

        return redirect('dashboard/reservations')->with('success', 'Successfully updated your reservation!');
    }


}
