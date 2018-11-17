<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['description'];

    public function user() 
    {
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function journal()
    {
    	return $this->belongsTo(Journal::class, 'journal_id', 'id');
    }
}
