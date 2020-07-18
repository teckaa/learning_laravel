<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Http\Requests\SettingsRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        $this->page_title = "Edit profile";
    }

    //
    public function edit(User $user){
        return view('user.edit', compact('user'))->with('page_title', $this->page_title);
    }

    public function update(UserRequest $request, User $user){
        $user = Auth::user();
        $user->name = request('name');
        $user->email = request('email');
        $user->phonenumber = request('phonenumber');
        $user->street = request('street');
        $user->city = request('city');
        $user->state = request('state');
        $user->country = request('country');

        $user->save();
        return redirect()->back()->with('success', 'Saved');
    }

    //
    public function settings(User $user){
        $this->page_title = "Settings";
        return view('user.settings', compact('user'))->with('page_title', $this->page_title);
    }

    public function updateSettings(SettingsRequest $request, User $user){
        $user = Auth::user();
        $user->social_facebook = request('social_facebook');
        $user->social_twitter = request('social_twitter');
        $user->social_instagram = request('social_instagram');
        $user->color = request('color');
        $user->discount = request('discount');
        $user->currency = request('currency');

        $user->save();
        return redirect()->back()->with('success', 'Update succesful');
    }

    //
    public function picture(){
        $this->page_title = "Edit picture";
        return view('user.picture')->with('page_title', $this->page_title);
    }

    public function editPicture(Request $request){
        if($request->hasFile('avatar')){
           User::editPicture($request->avatar);
           return redirect()->back()->with('success', 'Image is Uploaded');
        }
        return redirect()->back()->with('error', 'Image is not Uploaded');
    }
}
