<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
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
        for ($i= 0; $i<50; $i++) {
            $newPost = new Post();

            $newPost->title = $faker->words(5, true);
            $newPost->author = $faker->name;
            $newPost->post_date = $faker->dateTime;
            $newPost->post_content = $faker->paragraph(5, true);

            $newPost->slug = Str::slug($newPost->title, '-');
            $newPost->save();

        }
    }
}
