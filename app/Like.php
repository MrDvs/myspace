<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function liker()
    {
    	return $this->belongsTo('App\User');
    }
    
    public function liked_user()
    {
    	return $this->belongsTo('App\User');
    }
}
