<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Boxer::class, 10)->create();
        factory(\App\Location::class, 5)->create();
        factory(\App\Promoter::class, 5)->create();
        factory(\App\Network::class, 5)->create();
        
        $fights = factory(\App\Fight::class, 5)->create();

        foreach ($fights as $fight) {
        	$fight->boxers()->attach([
        		factory(\App\Boxer::class)->create()->id,
        		factory(\App\Boxer::class)->create()->id
        	]);
        }
    }
}
