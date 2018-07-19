<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        DB::transaction(function() use ($request){
            $file_name =  basename($request->filepath);
            $path = 'certificates/' .basename($file_name);
            Storage::disk('storage')->put($path,Storage::disk('file-manager')->get($file_name));
            Certificate::create([
                'title' => $request->title,
                'description' => $request->description,
                'disk' => 'storage',
                'file' => $file_name,
                'path' => $path
            ]);
            Storage::disk('file-manager')->delete($file_name);
        });

        return redirect(route('certificates.index'))->with(['status' => 'Certyfikat został dodany.']);
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
    public function update(Request $request, Certificate $certificate)
    {
        DB::transaction(function() use ($request, $certificate){

            $certificate->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            if ($request->filepath)
            {
                $old_file = $certificate->path;
                $file_name =  basename($request->filepath);
                $path = 'certificates/' .basename($file_name);
                Storage::disk('storage')->put($path,Storage::disk('file-manager')->get($file_name));
                $certificate->update([
                    'disk' => 'storage',
                    'file' => $file_name,
                    'path' => $path
                ]);
                Storage::disk('file-manager')->delete($file_name);
                Storage::disk('storage')->delete($old_file);
            }
        });

        return redirect(route('certificates.index'))->with(['status' => 'Certyfikat został zapisany.']);

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
                Storage::disk($certificate->disk)->delete($certificate->path);
                $certificate->delete();
            });
        }catch (\Exception $exception)
        {
            return redirect(route('portfolio.index'))->with(['error' => $exception->getMessage()]);

        }
        return redirect(route('certificates.index'))->with(['status' => 'Certyfikat usunięty.']);
    }
}
