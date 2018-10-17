@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <a class="btn btn-light mb-3" href="{{ route('companies.index') }}">
                <span class="lnr lnr-chevron-left pr-2"></span>
                Go back
            </a>

            <div class="card">
                <div class="card-header">Update company details:</div>
                    <div class="card-body">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success" role="alert">{{ $message }}</div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <div class="d-flex justify-content-between">
                            <!-- Upload image form -->
                            <form method="post" action="{{ route('companies.uploadImage', ['id' => $company->id]) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="c-logo">Logo (min size 100x100)</label>
                                    <input type="file" class="form-control-file" id="c-logo" name="company_logo">
                                    @if( !empty($company->logo ))
                                        <div class="d-flex flex-row">
                                            <div class="imageWrapper rounded mt-4">
                                                <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}" />
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                @if( empty($company->logo ))
                                    <button type="submit" class="btn btn-outline-success">
                                        <span class="lnr lnr-upload pr-1"></span>
                                        Upload
                                    </button>
                                @endif
                            </form>

                            <!-- Delete image form -->
                            @if( !empty($company->logo ))
                                <form onsubmit="return confirm('Do you want to delete the current logo?');" method="post" action="{{ route('companies.deleteImage', ['id' => $company->id]) }}">
                                    @csrf
                                    @method('DELETE')
                
                                    <button type="submit" class="btn btn-outline-danger">Delete image</button>
                                </form>
                            @endif
                        </div>
                        @if( !empty($company->logo ))
                            <small>Before uploading a new logo, the old one need to be removed.</small>
                        @endif
                    </div>

                    <div class="card-footer">
                        <!-- Update other information form -->
                        <form  class="mt-4" method="post" action="{{ route('companies.update', ['id' => $company->id]) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="c-name">Company Name</label>
                                <input type="text" class="form-control" id="c-name" placeholder="required" name="company_name" value="{{ $company->name }}">
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