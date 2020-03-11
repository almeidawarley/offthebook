@extends('layouts.app')

@section('content')
<div class = "container">

    
    <div class= "row center-align">
        <div class= "col s12 m12">
            <h3>Chord index</h3>
        </div>
    </div>

    <div class= "row">
        <div class= "col s8 m8 offset-m2">
            <table class="striped centered responsive-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Can it be a key?</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($chords as $chord)
                        <tr>
                            <td>
                                {{$chord->name}}
                            </td>
                            <td>
                                @if($chord->key)
                                    Yes
                                @else
                                    No
                                @endif
                            </td>
                            <td>
                                <form method="post" action="{{route('chords.destroy', $chord->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn waves-effect waves-light red" type="submit"><i class="material-icons">delete</i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>
                                No chords
                            </td>
                            <td>-</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="row center-align">
        <div class = "col s6 m6 offset-m3">
            <a href="{{route('chords.create')}}" class="btn waves-effect waves-light">Add chord</a>
        </div>
    </div>

</div>
@endsection('content')