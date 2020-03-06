@extends('layouts.app')

@section('content')
<div class = "container">

    
    <div class= "row center-align">
        <div class= "col s12 m12">
            <h3>Listing index</h3>
        </div>
    </div>

    <div class= "row">
        <div class= "col s8 m8 offset-m2">
            <table class="striped centered responsive-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Updated at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($listings as $listing)
                        <tr>
                            <td>
                                {{$listing->name}}
                            </td>
                            <td>
                                {{$listing->description}}
                            </td>
                            <td>
                                {{$listing->updated_at}}
                            </td>
                            <td>
                                <a href="{{route('listings.show', $listing->id)}}"><i class="material-icons">list</i></a>
                                <a href="{{route('listings.edit', $listing->id)}}"><i class="material-icons">edit</i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>
                                No listings
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
            <a href="{{route('listings.create')}}" class="btn waves-effect waves-light">Add listing</a>
        </div>
    </div>

</div>
@endsection('content')