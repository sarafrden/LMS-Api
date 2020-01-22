<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = "videos";
    public $timestamps = false;

    protected $fillable = [

        'title',
        'description',
        'data',
        'episode_number',

    ];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}
