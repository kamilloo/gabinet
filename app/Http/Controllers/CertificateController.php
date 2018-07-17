<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return \View::first(['backend', 'backend.certificates.index'])->with([
            'certificates' => Certificate::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.certificates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Service::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect('certificates')->with(['status' => 'Usługa została dodana.']);
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
    public function edit(Service $certificate)
    {
        return view('backend.certificates.edit', compact('certificate'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $certificate)
    {
            $certificate->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            return redirect('certificates')->with(['status' => 'Kategoria zapisana.']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $certificate)
    {
        $certificate->delete();

        return redirect('certificates')->with(['status' => 'Usługa usunięta.']);

    }
}
