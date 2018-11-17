<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = ['description',];

    public function album() 
    {
    	return $this->belongsTo(Album::class, 'album_id', 'id');
    }
}
