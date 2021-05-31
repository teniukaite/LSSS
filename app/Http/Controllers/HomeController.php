<?php

namespace App\Http\Controllers;

use App\Models\Competencies;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

use Illuminate\Filesystem\Filesystem;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function EditProfile()
    {
        $user = Auth::user();
        $freelancers = Competencies::all();
        return view('profile.edit', [
            'user'=>$user,
            'freelancers'=>$freelancers
        ]);

    }
    public function ViewProfile()
    {
        $user = Auth::user();
        $freelancers=Competencies::All();
        return view('profile.index', compact('user','freelancers'));

    }

    public function Edit(Request $request)
    {
        $fileModel = new User();
        if($request->hasFile('file')){
            $filename = $request->file->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            Auth()->user()->update(['photo'=>$filename]);
        }

        $user = User::find($request->get('id'));
        $user->name = $request->get('name');
        $user->surname = $request->get('surname');
        $user->email = $request->get('email');
        $user->phoneNumber = $request->get('phoneNumber');
        $user->save();

        $freelancer= Competencies::query()->where('freelancerID',$request->get('freelancerID'))->update(['education'=> $request->get('education'),
            'description'=> $request->get('description')]);


        return redirect()->back()->with("status", "Profilis atnaujintas sėkmingai!");

    }
    public function validateUser()
    {
        return request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'phoneNumber' => 'required',
        ]);
    }
    
    public function delete(Request $request) {

        $user = User::find($request->get('id'));
        $user->delete();
        return redirect('/home');
    }
    public function showChangePasswordForm(){
        return view('profile.change_password');
    }

    public function changePassword(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Dabartinis Jūsų slaptažodis nesutampa su pateiktu slaptažodžiu. Prašome suvesti teisingą slaptažodį.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error"," Naujas slaptažodis negali sutapti su dabartiniu Jūsų slaptažodiu. Prašome pasirinkti kitą slaptažodį.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Slaptažodis pakeistas sėkmingai!");
    }
    public function store(Request $request){
        $request-> validate([
            'image'=> 'required|mimes:jpg, png, jpeg|max:5048'
        ]);


        return redirect('/profile/index');

    }
}
