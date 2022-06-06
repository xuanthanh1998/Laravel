<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author1 = User::where('email', 'pv1@allaravel.dev')->first();
        $author2 = User::where('email', 'pv2@allaravel.dev')->first();
        $faker = Faker\Factory::create();
        for ($i=0; $i < 10; $i++) { 
          $title = $faker->sentence($nbWords = 6, $variableNbWords = true);
          $post = Post::create([
              'title' => $title, 
              'body' => $faker->text($maxNbChars = 1000),
              'slug' => str_slug($title),
              'published' => rand(0,1),
              'user_id' => $author1->id
          ]);
          $title = $faker->sentence($nbWords = 6, $variableNbWords = true);
          $post = Post::create([
              'title' => $title, 
              'body' => $faker->text($maxNbChars = 1000),
              'slug' => str_slug($title),
              'published' => rand(0,1),
              'user_id' => $author2->id
          ]);
        }
    }
}
