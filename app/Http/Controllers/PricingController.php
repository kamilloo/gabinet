<?php

namespace App\Http\Controllers;

use App\Factories\PricingBuilder;
use App\Factories\PricingFactory;
use App\Factories\PricingRemover;
use App\Http\Requests\PricingRequest;
use App\Http\Requests\PricingUpdateRequest;
use App\Models\Certificate;
use App\Models\Pricing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PricingController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return \View::first(['backend', 'backend.pricing.index'])->with([
            'pricing' => Pricing::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pricing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(PricingRequest $request, PricingFactory $factory)
    {
        $created = $factory->create($request);
        if ($created)
        {
            return redirect(route('pricing.index'))->with(['status' => 'Cennik został dodany.']);
        }
        return redirect(route('pricing.index'))->withErrors('Cennik nie został dodany.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pricing $pricing)
    {
        $pricing->load('items');
        return view('backend.pricing.edit', compact('pricing'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PricingUpdateRequest $request, Pricing $pricing, PricingBuilder $builder)
    {
        $created = $builder->update($request, $pricing);
        if ($created)
        {
            return redirect(route('pricing.index'))->with(['status' => 'Cennik został zapisany.']);
        }
        return redirect(route('pricing.index'))->withErrors('Cennik nie został zapisany.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pricing $pricing, PricingRemover $remover)
    {
        $removed = $remover->destroy($pricing);
        if ($removed)
        {
            return redirect(route('pricing.index'))->with(['status' => 'Cennik usunięty.']);
        }
        return redirect(route('pricing.index'))->withErrors('Cennik nie został usunięty.');
    }
}
