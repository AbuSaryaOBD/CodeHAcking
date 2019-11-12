<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $uploads = '/images/';
    protected $guarded=[];

    public function getFileAttribute($value)
    {
        return $this->uploads . $value;
    }
}
