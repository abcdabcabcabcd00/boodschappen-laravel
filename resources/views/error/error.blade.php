@extends('layouts.app')

@section('title', 'Error')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Error') }}</div>

                <div class="card-body">
                    <h2 class="text-danger">{{ $error }}</h2>
                    <p class="lead">{{ $description }}</p>
                    <hr>
                    <p>Sorry, there was an error processing your request. Please try again later or contact support.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection