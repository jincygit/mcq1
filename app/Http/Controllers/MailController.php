<?php

namespace App\Http\Controllers;
//use Mail;
use App\Http\Requests;

use Mail;
use App\Mail\DemoMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailController extends Controller {
    public function index()
    {
        $mailData = [
            'title' => 'Mail from me',
            'body' => 'This is for testing email using smtp.'
        ];
         
        Mail::to('jincysusanabraham@gmail.com')->send(new DemoMail($mailData));
           
        dd("Email is sent successfully.");
    }
}