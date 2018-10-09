<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Companies;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companies::paginate(10);
        return view('companies.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name'=>'required',
            'company_logo'=> 'nullable|image|mimes:jpeg,jpg,bmp,png|dimensions:min_width=100,min_height=100',
            'company_email' => 'nullable|email',
            'company_website' => 'nullable|url'
        ]);

        $path = is_null(request()->company_logo) ? request()->company_logo : Storage::putFile('', new File(request()->company_logo));

        $company = new Companies([
            'name' => $request->get('company_name'),
            'logo'=> $path,
            'email'=> $request->get('company_email'),
            'website'=> $request->get('company_website')
        ]);
        $company->save();
        return redirect('/companies')->with('success', 'Company has been added.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
