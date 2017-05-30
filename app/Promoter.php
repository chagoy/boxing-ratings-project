<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promoter extends Model
{
	protected $guarded = [];
	
	protected $with = ['cards', 'boxers'];

	public function getRouteKeyName()
	{
		return 'slug';
	}

    public function cards()
    {
    	return $this->hasMany(Card::class);
    }
    
    public function boxers()
    {
    	return $this->hasMany(Boxer::class);
    }
}
