<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        return view('pricing', ['pricing' => \App\Models\Pricing::with('items')->get()]);
    }
}
