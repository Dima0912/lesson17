@extends('loyouts.app')
@section('contact')
<div class="container">
    <div class="row juctify-content-center">
        <div class="col-md-12">
            <h3 class="text-center">{{ __('Admin Doshboard') }}</h3>
        </div>
        <div class="col-md-12">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection