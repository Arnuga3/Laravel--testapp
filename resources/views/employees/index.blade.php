@extends('layouts.app')

@section('content')
<div class="container">
    
    <h3>A list of employees</h3>

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">{{ $message }}</div>
    @endif

    <a href="{{ route('employees.create') }}" class="btn btn-primary btn-sm mt-3 ml-2 mb-2" role="button" aria-pressed="true"><span class="lnr lnr-plus-circle pr-1"></span>{{ __('Add new') }}</a>

    @foreach ($employees as $employee)
        <div class="d-flex bg-white border-bottom">
            <div class="p-2 flex-shrink-1 align-self-center">
                <div class="imageWrapper rounded">
                    <span class="lnr lnr-user text-secondary"></span>
                </div>
            </div>
            <div class="p-2 w-100 d-flex flex-column align-self-center">
                <h5>{{ $employee->firstname . ' ' . $employee->lastname}}</h5>
                <small class="text-secondary">Company: {{ $employee->company->name }}</small>
                <small><span class="text-secondary">Email: </span><a href="mailto:{{ $employee->email }}">{{ $employee->email }}</a></small>
                <small><span class="text-secondary">Phone: </span><a href="tel:{{ $employee->phone }}">{{ $employee->phone }}</a></small>
            </div>
            <div class="d-flex align-items-end flex-column">
                <form class="mt-2" action="{{ route('employees.destroy', ['id' => $employee->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn mt-auto text-danger"><span class="lnr lnr-trash"></span></button>
                </form>
                <a class="btn mt-auto text-secondary" href="{{ route('employees.edit', ['id' => $employee->id]) }}"><span class="lnr lnr-pencil"></span></a>
            </div>
        </div>
    @endforeach

    <p>{{ $employees->links() }}</p>
<div>
@endsection