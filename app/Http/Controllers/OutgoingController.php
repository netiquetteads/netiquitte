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
        $input = ['message' => 'This is a test!'];

        Mail::to('phillip.madsen.12@gmail.com')->send(new SendGrid($input));
    }

    public function testMail(Requset $request)
    {
        $data = ['message' => 'This is a test!'];

        Mail::to('john@example.com')->send(new TestEmail($data));
    }
}
