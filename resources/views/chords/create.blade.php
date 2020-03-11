@extends('layouts.app')

@section('content')
<div class = "container">
    <div class="row">
        <div class="col s12">
            <h3 class="center-align">Add chord</h3>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <form method="post" action="{{route('chords.store')}}">
                @csrf                
                <div class="row center-align">
                    <div class="col s6 offset-s3">
                        <label>
                            <input id="key" name="key" value="1" type="checkbox">
                            <span>This chord can be a key</span>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 offset-s3">
                        <i class="material-icons prefix">name</i>
                        <input placeholder="Name of the chord" id="name" name="name" type="text" class="validate">
                        <label for="title">Name</label>
                    </div>
                </div>
                <div class="row center-align">                
                    <button id = "btn-register" class="btn waves-effect waves-light" type="submit">
                        Register chord
                    </button>
                    <a id = "btn-index" href="{{route('chords.index')}}" class="btn waves-effect waves-light black">
                        Return to index
                    </a>
                </div>
            </form>       
        </div>
    </div>
</div>

@endsection('content')