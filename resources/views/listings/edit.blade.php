@extends('layouts.app')

@section('content')
<div class = "container">
    <div class="row">
        <div class="col s12">
            <h3 class="center-align">Listing registration</h3>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <form method="post" action="{{route('listings.store')}}" autocomplete="off">
                @csrf
                <div class="row">
                    <div class="input-field col s6 offset-s3">
                        <i class="material-icons prefix">title</i>
                        <input placeholder="Title of the listing" id="name" name="name" type="text" class="validate" value="{{$listing->name}}">
                        <label for="name">Title</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6 offset-s3">
                        <i class="material-icons prefix">description</i>
                        <input placeholder="Description of the listing" id="description" name="description" type="text" class="validate" value="{{$listing->description}}">
                        <label for="name">Description</label>
                    </div>
                </div>

                <div class="divider"></div>
                <song-form :ichoices='{!! json_encode($listing->songs->pluck("id")) !!}' :songs='{!! json_encode($songs) !!}' :keys='{!! json_encode($keys) !!}'></song-form>
                                
                <div class="row center-align">                
                    <button id = "btn-register" class="btn waves-effect waves-light" type="submit">
                        Add listing
                    </button>
                    <a id = "btn-index" href="{{route('listings.index')}}" class="btn waves-effect waves-light black">
                        Return to index
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection('content')