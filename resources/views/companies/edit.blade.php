@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update company details:</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('companies.update', ['id' => $company->id]) }}">
                            @csrf
                            @method('PUT')

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="c-name">Compny Name</label>
                                <input type="text" class="form-control" id="c-name" placeholder="required" name="company_name" value="{{ $company->name }}">
                            </div>
                            <div class="form-group">
                                <label for="c-logo">Logo (min size 100x100)</label>
                                <input type="file" class="form-control-file" id="c-logo" name="company_logo">
                                @if( !empty($company->logo ))
                                    <div class="d-flex flex-row">
                                        <div class="imageWrapper rounded mt-3">
                                            <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}" />
                                        </div>
                                        <!-- Will need to add a confirmation later -->
                                        <div class="align-self-center ml-3 pt-3">
                                            <a class="btn btn-sm btn-outline-danger" href="{{ route('companies.removeImage', ['id' => $company->id]) }}"><span class="lnr lnr-trash"></span>Delete</a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="c-email">Email address</label>
                                <input type="email" class="form-control" id="c-email" placeholder="optional" name="company_email"  value="{{ $company->email }}">
                            </div>
                            <div class="form-group">
                                <label for="c-website">Website</label>
                                <input type="text" class="form-control" id="c-website" placeholder="optional" name="company_website"  value="{{ $company->website }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection