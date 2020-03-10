<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings = \App\Listing::all();
        return view('listings.index', compact('listings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $songs = \App\Song::all();
        $keys = \App\Chord::all()->where('key', true)->pluck('name', 'id');
        return view('listings.create', compact('songs', 'keys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('name', 'description');
        $listing = \App\Listing::create($data);

        $songs = $request->input('songs');
        for($i = 0; $i < $songs; $i++){
            $song_id = $request->input('song'.$i);
            $chord_id = $request->input('key'.$i);
            $listing->songs()->attach($song_id, ['key' => $chord_id]);
        }

        return redirect()->route('listings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        $chords = \App\Chord::all()->pluck('name', 'id');
        return view('listings.show', compact('listing', 'chords'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        $songs = \App\Song::all();
        $keys = \App\Chord::all()->where('key', true)->pluck('name', 'id');
        return view('listings.edit', compact('listing', 'songs', 'keys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listing $listing)
    {
        $listing->name = $request->name;
        $listing->description = $request->description;

        $previous_songs = collect($listing->songs->pluck('id'));
        $current_songs = collect([]);

        $songs = $request->input('songs');
        for($i = 0; $i < $songs; $i++){
            $song_id = $request->input('song'.$i);
            $chord_id = $request->input('key'.$i);
            if($previous_songs->search($song_id)){
                // Update chord_id if necessary
            }else{
                $listing->songs()->attach($song_id, ['key' => $chord_id]);
            }
            $current_songs.push($song_id);
        }

        // Remove songs that were unselected  
        foreach($previous_songs->diff($current_songs) as $difference){
            $listing->songs()->detach($difference);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listing $listing)
    {
        //
    }
}
