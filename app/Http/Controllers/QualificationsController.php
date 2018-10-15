<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Qualifications;

class QualificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qualifications = Qualifications::paginate(10);
        return view('qualifications.index', ['qualifications' => $qualifications]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $qualifications = Qualifications::all();
        return view('qualifications.create', ['qualifications' => $qualifications]);
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
            'qualifications_title' => 'required|string'
        ]);

        $qualification = new Qualifications([
            'title' => $request->get('qualifications_title')
        ]);
        $qualification->save();

        return redirect('/qualifications')->with('success', 'Qualification has been added.');
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
        $qualification = Qualifications::find($id);

        return view('qualifications.edit', ['qualification' => $qualification]);
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
        $request->validate([
            'qualifications_title' => 'required|string'
        ]);

        $qualification = Qualifications::find($id);

        $qualification->title = $request->get('qualifications_title');
        $qualification->save();
        
        return redirect('/qualifications')->with('success', 'Record has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $qualification = Qualifications::find($id);
        $qualification->delete();

        return redirect('/qualifications')->with('success', 'Record has been deleted.');
    }
}
