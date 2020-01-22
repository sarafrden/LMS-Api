<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "questions";
    public $timestamps = false;

    protected $fillable = [

        'question',


    ];

    public function Q()
    {
        return $this->belongsTo(Q::class);
    }

    public function Answer()
    {
        return $this->hasMany(Answer::class);
    }
}
