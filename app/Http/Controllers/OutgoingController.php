<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Mail\SendGrid;
use App\Mail\TestEmail;

 
class OutgoingController extends Controller
{
    public function sendMail(Requset $request)
    {
        $input = ['message' => 'This is a neti sendgrid test!'];

        Mail::to('phillip.madsen.21@gmail.com')->send(new SendGrid($input));
    }

    public function testMail(Requset $request)
    {
        $data = ['message' => 'This is a neti test test!'];

        Mail::to('phillip.madsen.21@gmail.com')->send(new TestEmail($data));
    }
}
