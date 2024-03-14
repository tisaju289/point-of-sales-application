<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function ContactUs(){
        $contact_us= ContactUs::all();
        return $contact_us;
        
    }
}
