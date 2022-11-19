<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $data = $request->validated();

        $company = Company::create([
            'name' => $data['name'],
            'email' => $data['email'] ?? null,
            'website' => $data['website'] ?? null,
        ]);

        if ($company && $request->hasFile('logo')) {
            $path = Storage::disk('public')->putFile('logos/' . $company->id, $request->file('logo'));
            $company->update([
                'logo' => env('APP_URL') . '/' . $path,
            ]);
        }

        return redirect()->route('company.index');
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
    public function edit($id)
    {
        $company = Company::where('id', $id)->first();
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, $id)
    {
        $data = $request->validated();

        $company = Company::where('id', $id)->first();

        $company->update([
            'name' => $data['name'] ?? $company->name,
            'email' => $data['email'] ?? $company->email,
            'website' => $data['website'] ?? $company->website,
        ]);

        if ($request->hasFile('logo')) {
            $path = Storage::disk('public')->putFile('logos/' . $company->id, $request->file('logo'));
            $company->update([
                'logo' => env('APP_URL') . '/' . $path,
            ]);
        }

        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::where('id', $id)->first();
        $company->delete();
        return back();
    }
}
