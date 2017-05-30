<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
	protected $fillable = ['name', 'slug'];

    public function cards()
    {
    	return $this->hasMany(Card::class);
    }
}
