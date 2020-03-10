<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public function songs(){
        return $this->belongsToMany('App\Song')->withPivot('key');
    }
    
}
