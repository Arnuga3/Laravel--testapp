@extends('layouts.app')

@section('content')
<div class="container">
    
    <h3>List of Companies</h3>

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">{{ $message }}</div>
    @endif

    <a href="{{ route('companies.create') }}" class="btn btn-primary btn-sm mt-3 ml-2 mb-2" role="button" aria-pressed="true">
        <span class="lnr lnr-plus-circle pr-1"></span>
        {{ __('Add new') }}
    </a>

    @foreach ($companies as $company)
        <div class="t-listItem d-flex">
            <div class="p-2 flex-shrink-1 align-self-center">
                <div class="imageWrapper-lg rounded">
                    @if( empty($company->logo ))
                        <span class="lnr lnr-picture text-secondary"></span>
                    @else
                        <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}" />
                    @endif
                </div>
            </div>
            <div class="t-details p-2 w-100 d-flex flex-column align-self-center">
                <h5>{{ $company->name }}</h5>
                @if($company->website)
                <small class="t-tooltip">
                    <span class="t-tooltiptext">{{ $company->website }}</span>
                    <span class="lnr lnr-earth"></span>
                    <a href="{{ $company->website }}">{{ __('Website') }}</a>
                </small>
                @endif
                @if($company->email)
                    <small class="t-tooltip">
                        <span class="t-tooltiptext">{{ $company->email }}</span>
                        <span class="lnr lnr-envelope"></span>
                        <a href="mailto:{{ $company->email }}">{{ __('Email') }}</a>
                    </small>
                @endif
            </div>
            <div class="d-flex align-items-end flex-column">
                <form class="mt-2" onsubmit="return confirm('All employees within this company will be removed! Do you want to delete {{ $company->name }} company?');" action="{{ route('companies.destroy', ['id' => $company->id]) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-outline-danger m-2">
                        <span class="lnr lnr-trash"></span>
                    </button>
                </form>
                <a class="btn btn-outline-secondary m-2" href="{{ route('companies.edit', ['id' => $company->id]) }}">
                    <span class="lnr lnr-pencil"></span>
                </a>
            </div>
        </div>
    @endforeach

    <p>{{ $companies->links() }}</p>
<div>
@endsection