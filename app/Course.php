<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = "courses";
    public $timestamps = false;

    protected $fillable = [

        'title',
        'description',
        'rating',
        'category',
        'price',
        'product_id',
        'plan_id'
    ];

    public function videos()
    {
        return $this->hasMany(Video::class)->orderBy('episode_number', 'asc');
    }
}
