<?php

namespace App\Http\Controllers;
use App\Employees;
use App\Companies;
use App\Qualifications;
use Illuminate\Http\Request;

class EmployeeController extends Controller
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
        $employees = Employees::paginate(10);
        return view('employees.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Companies::all();
        return view('employees.create', ['companies' => $companies]);
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
            'employee_firstname' => 'required|string',
            'employee_lastname' => 'required|string',
            'employee_company' => 'required|integer',
            'employee_email' => 'nullable|email',
            'employee_phone' => 'nullable|string'
        ]);

        $employee = new Employees([
            'firstname' => $request->get('employee_firstname'),
            'lastname' => $request->get('employee_lastname'),
            'company_id' => $request->get('employee_company'),
            'email' => $request->get('employee_email'),
            'phone' => $request->get('employee_phone')
        ]);
        $employee->save();

        return redirect('/employees')->with('success', 'Employee has been added.');
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
        $employee = Employees::find($id);
        $companies = Companies::all();
        $qualifications = Qualifications::all();

        return view('employees.edit', ['employee' => $employee, 'companies' => $companies,
            'qualifications' => $qualifications]);
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
            'employee_firstname' => 'required|string',
            'employee_lastname' => 'required|string',
            'employee_company' => 'required|integer',
            'employee_email' => 'nullable|email',
            'employee_phone' => 'nullable|string'
        ]);

        $employee = Employees::find($id);

        $employee->firstname = $request->get('employee_firstname');
        $employee->lastname = $request->get('employee_lastname');
        $employee->company_id = $request->get('employee_company');
        $employee->email = $request->get('employee_email');
        $employee->phone = $request->get('company_phone');
        $employee->save();
        
        return redirect('/employees')->with('success', 'Record has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employees::find($id);
        $employee->delete();

        return redirect('/employees')->with('success', 'Record has been deleted.');
    }

    public function addQualification(Request $request, $id)
    {
        $request->validate([
            'qualification_id' => 'required|integer',
            'date_achieved' => 'required|date',
            'grade' => 'required|string'
        ]);

        $employee = Employees::find($id);
        $employee->qualifications()->attach($request->get('qualification_id'), ['date_achieved' => $request->get('date_achieved'), 'grade' => $request->get('grade')]);

        return redirect()->route('employees.edit', ['id' => $employee->id])->with('success', 'Qualification has been added.');
    }

    public function deleteQualification($employee_id, $qualification_id)
    {
        $employee = Employees::find($employee_id);
        $employee->qualifications()->detach($qualification_id);

        return redirect()->route('employees.edit', ['id' => $employee->id])->with('success', 'Qualification has been deleted.');
    }
}
