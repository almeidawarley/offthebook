<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{

    protected $fillable = [
        'description', 'format', 'path'
    ];

    public function song(){
        return $this->belongsTo('App\Song');
    }

}
