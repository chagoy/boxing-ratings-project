<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $guarded = [];

    protected $with = ['network'];

	public function fights()
	{
		return $this->hasMany(Fight::class);
	}

    public function addFight($fight)
    {
    	return $this->fights()->create($fight);
    }

    public function network()
    {
    	return $this->belongsTo(Network::class);
    }

    public function promoter()
    {
    	return $this->belongsTo(Promoter::class);
    }

    public function location()
    {
    	return $this->belongsTo(Location::class);
    }
}
