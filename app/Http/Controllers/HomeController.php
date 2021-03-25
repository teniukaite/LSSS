<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('profile.change_profile', [
            'user'=>$user
        ]);
    }
    public function Edit(Request $request){
        $user = User::find($request->get('id'));
        $user->name=$request->get('name');
        $user->save();
        return redirect('/home');
    }

    public function delete() {

        $user = Auth::user();
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
}
