@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <a class="btn btn-light mb-3" href="{{ route('qualifications.index') }}">
                <span class="lnr lnr-chevron-left pr-2"></span>
                Go back
            </a>
            
            <div class="card">
                <div class="card-header">New qualification details:</div>

                <form method="post" action="{{ route('qualifications.store') }}">
                    @csrf
                    @method('POST')
                    
                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="q-title">Title</label>
                            <input type="text" class="form-control" id="q-title" placeholder="required" name="qualifications_title">
                        </div>
                         
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection