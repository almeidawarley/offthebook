<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    protected $fillable = [
        'line', 'song_id'
    ];

    public function song(){
        return $this->belongsTo('App\Song');
    }

    public function chords(){
        return $this->belongsToMany('App\Chord');
    }
}
