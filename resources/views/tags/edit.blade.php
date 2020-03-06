@extends('layouts.app')

@section('content')
<div class = "container">
    <div class="row">
        <div class="col s12">
            <h3 class="center-align">Tag registration</h3>
        </div>
    </div>
    <form id="edit-tag" method="post" action="{{route('tags.update', $tag->id)}}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="input-field col s6 offset-s3">
                <i class="material-icons prefix">title</i>
                <input placeholder="Name of the tag" id="name" type="text" name = "name" class="validate" value="{{$tag->name}}">
                <label for="name">Name</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6 offset-s3">
                <i class="material-icons prefix">description</i>
                <textarea placeholder="Description of the tag" id="description" name="description" class="materialize-textarea validate">{{$tag->description}}</textarea>
                <label for="description">Description</label>
            </div>                  
        </div>
        <div class="row center-align">                
            <button id = "btn-edit" class="btn waves-effect waves-light" type="submit">
                Apply changes
            </button>
            <a id = "btn-index" href="{{route('tags.index')}}" class="btn waves-effect waves-light black">
                Return to index
            </a>
        </div>
    </form>
    
    <div class = "row center-align">
        <form id="delete-tag" method = "post" action = "{{route('tags.destroy', $tag->id)}}">
            @csrf
            @method('DELETE')             
            <button id = "btn-delete" class="btn waves-effect waves-light red" type="submit">
                Delete tag
            </button>
        </form>
    </div>
    
</div>

@endsection('content')