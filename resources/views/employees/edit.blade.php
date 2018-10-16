@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-light mb-3" href="{{ route('employees.index') }}"><span class="lnr lnr-chevron-left pr-2"></span>Go back</a>
            <div class="card">
                <div class="card-header bg-primary text-white font-weight-bold">
                    Employee's details:
                </div>
            
                <form method="post" action="{{ route('employees.update', ['id' => $employee->id]) }}">
                    @csrf
                    @method('PUT')

                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="e-firstname">First Name</label>
                                    <input type="text" class="form-control" id="e-firstname" placeholder="required" name="employee_firstname" value="{{ $employee->firstname }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="e-lastname">Last Name</label>
                                    <input type="text" class="form-control" id="e-lastname" placeholder="required" name="employee_lastname" value="{{ $employee->lastname }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="e-employee">Company</label>
                            <select class="form-control" id="e-employee" name="employee_company">
                                @foreach ($companies as $company)

                                    @if( $employee->company_id == $company->id)
                                        <option selected value="{{ $company->id }}">{{ $company->name }}</option>
                                    @else
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endif
                            
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="e-email">Email</label>
                            <input type="text" class="form-control" id="e-website" placeholder="optional" name="employee_email" value="{{ $employee->email }}">
                        </div>
                        <div class="form-group">
                            <label for="e-phone">Phone</label>
                            <input type="text" class="form-control" id="e-phone" placeholder="optional" name="employee_phone" value="{{ $employee->phone }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        
                    </div>

                </form>

                <!-- Modal with a form for the employee qualification table -->
                <div class="modal" tabindex="-1" id="qualificationModal" role="dialog" aria-labelledby="qualificationModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">New Employee's qualification</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{ route('employees.addQualification', ['id' => $employee->id]) }}">
                                    @csrf
                                    @method('PUT')
                                    
                                    <div class="form-group">
                                        <label for="e-qualification">Qualifications</label>
                                        <select class="form-control" id="e-qualification" name="qualification_id">
                                            <!-- Display only qualifications that an employee doesn't have -->
                                            @foreach ($qualifications->diff($employee->qualifications)->all() as $qualification)
                                                <option value="{{ $qualification->id }}">{{ $qualification->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="e-date">Date achived</label>
                                        <input type="date" class="form-control" id="e-date" name="date_achieved">
                                    </div>
                                    <div class="form-group">
                                        <label for="e-grade">Grade</label>
                                        <input type="text" class="form-control" id="e-grade" placeholder="required" name="grade">
                                    </div>
                                    <button type="submit" class="btn btn-outline-success">Add</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal end -->

                <div class="card-footer">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">{{ $message }}</div>
                    @endif

                    <ul class="list-group list-group-flush mt-2">
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-secondary text-white">
                            <span class="font-weight-bold">Employee's qualifications ({{ $employee->qualifications->count() }})</span>
                        </li>
                        @foreach ($employee->qualifications as $qualification)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>{{ $qualification->title }}<br>{{$qualification->pivot->grade }} <br> {{ date('d-m-Y', strtotime($qualification->pivot->date_achieved)) }}</span>
                                <span>
                                    <form onsubmit="return confirm('Do you want to delete {{ $qualification->title }} qualification?');" action="{{ route('employees.deleteQualification', ['employee_id' => $employee->id, 'qualification_id' => $qualification->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn text-danger"><span class="lnr lnr-trash"></span></button>
                                    </form>
                                    <a class="btn text-secondary" href="{{ route('qualifications.edit', ['id' => $qualification->id]) }}"><span class="lnr lnr-pencil"></span></a>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn btn-secondary mb-2 mt-2 float-right" data-toggle="modal" data-target="#qualificationModal">
                        <span class="lnr lnr-plus-circle pr-1"></span>
                        Add Qualification
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection