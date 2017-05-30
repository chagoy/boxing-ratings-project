<?php

namespace Tests\Unit;

use App\Boxer;
use App\Promoter;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BoxerTest extends TestCase
{
	use DatabaseTransactions;

	/** @test */
    public function a_boxer_can_be_created()
    {
    	$boxer = factory(Boxer::class)->create();
    	$this->assertTrue(!! $boxer->name);
    }

    /** @test */
    public function a_boxer_has_a_promoter()
    {
        $promoter = factory(Promoter::class)->create();

        $boxer = factory(Boxer::class)->create([
            'promoter_id' => $promoter->id
        ]);
        
        $this->assertEquals($promoter->id, $boxer->promoter_id);
    }


}
