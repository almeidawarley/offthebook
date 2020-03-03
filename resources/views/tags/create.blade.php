@extends('layouts.app')

@section('content')
<div class = "container">
    <div class="row">
        <div class="col s12">
            <h3 class="center-align">Tag registration</h3>
        </div>
    </div>
    <form id="register-tag" method="post" action="{{route('tags.store')}}">
        @csrf
        @method('POST')
        <div class="row">
            <div class="input-field col s6 offset-s3">
                <i class="material-icons prefix">title</i>
                <input placeholder="Name of the tag" id="name" type="text" name = "name" class="validate">
                <label for="name">Name</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6 offset-s3">
                <i class="material-icons prefix">description</i>
                <textarea placeholder="Description of the tag" id="description" name="description" class="materialize-textarea validate"></textarea>
                <label for="description">Description</label>
            </div>                  
        </div>
        <div class="row center-align">                
            <button id = "btn-register" class="btn waves-effect waves-light" type="submit">
                Register tag
            </button>            
            <a id = "btn-index" href="{{route('tags.index')}}"class="btn waves-effect waves-light black">
                Return to index
            </a>
        </div>
    </form>
</div>

@endsection('content')