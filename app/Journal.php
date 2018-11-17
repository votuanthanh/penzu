<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $table = 'journals';
    protected $fillable = ['title', 'description',];

    public function comments()
    {
    	return $this->hasMany('\App\Comment');
    }

    public function users()
    {
    	return $this->belongsToMany('\App\User');
    }

    public function tags()
    {
    	return $this->belongsToMany('\App\Tag');
    }
}