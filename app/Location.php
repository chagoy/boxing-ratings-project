<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
	protected $fillable = ['venue', 'city', 'state', 'country', 'slug'];

    public function cards()
    {
    	return $this->hasMany(Card::class);
    }

    public function network()
    {
    	return $this->belongsTo(Network::class);
    }
}
