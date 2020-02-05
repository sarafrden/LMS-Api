<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    //public $timestamps = false;

    protected $fillable = [

        'name',


    ];



    public function Courses()
    {
        return $this->hasMany(Courses::class);
    }
}
