@extends('layouts.app')

@section('content')
<div class = "container">

    
    <div class= "row center-align">
        <div class= "col s12 m12">
            <h3>Song index</h3>
        </div>
    </div>

    <div class= "row">
        <div class= "col s8 m8 offset-m2">
            <table class="striped centered responsive-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Tone</th>
                        <th>Updated at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($songs as $song)
                        <tr>
                            <td>
                                {{$song->name}}
                            </td>
                            <td>
                                {{$song->chord->name}}
                            </td>
                            <td>
                                {{$song->updated_at}}
                            </td>
                            <td>
                                <a href="{{route('songs.cypher', $song->id)}}"><i class="material-icons">queue_music</i></a>
                                <a href="{{route('songs.show', $song->id)}}"><i class="material-icons">list</i></a>
                                <a href="{{route('songs.edit', $song->id)}}"><i class="material-icons">edit</i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>
                                No songs
                            </td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="row center-align">
        <div class = "col s6 m6 offset-m3">
            <a href="{{route('songs.create')}}" class="btn waves-effect waves-light">Add song</a>
        </div>
    </div>

</div>
@endsection('content')