<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SampleMail;

class SendMailController extends Controller
{
    public function index()
    {
        $content = [
            'subject' => 'This is the mail subject',
            'body' => 'This is the email body of how to send email from laravel 10 with mailtrap.'
        ];

        Mail::to('your_email@gmail.com')->send(new SampleMail($content));

        return "Email has been sent.";
    }
}
