@extends('layouts.app')

@section('content')
<div class = "container">
    <div class="row">
        <div class="col s12 m12">
            <h3 class="center-align">{{$song->name}}</h3>
            
        </div>
    </div>
    <form id="edit-song" method="post" action="{{route('songs.conclude', $song->id)}}">
        <div class="row">
            <div class="col s12 m8 offset-m2">
                <p><b>Lines:</b></p>
                    @csrf
                    @method('PUT')
                    @foreach($song->lines as $line)
                        <special-line identifier="{{ $line->id }}" :choices='{!! json_encode($line->choices) !!}' phrase="{{ $line->line }}" :chords='{!! json_encode($chords) !!}'></special-line>
                    @endforeach
            </div>
        </div>
        <div class = "row center-align">
            <div class = "col s12 m6 offset-m3">
                <button id = "btn-edit" class="btn waves-effect waves-light" type="submit">
                    Apply changes
                </button>
                <a id = "btn-index" href="{{route('songs.index')}}" class="btn waves-effect waves-light black">
                    Return to index
                </a>
            </div>
        </div>
    </form> 
</div>

@endsection('content')