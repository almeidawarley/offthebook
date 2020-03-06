<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chord extends Model
{
    protected $fillable = [
        'name', 'key'
    ];

    public function songs(){
        return $this->hasMany('App\Song');
    }

    public function lines(){
        return $this->belongsToMany('App\Line');
    }
}
