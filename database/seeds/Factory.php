<?php

use App\Post;
use Illuminate\Database\Seeder;

class Factory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory('PostFactory','50')->create();
       $post =  factory(App\Post::class, 50)->create()->each(function ($post) {

             
                // Create Pivot with Parameters
                $post->category()->attach(rand(1,5));
                $post->tags()->attach(rand(1,5));

            });

    
    }
}
