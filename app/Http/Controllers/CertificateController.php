<?php

namespace App\Http\Controllers;

use App\Factories\CertificateBuilder;
use App\Factories\CertificateFactory;
use App\Factories\CertificateRemover;
use App\Http\Requests\CertificateRequest;
use App\Http\Requests\CertificateUpdateRequest;
use App\Models\Certificate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return \View::first(['backend', 'backend.certificates.index'])->with([
            'certificates' => Certificate::paginate(10)
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
    public function store(CertificateRequest $request, CertificateFactory $factory)
    {
        $created = $factory->create($request);
        if ($created)
        {
            return redirect(route('certificates.index'))->with(['status' => 'Certyfikat został dodany.']);
        }
        return redirect(route('certificates.index'))->withErrors('Certyfikat nie został dodany.');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate)
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
    public function update(CertificateUpdateRequest $request, Certificate $certificate, CertificateBuilder $builder)
    {
        $created = $builder->update($request, $certificate);
        if ($created)
        {
            return redirect(route('certificates.index'))->with(['status' => 'Certyfikat został zapisany.']);
        }
        return redirect(route('certificates.index'))->withErrors('Certyfikat nie został zapisany.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate, CertificateRemover $remover)
    {
        $removed = $remover->destroy($certificate);
        if ($removed)
        {
            return redirect(route('certificates.index'))->with(['status' => 'Certyfikat został usunięty.']);
        }
        return redirect(route('certificates.index'))->withErrors('Certyfikat nie został usunięty.');
    }
}
