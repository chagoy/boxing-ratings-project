<?php

namespace Tests\Unit;

use App\Boxer;
use App\Fight;
use App\Promoter;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FightTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function boxers_can_be_added_to_a_fight()
    {
    	$fight = factory(Fight::class)->create();

    	$fight->boxers()->attach([
    		factory(Boxer::class)->create()->id,
    		factory(Boxer::class)->create()->id
    	]);
    
    	$this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $fight->boxers);

    }
}
