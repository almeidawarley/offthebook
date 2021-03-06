@extends('layouts.app')

@section('content')
<div class = "container">
    <div class="row">
        <div class="col s12">
            <h3 class="center-align">#{{$tag->name}}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col s6 offset-s3">
            <p><b>Description:</b> {{$tag->description}}</p>            
        </div>
    </div>
    <div class="row">
        <div class="col s6 offset-s3">
            <ul class="collection">
                @forelse($tag->songs as $song)
                    <li class="collection-item">
                        <a href="{{route('songs.show', $song->id)}}">{{$song->name}}</a>
                    </li>
                @empty
                    <li class="collection-item">
                        No songs for this tag. Add one <a href="{{route('songs.create')}}">here</a>!
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
    <div class = "row center-align">
        <div class = "col s6 offset-s3">
            <a id = "btn-index" href="{{route('tags.index')}}" class="btn waves-effect waves-light black">
                Return to index
            </a>
        </div>
    </div>
</div>

@endsection('content')