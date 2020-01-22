<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Q extends Model
{

    protected $table = "q_s";
    public $timestamps = false;

    protected $fillable = [

        'title',
        'purpose',


    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->hasMany(Question::class);
    }
}


