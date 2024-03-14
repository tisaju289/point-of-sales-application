<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function NavContactPage(){
        return view('pages.navContactPage');
    }

    public function UserNavContactPage(){
        return view('pages.UsernavContactPage');
    }


    public function SendMessage(Request $request){
        try {
            $request->validate([
                "name" => 'required|string|max:50',
                "email" => 'required|email|max:50',
                "subject" => 'required|string|max:100',
                "message" => 'required|string|min:3',
            ]);
    
            // Gather form data
            $name = $request->input('name');
            $email = $request->input('email');
            $subject = $request->input('subject');
            $message = $request->input('message');
    
            // Send email
            Mail::to('engrsaju289@gmail.com')->send(new ContactFormMail([
                'name' => $name,
                'email' => $email,
                'subject' => $subject,
                'message' => $message
            ]));
    
            return response()->json(['status' => 'success', 'message' => 'Message sent successfully']);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
