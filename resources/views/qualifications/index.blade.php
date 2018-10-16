@extends('layouts.app')

@section('content')
<div class="container">
    
    <h3>A list of qualifications</h3>

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">{{ $message }}</div>
    @endif

    <a href="{{ route('qualifications.create') }}" class="btn btn-primary btn-sm mt-3 ml-2 mb-2" role="button" aria-pressed="true"><span class="lnr lnr-plus-circle pr-1"></span>{{ __('Add new') }}</a>

    @foreach ($qualifications as $qualification)
        <div class="d-flex bg-white border-bottom">
            <div class="p-2 flex-shrink-1 align-self-center">
                <div class="imageWrapper-sm rounded">
                    <span class="lnr lnr-graduation-hat text-secondary"></span>
                </div>
            </div>
            <div class="p-2 w-100 align-self-center">
                <h5>{{ $qualification->title }}</h5>
                <div class="d-flex flex-row">
                    <small class="text-secondary">{{ $qualification->employees->count() }} qualification holder(s)  &nbsp;</small>
                    <small class="text-secondary"><a href="{{ route('qualifications.show', ['id' => $qualification->id]) }}">See holders..</a></small>
                </div>
            </div>
            <div class="d-flex align-items-end flex-column">
                <form class="mt-2" onsubmit="return confirm('Do you want to delete {{ $qualification->title }}?');" action="{{ route('qualifications.destroy', ['id' => $qualification->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn mt-auto text-danger"><span class="lnr lnr-trash"></span></button>
                </form>
                <a class="btn mt-auto text-secondary" href="{{ route('qualifications.edit', ['id' => $qualification->id]) }}"><span class="lnr lnr-pencil"></span></a>
            </div>
        </div>
    @endforeach

    <p>{{ $qualifications->links() }}</p>
<div>
@endsection