<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Product::factory(10)->create();
        \App\Models\Campaign::factory(10)->create();
        \App\Models\Group::factory(10)->create();
        \App\Models\Citie::factory(10)->create();

        $products = \App\Models\Product::all();

        \App\Models\Campaign::all()->each(function($campaign) use ($products){
            $campaign->products()->attach(
                $products->random(rand(1,3))->pluck('id')->toArray(), ['product_discount' =>  rand(5,30)]
            
            );
        });

    }
}
