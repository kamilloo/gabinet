<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ContactForm;
use Illuminate\Http\Request;

class Contact extends Controller
{
    public function store(Request $request)
    {
        \Mail::to('pietka.kasia3@gmail.com')
            ->send(new ContactForm(
                $request->input('name'),
                $request->input('email'),
                $request->input('subject'),
                $request->input('message'),
            ));

        return response('Twoja wiadomość została wysłana. Dziękujęmy!');
    }

    public function index()
    {
        return view('contact', ['portfolio' => \App\Models\Portfolio::all()]);
    }
}
