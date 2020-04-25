<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Model;
use App\Models\Pricing;

class PricingController extends Controller
{
    public function index()
    {
        $pricing = Pricing::with(['items' => Model::orderByPosition()])->orderBy('position')->get();
        return view('pricing', compact('pricing'));
    }
}
