@extends('layouts.app')

@section('content')
<div class = "container">

    
    <div class= "row center-align">
        <div class= "col s12 m12">
            <h3>Tag index</h3>
        </div>
    </div>

    <div class= "row">
        <div class= "col s6 m6 offset-m3">
            <table class="striped centered responsive-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tags as $tag)
                        <tr>
                            <td>
                                {{$tag->name}}
                            </td>
                            <td>
                                {{$tag->description}}
                            </td>
                            <td>
                                <a href="{{route('tags.show', $tag->id)}}"><i class="material-icons">list</i></a>
                                <a href="{{route('tags.edit', $tag->id)}}"><i class="material-icons">edit</i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>
                                No tags
                            </td>
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
            <a href="{{route('tags.create')}}" class="btn waves-effect waves-light">Add tag</a>
        </div>
    </div>

</div>
@endsection('content')