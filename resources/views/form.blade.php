@extends('layouts.app')

@section('title', $action == 'create' ? 'Create New Object' : 'Edit Object' )

@section('content')
    @include('partials.menu')
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <h1>{{ $action == 'create' ? 'Create New Object' : 'Edit Object' }}</h1>
            <form method="POST" action="{{ $action == 'create' ? '/objects' :  '/objects/'.$objectItem->id }}">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if ($action == 'create')
                    <input type="hidden" name="_method" value="POST">
                @else
                    <input type="hidden" name="_method" value="PATCH">
                @endif
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="name">Object name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Object name"
                           value="{{  old('name')? old('name'):$objectItem->name  }}">
                </div>
                <div class="form-group">
                    <label for="name">Object type</label>
                    <input type="text" id="type" name="type" class="form-control" placeholder="Object type"
                           value="{{ old('type')? old('type'):$objectItem->type }}">
                </div>
                <div class="form-group">
                    <label for="name">Object description</label>
                    <textarea class="form-control" rows="3" id="description"
                              name="description">{{ old('description')? old('description'):$objectItem->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-default">Save</button>
            </form>
        </div>
    </div>
@endsection
