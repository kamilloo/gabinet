<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Model;
use App\Models\Pricing;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $pricing = Pricing::with(['items' => Model::orderByPosition()])->orderBy('position')->get();

        return view('welcome', [
            'services' => \App\Models\Service::latest('id')->limit(3)->get(),
            'categories' => \App\Models\Category::with('services')->get(),
            'portfolio'=> \App\Models\Portfolio::with('tags')->get(),
            'tags' => \App\Models\Tag::all(),
            'pricing' => $pricing

        ]);
    }
}
