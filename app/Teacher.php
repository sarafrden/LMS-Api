<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = "teachers";
    //public $timestamps = false;

    protected $fillable = [

        'name',
        'description',
        'qualifications',
        'phone_number',
    ];

    public function course()
    {
        return $this->hasMany(Coures::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
