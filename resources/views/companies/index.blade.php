@extends('layouts.app')

@section('content')
<div class="container">
    
    <h3>A list of Companies!</h3>

    <a href="{{ route('companies.create') }}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">{{ __('Add new') }}</a>

    <div class="list-group">
    @foreach ($companies as $company)
        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{ $company->name }}</h5>
            </div>
            <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}" />
            <p class="mb-1">{{ $company->website }}</p>
            <small>{{ $company->email }}
        </a>
    @endforeach
    </div>

    {{ $companies->links() }}
<div>
@endsection