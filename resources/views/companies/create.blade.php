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
                <div class="card-header bg-primary text-white font-weight-bold">New company details:</div>

                <form method="post" action="{{ route('companies.store') }}" enctype="multipart/form-data">
                    
                    <div class="card-body">

                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="c-logo">Logo (min size 100x100)</label>
                            <input type="file" class="form-control-file" id="c-logo" name="company_logo">
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="form-group">
                            <label for="c-name">Compny Name</label>
                            <input type="text" class="form-control" id="c-name" placeholder="required" name="company_name">
                        </div>
                        <div class="form-group">
                            <label for="c-email">Email address</label>
                            <input type="email" class="form-control" id="c-email" placeholder="optional" name="company_email">
                        </div>
                        <div class="form-group">
                            <label for="c-website">Website</label>
                            <input type="text" class="form-control" id="c-website" placeholder="optional" name="company_website">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection