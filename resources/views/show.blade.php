@extends('layouts.app')

@section('title', 'Search Results')

@section('content')
    @include('partials.menu')
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <h1>{{ $objectItem->name }} - <i>({{ $objectItem->type }})</i></h1>
            <p>{{ $objectItem->description }}</p>
            @include('partials.action', ['item' => $objectItem])
            @if (!$objectItem->children->isEmpty())
                <h2>Related Objects</h2>
                <ul>
                    @foreach ($objectItem->children as $item)
                        <li>
                            <a href="/objects/{{ $item->id }}">{{ $item->name }} - <i>({{ $item->type }})</i></a>
                            <p>{{ $item->description }}</p>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
