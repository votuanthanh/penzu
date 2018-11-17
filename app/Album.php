<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';
    protected $fillable = [
    	'title',];
    
    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id','id');
    }
}
