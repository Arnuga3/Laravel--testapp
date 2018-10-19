@extends('layouts.app')

@section('content')
<div class="container">
    
    <h3>List of employees - {{ $company->name }}</h3>
    <a class="btn btn-light mb-2 mt-2" href="{{ route('companies.index') }}">
        <span class="lnr lnr-chevron-left pr-2"></span>
        Go back
    </a>
            
    @foreach ($companyEmployees as $employee)
        <div class="t-listItem d-flex">
            <div class="p-2 flex-shrink-1 align-self-center">
                <div class="imageWrapper-sm rounded-circle">
                    <span class="lnr lnr-user text-secondary"></span>
                </div>
            </div>
            <div class="pl-3 w-100 d-flex flex-column align-self-center">
                <h5>{{ $employee->firstname . ' ' . $employee->lastname}}</h5>
                <small>
                    <a href="{{ route('employees.edit', ['id' => $employee->id]) }}">
                        Show profile
                    </a>
                </small>
            </div>
        </div>
    @endforeach

    <p>{{ $companyEmployees->links() }}</p>
<div>
@endsection