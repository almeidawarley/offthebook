@extends('layouts.app')

@section('content')
<div class = "container">
    <div class= "row">

        <div class= "col s12 m12">
            @forelse($resources as $resource)
                <h1>{{$resource->description}}</h1>
            @empty
                <h1>No resources</h1>
            @endforelse
        </div>

    </div>
</div>
@endsection('content')