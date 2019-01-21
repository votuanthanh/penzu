<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	protected $fillable = ['journal_id', 'user_id', 'description'];
	
    public function user()
  	{
    	return $this->belongsTo('App\User');
  	}

  	 public function journal()
	{
		return $this->belongsTo('App\Journal');
	}
}
