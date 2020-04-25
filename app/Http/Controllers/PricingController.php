<?php

namespace App\Http\Controllers;

use App\Factories\PricingBuilder;
use App\Factories\PricingFactory;
use App\Factories\PricingRemover;
use App\Http\Requests\PricingRequest;
use App\Http\Requests\PricingUpdateRequest;
use App\Models\Certificate;
use App\Models\Model;
use App\Models\Pricing;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use View;

class PricingController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return View::first(['backend', 'backend.pricing.index'])->with([
            'pricing' => Pricing::orderBy('position')->get()
        ]);
    }

    public function show(Pricing $pricing)
    {
        $pricing->load(['items' => Model::orderByPosition()]);
        return view('backend.pricing.show')->with(compact('pricing'));
    }

    public function showAll()
    {
        return view('backend.pricing.show-all')->with([
            'pricing' => Pricing::orderBy('position')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
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
     * @return Response
     */
    public function edit(Pricing $pricing)
    {
        $pricing->load(['items' => Model::orderByPosition()]);
        return view('backend.pricing.edit', compact('pricing'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
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
     * @return Response
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
