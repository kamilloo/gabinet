<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
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
        $files = Portfolio::all();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function() use ($request){
            $file_name =  basename($request->filepath);
            $path = 'portfolio/' .basename($file_name);
            Storage::disk('storage')->put($path,Storage::disk('file-manager')->get($file_name));
            Portfolio::create([
                'disk' => 'storage',
                'file' => $file_name,
                'path' => $path
            ]);
            Storage::disk('file-manager')->delete($file_name);
        });

        return redirect(route('portfolio.index'))->with(['status' => 'Zdjęcie została dodane.']);
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
