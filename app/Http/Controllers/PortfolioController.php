<?php

namespace App\Http\Controllers;

use App\Factories\PortfolioBuilder;
use App\Factories\PortfolioFactory;
use App\Factories\PortfolioRemover;
use App\Factories\ServiceBuilder;
use App\Http\Requests\PortfolioRequest;
use App\Http\Requests\PortfolioUpdateRequest;
use App\Http\Requests\ServiceRequest;
use App\Models\Portfolio;
use App\Models\Tag;
use App\Notifications\TestNootification;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PortfolioController extends Controller
{
    public function index()
    {
        $files = Portfolio::with('tags')->paginate(10);
        return view('backend.portfolio.index',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PortfolioRequest $request
     * @param PortfolioFactory $factory
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioRequest $request, PortfolioFactory $factory)
    {
        $created = $factory->create($request);
        if ($created)
        {
            return redirect(route('portfolio.index'))->with(['status' => 'Zdjęcie zostało dodane.']);
        }
        return redirect(route('portfolio.index'))->withErrors('Zdjęcie nie zostało dodane.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Portfolio $portfolio)
    {
        return view('backend.portfolio.edit', compact('portfolio'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(PortfolioUpdateRequest $request, Portfolio $portfolio, PortfolioBuilder $builder)
    {
        $saved = $builder->update($request, $portfolio);
        if ($saved)
        {
            return redirect(route('portfolio.index'))->with(['status' => 'Zmiany zostały zapisane.']);
        }
        return redirect(route('portfolio.index'))->withErrors('Zmiany nie zostały zapisane.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio, PortfolioRemover $remover)
    {
        $removed = $remover->destroy($portfolio);
        if ($removed)
        {
            return redirect(route('portfolio.index'))->with(['status' => 'Zdjęcie zostało usunięte.']);
        }
        return redirect(route('portfolio.index'))->withErrors('Certyfikat nie został usunięty.');

    }
}
