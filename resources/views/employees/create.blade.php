@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New employee details:</div>

                <form method="post" action="{{ route('employees.store') }}">
                    @csrf
                    @method('POST')
                    
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
                                    <input type="text" class="form-control" id="c-firstname" placeholder="required" name="employee_firstname">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="c-lastname">Last Name</label>
                                    <input type="text" class="form-control" id="c-lastname" placeholder="required" name="employee_lastname">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="c-company">Company</label>
                            <select class="form-control" id="c-company" name="employee_company">
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="c-email">Email</label>
                            <input type="text" class="form-control" id="c-website" placeholder="optional" name="employee_email">
                        </div>
                        <div class="form-group">
                            <label for="c-phone">Phone</label>
                            <input type="text" class="form-control" id="c-phone" placeholder="optional" name="employee_phone">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection