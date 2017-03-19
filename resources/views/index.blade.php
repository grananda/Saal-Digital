@extends('layouts.app')

@section('title', 'All the Objects')

@section('content')
    @include('partials.menu')
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <h1>All the Objects</h1>
            @include('partials.list')
        </div>
    </div>
@endsection
