<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class WebsiteController extends Controller
{
    public function contact_form()
    {
        return view('contact');
    }

    public function contact_form_post(Request $request)
    {

        $email = 'email@domain.net';

        $contact = request()->validate([
            'email' => 'required',
            'msg' => 'required',
        ]);

        Mail::to($email)->send(new ContactFormMail($contact));
        return back()->with('success', 'message sucess');
    }
}
