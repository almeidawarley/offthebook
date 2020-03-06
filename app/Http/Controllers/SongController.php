<?php

namespace App\Http\Controllers;

use App\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = \App\Song::all();
        return view('songs.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chords = \App\Chord::all()->where('key', true);
        $tags = \App\Tag::all();
        return view('songs.create', compact('chords', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('name', 'chord_id');
        $song = \App\Song::create($data);

        $lines = $request->input('lines');
        $lines = preg_split('/\r\n|\r|\n/', $lines);
        foreach($lines as $line){
            if($line != ""){
                $song->lines()->create(['line' => $line]);
            }
        }

        $tags = $request->input('tag_id');
        foreach($tags as $tag){
            $song->tags()->attach($tag);
        }

        $resources = $request->input('resources');
        for($i = 0; $i < $resources; $i++){
            $song->resources()->create([
                'path' => $request->input('path' . $i),
                'description' => $request->input('description' . $i)
            ]);
        }

        return redirect()->route('songs.cypher', $song->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        $chords = \App\Chord::all()->pluck("name","id");
        return view('songs.show', compact('song', 'chords'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        $chords = \App\Chord::all()->where('key', true);
        $tags = \App\Tag::all();
        return view('songs.edit', compact('song', 'chords', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {
        $song->name = $request->name;
        $song->chord_id = $request->chord_id;
        $song->save();

        // Analyze differences between tags
        $previous_tags = collect($song->tags()->pluck('tag_id'));
        $current_tags = collect($request->input('tag_id'));
        // Remove those that were unselected        
        foreach($previous_tags->diff($current_tags) as $difference){
            $song->tags()->detach($difference);
        }
        // Add those that were just selected
        foreach($current_tags->diff($previous_tags) as $difference){
            $song->tags()->attach($difference);
        }

        $previous_resources = collect($song->resources()->pluck('id'));
        $current_resources = [];
        $resources = $request->input('resources');
        for($i = 0; $i < $resources; $i++){
            $flag = $request->input('new' . $i, false);
            $current_id = $request->input('id' . $i);
            // Check if resource was added or edited
            if($flag){
                // Edited if part of the previous set of resources
                if($previous_resources->contains($current_id)){
                    $resource = \App\Resource::find($current_id);
                    $resource->fill([
                        'path' => $request->input('path' . $i),
                        'description' => $request->input('description' . $i)
                    ]);
                    $resource->save();
                    array_push($current_resources, $current_id);
                }
                // Added if the id is not previously known
                else{
                    $added = $song->resources()->create([
                        'path' => $request->input('path' . $i),
                        'description' => $request->input('description' . $i)
                    ]);
                    array_push($current_resources, $added->id);
                }
            }else{
                // Even if not modified, ID remains part of the current resources
                array_push($current_resources, $current_id);
            }
        }

        // All resources that do not appear in the request should be removed
        $current_resources = collect($current_resources);
        foreach($previous_resources->diff($current_resources) as $difference){            
            $deleted = \App\Resource::find($difference);
            $deleted->delete();
        }

        return redirect()->route('songs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        $song->delete();
        return redirect()->route('songs.index');        
    }

    public function cypher(Song $song)
    {
        // Generate a dictionary where each chord name is hashed by the ID
        $chords = \App\Chord::all()->pluck("name","id");
        return view('songs.cypher', compact('song', 'chords'));
    }

    public function conclude(Request $request, Song $song)
    {
        // Erase all chords relationships from all lines
        foreach($song->lines as $line){
            foreach($line->chords as $chord){
                $line->chords()->detach($chord->id);
            }
        }

        // Go through input field, and analyze those following the pattern
        foreach($request->all() as $key => $element){
            if(preg_match('/[0-9]+at[0-9]+/', $key)){
                $info = explode('at', $key);
                $line_id = intval($info[0]);
                $line_at = intval($info[1]);
                $chord_id = $request->input($key);
                
                $line = \App\Line::find($line_id);
                $line->chords()->attach($chord_id, ['at' => $line_at]);
            }
        }
        return redirect()->route('songs.index');        
    }
}
