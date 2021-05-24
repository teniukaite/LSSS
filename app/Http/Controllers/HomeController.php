<?php

namespace App\Http\Controllers;

use App\Models\User;
//use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
//use App\Models\File;
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
        return view('profile.edit', [
            'user'=>$user
        ]);

    }

    public function Edit(Request $request)
    {
        $user = User::find($request->get('id'));
        $user->name = $request->get('name');
        $user->surname = $request->get('surname');
        $user->email = $request->get('email');
        $user->phoneNumber = $request->get('phoneNumber');
//        $user->photo = $request->get('photo');
        $user->save();
//        $attributes = $this->validateUser();
//
//        $user->update($attributes);
//        return redirect()->back()->with("status", "Profilis atnaujintas sėkmingai!");
        return view('home');


        //        if($request->hasFile('photo'))
//        {
//            $destination= '/uploads'. $user->photo;
//            if(File::exists($destination)){
//                File::delete($destination);
//
//            }
//
//            $file=$request->file('photo');
//            $extension=$file->getClientOriginalExtension();
//            $filename= time(). '.'.$extension;
//            $fileName = $file->time() . '_' . $request->file->getClientOriginalName();
//            $file-> $request->file('file')->storeAs('upload', $fileName, 'public');
//            $file->move('/uploads', $filename);
//            $user->photo=$filename;
//        }
//
//
////
//        $user-> update();
//        $fileModel = new File;
//        if ($request->file()) {
//            $fileName = time() . '_' . $request->file->getClientOriginalName();
//            $filePath = $request->file('file')->storePubliclyAs('upload', $fileName, 'public');
//
//            $fileModel->name = time() . '_' . $request->file->getClientOriginalName();
//            $fileModel->file_path = '/' . $filePath;
//            $fileModel->freelancerID = Auth::user()->id;
//            $fileModel->save();
//
//            $freelancerID = Auth::user()->id;
//            User::findOrNew($freelancerID)->update(['type' => "1"]);
//
//            return redirect('/profile')->with('success', 'Successfully updated your reservation!');
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
