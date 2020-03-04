@extends('layouts.app')

@section('content')
<div class = "container">
    <div class="row">
        <div class="col s12 m12">
            <h3 class="center-align">{{$song->name}}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m8 offset-m2">
            <p><b>Lines:</b></p>
            @foreach($song->lines as $line)
                <special-line letters="{{ $line->line }}" :options='{!! json_encode($chords) !!}'></special-line>
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