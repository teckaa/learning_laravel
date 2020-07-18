<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendEmailController extends Controller
{
    // public function index(){
    //     return view('sendemail');
    // }

    // public function send(Request $request){
    //     $this->validate($request, [
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'message' => 'required'
    //     ]);

    //     $data = array(
    //         'name'  => $request->name,
    //         'message'  => $request->message,
    //     );

    //     Mail::to('developers@teckaa.com')->send(new SendMail($data));
    //     return back()->with('success', 'Thanks for feedback');
    // }

    public function index(){
        Mail::to('fantasica992@gmail.com')->send(new SendMail());
    }
}
