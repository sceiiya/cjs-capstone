<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function mail()
    {
        $data = ['name' => 'Test Person'];

        Mail::send('mail', $data, function($message)
        {
            $message->to('coronapungal111@gmail.com', 'Test Recipient')->subject('This is the subject you should know');
            $message->attach(public_path('documents/sample.txt'));
            $message->from('no-reply@hr-solutions.wd49p.com', 'HR Solutions');
        });
    }
}
