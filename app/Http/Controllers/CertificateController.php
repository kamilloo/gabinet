<?php

namespace App\Http\Controllers;

use App\Factories\CertificateBuilder;
use App\Factories\CertificateFactory;
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
    public function destroy(Certificate $certificate)
    {
        try{
            DB::transaction(function () use($certificate){
                Storage::delete($certificate->filepath);
//                $certificate->delete();
            });
        }catch (\Exception $exception)
        {
            return redirect(route('portfolio.index'))->with(['error' => $exception->getMessage()]);

        }
        return redirect(route('certificates.index'))->with(['status' => 'Certyfikat usunięty.']);
    }
}
