<?php

namespace App\Http\Controllers;

use App\Factories\PortfolioFactory;
use App\Http\Requests\PortfolioRequest;
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
        $files = Portfolio::with('tags')->get();
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        try{
            DB::transaction(function () use($portfolio){
                Storage::disk($portfolio->disk)->delete($portfolio->path);
                $portfolio->delete();
            });
        }catch (\Exception $exception)
        {
            return redirect(route('portfolio.index'))->with(['error' => $exception->getMessage()]);

        }
        return redirect(route('portfolio.index'))->with(['status' => 'Zdjęcie usunięte.']);

    }
}
