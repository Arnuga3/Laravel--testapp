@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span class="lnr lnr-chart-bars text-dark"></span>
                    Dashboard
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ route('companies.index') }}">{{ __('Companies') }}</a>
                            <span class="badge badge-primary badge-pill">{{ $totalComp }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ route('employees.index') }}">{{ __('Employees') }}</a>
                            <span class="badge badge-primary badge-pill">{{ $totalEmpl }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ route('qualifications.index') }}">{{ __('Qualifications') }}</a>
                            <span class="badge badge-primary badge-pill">{{ $totalQual }}</span>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
