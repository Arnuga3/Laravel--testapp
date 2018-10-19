@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">
        <span class="lnr lnr-chart-bars text-dark"></span>
        Dashboard
    </h1>
    <p class="lead">Add companies. Add employees. Add qualifications. Manage them all.</p>
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 mb-4">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    {{ __('Companies') }}
                    <span class="badge float-right">{{ $totalComp }}</span>
                </h5>
                <p class="card-text">Add companies, upload logos, and add contact details. Add employees.</p>
                <a href="{{ route('companies.index') }}" class="btn btn-sm btn-outline-primary">See companies</a>
            </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 mb-4">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    {{ __('Employees') }}
                    <span class="badge float-right">{{ $totalEmpl }}</span>
                </h5>
                <p class="card-text">Add employees to existing companies, add registered qualifications.</p>
                <a href="{{ route('employees.index') }}" class="btn btn-sm btn-outline-primary">See employees</a>
            </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 mb-4">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    {{ __('Qualifications') }}
                    <span class="badge float-right">{{ $totalQual }}</span>
                </h5>
                <p class="card-text">Add new qualifications. Assign qualifications to employees.</p>
                <a href="{{ route('qualifications.index') }}" class="btn btn-sm btn-outline-primary">See qualification</a>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
