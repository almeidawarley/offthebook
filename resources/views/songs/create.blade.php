@extends('layouts.app')

@section('content')
<div class = "container">
    <div class="row">
        <div class="col s12">
            <h3 class="center-align">Song registration</h3>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <form method="post" action="{{route('songs.store')}}">
                @csrf
                <div class="row">
                    <div class="input-field col s6 offset-s3">
                        <i class="material-icons prefix">title</i>
                        <input placeholder="Title of the song" id="name" name="name" type="text" class="validate">
                        <label for="name">Title</label>
                    </div>
                </div>
                
                <div class="divider"></div>
                <div class="row">
                    <div class="input-field col s6 offset-s3">
                        <i class="material-icons prefix">music_note</i> 
                        <simple-select identifier="chord_id" message="Pick a key!" :options='{!! json_encode($chords) !!}' ></simple-select>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 offset-s3">
                        <i class="material-icons prefix">tag</i> 
                        <multiple-select identifier="tag_id" message="Pick one or more tags" :options='{!! json_encode($tags) !!}' :picked='[]'></multiple-select>
                    </div>
                </div>

                <div class="divider"></div>            
                <div class="row">
                    <div class="col s12">
                        <resource-form></resource-form>
                    </div>
                </div>

                <div class="divider"></div>
                <div class="row">
                    <div class="input-field col s10 offset-s1">
                        <i class="material-icons prefix">list</i>
                        <textarea placeholder="Lyrics of the song" id="lines" name="lines" class="materialize-textarea validate"></textarea>
                        <label for="lines">Lines</label>
                        <b class="center-align">Make sure to separate lines by typing enter</b>
                    </div>                  
                </div>    
                
                <div class="row center-align">                
                    <button id = "btn-register" class="btn waves-effect waves-light" type="submit">
                        Add song
                    </button>
                    <a id = "btn-index" href="{{route('songs.index')}}" class="btn waves-effect waves-light black">
                        Return to index
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection('content')