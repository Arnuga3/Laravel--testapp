@extends('layouts.app')

@section('content')
<div class="container">
    
    <h3>A list of Companies</h3>

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">{{ $message }}</div>
    @endif

    <a href="{{ route('companies.create') }}" class="btn btn-primary btn-sm mt-3 mb-2" role="button" aria-pressed="true">{{ __('Add new') }}</a>

    @foreach ($companies as $company)
        <div class="d-flex bg-white border-bottom">
            <div class="p-2 flex-shrink-1 align-self-center">
                <div class="imageWrapper rounded">
                    @if( empty($company->logo ))
                        <span class="lnr lnr-picture text-secondary"></span>
                    @else
                        <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}" />
                    @endif
                </div>
            </div>
            <div class="p-2 w-100 d-flex flex-column align-self-center">
                <h5>{{ $company->name }}</h5>
                <small class="text-secondary">Website: <a href="{{ $company->website }}">{{ $company->website }}</a></small>
                <small><span class="text-secondary">Email: </span><a href="mailto:{{ $company->email }}">{{ $company->email }}</a></small>
            </div>
            <div class="d-flex align-items-end flex-column">
                <form class="mt-2" action="{{ route('companies.destroy', ['id' => $company->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn mt-auto text-danger"><span class="lnr lnr-trash"></span></button>
                </form>
                <a class="btn mt-auto text-secondary" href="{{ route('companies.edit', ['id' => $company->id]) }}"><span class="lnr lnr-pencil"></span></a>
            </div>
        </div>
    @endforeach

    <p>{{ $companies->links() }}</p>
<div>
@endsection