<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        return view('index', ['header' => "Empresas"], compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create', ['header' => "Nueva Empresa"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mail' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'cif' => 'required'
        ]);

        Company::create([
            'name' => $request->name,
            'contact_email' => $request->mail,
            'address' => $request->address,
            'phone' => $request->phone,
            'cif' => $request->cif
        ]);

        return redirect()->route('company.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::find($id);
        return view('show', ['header' => "Empresa $company->name",'company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::find($id);
        return view('edit', ['header' => "Editar datos de $company->name",'company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'contact_email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'cif' => 'required'
        ]);

        Company::find($id)->update([
            'name' => $request->name,
            'contact_email' => $request->contact_email,
            'address' => $request->address,
            'phone' => $request->phone,
            'cif' => $request->cif
        ]);
        return redirect()->route('company.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Company::destroy($id);
        return redirect()->route('company.index');
    }
}
