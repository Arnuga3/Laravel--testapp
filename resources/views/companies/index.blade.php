@extends('layouts.app')

@section('content')
<div class="container">
    <h3>A list of Companies!</h3>

    <a href="{{ route('companies.create') }}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">{{ __('Add new') }}</a>
<div>
@endsection