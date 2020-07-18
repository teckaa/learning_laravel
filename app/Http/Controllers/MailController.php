<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mailtrap;

class MailController extends Controller
{
    public function index(){
        Mail::to('fantasica992@gmail.com')->send(new Mailtrap());
    }

    public function send(){
        Mail::send(['text' => 'mail'], ['name' => 'Kolawole'], function($message){
            $message->to('kolawolerosho@gmail.com', 'To Kola')->subject('Test Email');
            $message->from('kolawolerosho@gmail.com', 'Kola Receiver');
        });
    }
}
