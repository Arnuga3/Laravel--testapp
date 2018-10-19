@extends('layouts.app')

@section('content')
<div class="container">
    
    <h3>List of employees</h3>

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">{{ $message }}</div>
    @endif

    <a href="{{ route('employees.create') }}" class="btn btn-primary btn-sm mt-3 ml-2 mb-2" role="button" aria-pressed="true">
        <span class="lnr lnr-plus-circle pr-1"></span>
        {{ __('Add new') }}
    </a>

    @foreach ($employees as $employee)
        <div class="t-listItem d-flex">
            <div class="pl-3 pr-2 flex-shrink-1 align-self-center">
                <div class="imageWrapper-sm rounded-circle">
                    <span class="lnr lnr-user"></span>
                </div>
            </div>
            <div class="t-details p-2 w-100 d-flex flex-column align-self-center">
                <h5>{{ $employee->firstname . ' ' . $employee->lastname}}</h5>
                <small>
                    <span class="lnr lnr-apartment"></span>
                    {{ $employee->company->name }}
                </small>
                <div>
                    @if($employee->email)
                    <small class="t-tooltip">
                        <span class="t-tooltiptext">{{ $employee->email }}</span>
                        <span class="lnr lnr-envelope"></span>
                        <a href="mailto:{{ $employee->email }}">{{ __('Email') }}</a>
                    </small>
                    @endif
                    @if($employee->phone)
                    <small class="t-tooltip">
                        <span class="t-tooltiptext">{{ $employee->phone }}</span>
                        <span class="lnr lnr-phone-handset"></span>
                        <a href="tel:{{ $employee->phone }}">{{ __('Phone') }}</a>
                    </small>
                    @endif
                </div>
            </div>
            <div class="d-flex align-items-end flex-column">
                <form class="mt-2" onsubmit="return confirm('Do you want to delete {{ $employee->firstname . ' ' . $employee->lastname }}?');" action="{{ route('employees.destroy', ['id' => $employee->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    
                    <button class="btn btn-outline-danger mr-2">
                        <span class="lnr lnr-trash"></span>
                    </button>
                </form>
                <a class="btn btn-outline-secondary m-2" href="{{ route('employees.edit', ['id' => $employee->id]) }}">
                    <span class="lnr lnr-pencil"></span>
                </a>
            </div>
        </div>
    @endforeach

    <p>{{ $employees->links() }}</p>
<div>
@endsection