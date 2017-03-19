@extends('layouts.app')

@section('title', 'Search Results')

@section('content')
    @include('partials.menu')
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <h1>Search Results</h1>
            @include('partials.list')
        </div>
    </div>
@endsection
