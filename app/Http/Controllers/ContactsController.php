<?php

namespace App\Http\Controllers;

use App\Mail\ContactPlaced;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    public function contact() {
        return view('pages.contact');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        Mail::send(new ContactPlaced($data));

        return back()->with('success_message','The message has been send. Thankyou!');
    }
}
