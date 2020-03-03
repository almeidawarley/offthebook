@extends('layouts.app')

@section('content')
<div class = "container">
    <div class="row">
        <div class="col s12 m12">
            <h3 class="center-align">{{$song->name}}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m4 offset-m2">
            <p><b>Key:</b> {{$song->chord->name}}</p>
            <p><b>Tags:</b></p>
            <ul class = "collection">
                @forelse($song->tags as $tag)
                    <li class="collection-item">{{$tag->name}}</li>
                @empty
                    <li class="collection-item">No tags</li>
                @endforelse
            </ul>
            <p><b>Resources:</b></p>
            <ul class = "collection">
                @forelse($song->resources as $resource)
                    <li class="collection-item">
                        {{$resource->description}}
                        ({{$resource->format}})
                        <a href="{{$resource->path}}">
                            <i class="material-icons">link</i>
                        </a>
                    </li>
                @empty
                    <li class="collection-item">No resources</li>
                @endforelse
            </ul>
        </div>
        <div class="col s12 m4">
            <p><b>Lines:</b>
            @foreach($song->lines as $line)
                <p>{{$line->line}}</p>
            @endforeach      
        </div>
    </div>
    <div class = "row center-align">
        <div class = "col s12 m6 offset-m3">
            <a id = "btn-index" href="{{route('songs.index')}}" class="btn waves-effect waves-light black">
                Return to index
            </a>
        </div>
    </div>
</div>

@endsection('content')