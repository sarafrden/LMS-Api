<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = "courses";
    //public $timestamps = false;

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
    public function Teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    public function Card()
    {
        return $this->hasMany(Card::class);
    }
}
