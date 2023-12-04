<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;

class ContactController extends Controller {
    public function sendMail(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'msg' => 'required',
        ]);

        $details = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'subject' => $validatedData['subject'],
            'msg' => $validatedData['msg'],
        ];
        $mail = new \App\Mail\ContactForm($details);

        Mail::to('inkwell.and.quill@bookstore.com')->send($mail);
        return back()->with('message_sent', 'Your message has been sent successfully!');
    }
}
