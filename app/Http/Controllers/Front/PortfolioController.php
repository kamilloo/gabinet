<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('portfolio', ['portfolio' => \App\Models\Portfolio::with('tags')->get(), 'tags' => \App\Models\Tag::all()]);
    }
}
