<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Tests\CreatesApplication;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.categories.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $icons = config('icons');
        $icons = array_combine($icons,$icons);
        return view('backend.categories.create', compact('icons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        Category::create([
            'name' => $request->getName(),
            'icon' => $request->getIcon(),
        ]);

        return redirect(route('categories.index'))->with(['status' => 'Kategoria została dodana.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $icons = config('icons');
        $icons = array_combine($icons,$icons);
        return view('backend.categories.edit', compact('category', 'icons'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->getName(),
            'icon' => $request->getIcon(),
        ]);

        return redirect(route('categories.index'))->with(['status' => 'Kategoria zapisana.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->services()->exists())
        {
            return redirect(route('categories.index'))->with(['error' =>'Kategoria posiada usługi.']);
        }
        $category->delete();

        return redirect(route('categories.index'))->with(['status' => 'Kategoria usunięta.']);

    }
}
