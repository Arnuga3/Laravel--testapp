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
                <div class="card-header">
                    <span class="lnr lnr-paperclip"></span>
                    Update qualification details:
                </div>
            
                <form method="post" action="{{ route('qualifications.update', ['id' => $qualification->id]) }}">
                    @csrf
                    @method('PUT')

                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="q-title">Email</label>
                            <input type="text" class="form-control" id="q-title" placeholder="required" name="qualifications_title" value="{{ $qualification->title }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection