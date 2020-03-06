@extends('layouts.app')

@section('content')
<div class = "container">
    <div class="row">
        <div class="col s12">
            <h3 class="center-align">Song edition</h3>
        </div>
    </div>
    <form id="edit-song" method="post" action="{{route('songs.update', $song->id)}}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="input-field col s6 offset-s3">
                <i class="material-icons prefix">title</i>
                <input placeholder="Title of the song" id="name" type="text" name = "name" class="validate" value="{{$song->name}}">
                <label for="name">Title</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6 offset-s3">
                <i class="material-icons prefix">music_note</i>
                <simple-select identifier="chord_id" message="Pick a key!" :options='{!! json_encode($chords) !!}' picked='{{$song->chord_id}}'></simple-select>
            </div>                 
        </div>
        <div class="row">
            <div class="input-field col s6 offset-s3">
                <i class="material-icons prefix">tag</i>
                <multiple-select identifier="tag_id" message="Pick one or more tags" :options='{!! json_encode($tags) !!}' :picked='{{$song->tags->pluck("id")}}'></multiple-select>
            </div>                 
        </div>
        <div class="divider"></div>            
        <div class="row">
            <div class="col s12">
                <resource-form :resources='{!! json_encode($song->resources) !!}'></resource-form>
            </div>
        </div>
        <div class="row center-align">                
            <button id = "btn-edit" class="btn waves-effect waves-light" type="submit">
                Apply changes
            </button>
            <a id = "btn-index" href="{{route('songs.cypher', $song->id)}}" class="btn waves-effect waves-light blue">
                Add chords
            </a>
            <a id = "btn-index" href="{{route('songs.index')}}" class="btn waves-effect waves-light black">
                Return to index
            </a>
        </div>
    </form>
    <div class = "row center-align">
        <form id="delete-song" method = "post" action = "{{route('songs.destroy', $song->id)}}">
            @csrf
            @method('DELETE')
            <button id = "btn-delete" class="btn waves-effect waves-light red" type="submit">
                Delete song
            </button>
        </form>
    </div>
</div>

@endsection('content')