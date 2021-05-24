<?php


namespace App\Http\Controllers;
use App\Models\Offers;
use App\Models\Order;
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
        $freelancers = User::All();
        $competencies = Competencies::All();
//        $freelancer= User::where('id','=','1');
//        return view('freelancer.freelancerslist',['allFreelancers'=>$freelancer]);
        return view('freelancer.freelancerslist',['allFreelancers'=>$freelancers,
            'allCompetencies'=>$competencies]);
    }
    public function showFreelancerProfile($id)
    {
        $freelancers = User::All();
        $competencies = Competencies::All();
        $offers = Offers::where('freelancerId', Auth::user()->id)->get();
        return view ('freelancer.freelancerInfoView', ['allFreelancers'=>$freelancers,
            'user' => User::find($id),
            'allCompetencies'=>$competencies,
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
//        $request->validate([
//            'file' => 'required|mimes:png,jpg,xlx,xls,pdf|max:2048'
//        ]);

        // then you can save $imageName to the database
//     nuotraukos ikelimas
//  This method also stores the file into storage/public/uploads
// folder and saves the file name and path in the database.
//        $request->validate([
//            'work_examples' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
//        ]);
//        $fileModel = new File;
//
//        if($request->file()) {
//            $fileName = time() . '_' . $request->file->getClientOriginalName();
//            $work_examples = $request->file('file')->storeAs('upload', $fileName, 'public');
//
//            $fileModel->name = time() . '_' . $request->file->getClientOriginalName();
//            $fileModel->work_examples = '/storage/' . $work_examples;
//            $fileModel->save();
//        }


       $freelancerID = Auth::user()->id;
        Competencies::create([
            'freelancerID'=> $freelancerID,
            // 'freelancerID' => Auth::user()->id, veikia ir taip
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

            return redirect('/profile')->with('success',  'Darbas įkeltas sėkmingai. Galite įkelti daugiau savo darbų pavyzdžių!');
//            return back()
//                ->with('success', 'Darbas įkeltas sėkmingai. Galite įkelti daugiau savo darbų pavyzdžių!')
//                ->with('file', $fileName);
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



//        $req->validate([
//            'file' => 'required|mimes:png,jpg,xlx,xls,pdf|max:2048'
//        ]);
//
//        $fileModel = new File;
//
//        if ($req->file()) {
//            $fileName = time() . '_' . $req->file->getClientOriginalName();
//            $filePath = $req->file('file')->storeAs('upload', $fileName, 'public');
//
//            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
//            $fileModel->file_path = '/storage/' . $filePath;
//            $fileModel->freelancerID = Auth::user()->id;
//            $fileModel->save();
//
//            $freelancerID = Auth::user()->id;
//            User::findOrNew($freelancerID)->update(['type' => "1"]);
//
//            return redirect('/profile')->with('success', 'Successfully updated your reservation!');
////            return back()
////                ->with('success', 'Darbas įkeltas sėkmingai. Galite įkelti daugiau savo darbų pavyzdžių!')
////                ->with('file', $fileName);
//        }
//    }

        public function update(Request $request)
        {
            $request = User::find($request->get('id'));
            $request->type = 1;

            return redirect('dashboard/reservations')->with('success', 'Successfully updated your reservation!');
        }



//    public function create($id)
//    {
//        /* $order = DB::table('offers')->where(['id'=>$id])->get();
//          return view('orders.create', ['orders' => $order]); */
//
//        $competencies  = User::find($id);
//
//        return view('profile.index', compact('competencies'));
//    }
//    public function store(Request $request)
//    {
////        Competencies::create([
////        'education'=>$request->get('education'),
////        'categories'=>$request->get('categories'),
////        'freelancerID' => Auth::user()->id,
////    ]);
//
////        Competencies::create($competencies);
//        $competencies = [
//            'education' => $request['education'],
//            'categories' => $request['categories'],
//            'freelancerID' => User::user()->id,
//        ];
//
//        Competencies::create($competencies);
//
//
//        return redirect ('/competencies');
//    }




//       $freelancer= new Freelancer();
//
//       if($request->hasfile('photo')){
//            $file=$request->file('photo');
//           // $extension=$file->getClientOriginalExetntion(); // gettin image extension
//            $extension = 'jpg';
//            $filename=time().'.' .$extension;
//            $file->move('/upload/freelancer/', $filename); //automatiškai sukuria aplankalą upload, public aplanke
//            $freelancer->photo=$filename;

//           $freelancer->Freelancer::find($id);
//           $freelancer->type=3;
//           $freelancer->save();

//
//        }else{
//           // dd('xd');
//            return $request;
//           $freelancer->photo='';
//
//        }
//
//     //   $this->middleware('freelancer');
//        return view('freelancer.registrationform')->with('freelancer', $freelancer);


        // Check if the form was submitted
//        if($_SERVER["REQUEST_METHOD"] == "POST"){
//            // Check if file was uploaded without errors
//            if(isset($_FILES["photo"]) ){
//                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
//                $filename = $_FILES["photo"]["name"];
//                $filetype = $_FILES["photo"]["type"];
//                $filesize = $_FILES["photo"]["size"];
//
//                // Verify file extension
//                $ext = pathinfo($filename, PATHINFO_EXTENSION);
//                if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
//
//                // Verify file size - 5MB maximum
//                $maxsize = 5 * 1024 * 1024;
//                if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
//
//                // Verify MYME type of the file
//                if(in_array($filetype, $allowed)){
//                    // Check whether file exists before uploading it
//                    if(file_exists("upload/" . $filename)){
//                        echo $filename . " is already exists.";
//                    } else{
//                        move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $filename);
//                        echo "Your file was uploaded successfully.";
//                    }
//                } else{
//                    echo "Error: There was a problem uploading your file. Please try again.";
//                }
//            } else{
//                echo "Error: " . $_FILES["photo"]["error"];
//            }
//        }
//    }
}
