<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Subscriber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all posts to get the random id
        $posts = Post::all();

        // If there are no posts
        if($posts->count() === 0 ){
            $this->command->info("There are no posts, so no subscriber will be added");
            return;
        }

        // Create 100 subscribers for random posts
        Subscriber::factory(100)
            ->make()
            ->each(function($subscriber) use ($posts){
                $subscriber->post_id = $posts->random()->id;
                $subscriber->save();
            });
    }
}
