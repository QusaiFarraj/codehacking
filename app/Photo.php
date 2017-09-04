<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //

    protected $uploadLink = "/images/";

    protected $fillable= [

        'file',

        ];



    public function getFileAttribute($photo){

        return $this->uploadLink .$photo;

    }
}
