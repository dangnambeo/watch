<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class SendMailController extends Controller
{
    public function sendMail(Request $request){
        $data = $request->all();
        $emails= $data['emails']??'';

        Mail::to($emails)->send(new \App\Mail\SendMail(['emails'=>$emails]));
        Session::flash('flash_message','Send message successfully');
        return view('shop-page.mail.resign-mail');
    }
}
