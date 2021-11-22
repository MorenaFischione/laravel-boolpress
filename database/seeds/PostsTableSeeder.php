<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use App\Models\Post;
use App\User;
use App\Models\Category;
use Faker\Generator as Faker;



class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        //funzione che crea array presa da una collection già esistende fatta sugli id. Ci sa la lista di tutti gli id.
        $category_ids = Category::pluck('id')->toArray();
        // $tag_ids= Tag::pluck('id')->toArray();
        // $user_ids = User::pluck('id')->toArray();

        for ($i= 0; $i<50; $i++) {
            $newPost = new Post();

            $newPost->title = $faker->words(5, true);
            $newPost->author = $faker->name;
            // $newPost->author = Arr::random($user_ids);
            $newPost->post_date = $faker->dateTime;
            $newPost->post_content = $faker->paragraph(5, true);
        
            $newPost->category_id = Arr::random($category_ids);

            $newPost->slug = Str::slug($newPost->title, '-');
            $newPost->save();

            // $newPost->tags()->attach($)

        }
    }
}
