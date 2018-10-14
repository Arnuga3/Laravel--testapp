@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-light mb-3" href="{{ route('employees.index') }}"><span class="lnr lnr-chevron-left pr-2"></span>Go back</a>
            <div class="card">
                <div class="card-header">
                    Update employee details:
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
                                    <label for="c-firstname">First Name</label>
                                    <input type="text" class="form-control" id="c-firstname" placeholder="required" name="employee_firstname" value="{{ $employee->firstname }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="c-lastname">Last Name</label>
                                    <input type="text" class="form-control" id="c-lastname" placeholder="required" name="employee_lastname" value="{{ $employee->lastname }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="c-employee">Company</label>
                            <select class="form-control" id="c-employee" name="employee_company">
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
                            <label for="c-email">Email</label>
                            <input type="text" class="form-control" id="c-website" placeholder="optional" name="employee_email" value="{{ $employee->email }}">
                        </div>
                        <div class="form-group">
                            <label for="c-phone">Phone</label>
                            <input type="text" class="form-control" id="c-phone" placeholder="optional" name="employee_phone" value="{{ $employee->phone }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection