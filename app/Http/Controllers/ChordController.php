<?php

namespace App\Http\Controllers;

use App\Chord;
use Illuminate\Http\Request;

class ChordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chords = \App\Chord::all()->sortBy('name');
        return view('chords.index', compact('chords'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chords.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $keyable = $request->input('key', false);
        $data = $request->only('name');
        $data['key'] = $keyable;
        \App\Chord::create($data);
        return redirect()->route('chords.index');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chord  $chord
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chord $chord)
    {
        $chord->delete();
        return redirect()->route('chords.index');
    }
}
