<?php

namespace App\Http\Controllers;

use App\Factories\ServiceBuilder;
use App\Factories\ServiceFactory;
use App\Http\Requests\Request;
use App\Http\Requests\ServiceRequest;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;

class ServiceController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return \View::first(['backend', 'backend.services.index'])->with([
            'services' => Service::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('backend.services.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request, ServiceFactory $service_factory)
    {
        $service_factory->create($request);

        return redirect(route('services.index'))->with(['status' => 'Usługa została dodana.']);
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
    public function edit(Service $service)
    {
        $categories = Category::all();
        return view('backend.services.edit', compact('service', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, Service $service, ServiceBuilder $service_builder)
    {
        $service_builder->update($request, $service);

        return redirect(route('services.index'))->with(['status' => 'Kategoria zapisana.']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect('services')->with(['status' => 'Usługa usunięta.']);

    }
}
