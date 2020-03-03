<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = [
        'name', 'chord_id'
    ];

    public function chord(){
        return $this->belongsTo('App\Chord');
    }

    public function lines(){
        return $this->hasMany('App\Line');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function resources(){
        return $this->hasMany('App\Resource');
    }
}
