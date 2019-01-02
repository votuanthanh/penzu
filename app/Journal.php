<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $table = 'journals';
    protected $fillable = ['title', 'description',];

    public function comments()
    {
    	return $this->hasMany('\App\User', 'comments', 'journal_id', 'user_id');
    }

    public function user()
    {
    	return $this->belongsTo('\App\User');
    }

    public function tags()
    {
    	return $this->belongsToMany('\App\Tag', 'journal_tag');
    }
}