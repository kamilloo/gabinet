<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'services' => \App\Models\Service::latest('id')->limit(3)->get(),
            'categories' => \App\Models\Category::with('services')->get(),
            'portfolio'=> \App\Models\Portfolio::with('tags')->get(),
            'tags' => \App\Models\Tag::all(),
            'pricing' => \App\Models\Pricing::with('items')->get()

        ]);
    }
}
