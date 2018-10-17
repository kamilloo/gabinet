<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Contact extends Controller
{
    public function store(Request $request)
    {
        return response('Twoja wiadomość została wysłana. Dziękujęmy!');
    }

    public function index()
    {
        return view('contact', ['portfolio' => \App\Models\Portfolio::all()]);
    }
}
