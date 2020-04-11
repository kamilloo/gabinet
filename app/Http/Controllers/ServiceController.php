<?php

namespace App\Http\Controllers;

use App\Factories\ServiceBuilder;
use App\Factories\ServiceFactory;
use App\Http\Requests\Request;
use App\Http\Requests\ServiceRequest;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use View;

class ServiceController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return View::first(['backend', 'backend.services.index'])->with([
            'services' => Service::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('backend.services.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return RedirectResponse|Redirector
     */
    public function store(ServiceRequest $request, ServiceFactory $factory)
    {
        $created = $factory->create($request);
        if ($created)
        {
            return redirect(route('services.index'))->with(['status' => 'Usługa została dodana.']);
        }
        return redirect(route('services.index'))->withErrors('Usługa nie została dodana.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
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
     */
    public function update(ServiceRequest $request, Service $service, ServiceBuilder $service_builder)
    {
        $created = $service_builder->update($request, $service);
        if ($created)
        {
            return redirect(route('services.index'))->with(['status' => 'Usługa została zapisana.']);
        }
        return redirect(route('services.index'))->withErrors('Usługa nie została zapisana.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Service $service)
    {
        if ($service->delete())
        {
            return redirect(route('services.index'))->with(['status' => 'Usługa została usunięta.']);
        }
        return redirect(route('services.index'))->withErrors('Usługa nie została usunięta.');

    }
}
