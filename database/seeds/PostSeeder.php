<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Author;
use App\AuthorDetail;
use App\Post;
use App\Comment;



class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for($i = 0; $i < 10; $i++) {

            // Author

            $author = new Author();
            $author->name = $faker->firstName();
            $author->lastname = $faker->lastName();
            $author->email = $faker->email();
            $author->save();

            // Author details

            $authorDetail = new AuthorDetail();
            $authorDetail->bio = $faker->text();
            $authorDetail->website = $faker->url();
            $authorDetail->pic = 'https://picsum.photos/seed/' . rand(0, 1000) .  '/200/300';

            $author->detail()->save($authorDetail);

            // Posts

            for ($p = 0; $p < rand(2, 5); $p++) {
                $post = new Post();
                $post->title = $faker->text(20);
                $post->body = $faker->text(1000);
                $author->posts()->save($post);
            }

            // Comments

            for ($c = 0; $c < rand(2, 5); $c++) {
                $comment = new Comment();
                $comment->comment = $faker->text();
                $comment->posted_on = $faker->datetime();
                $post->comments()->save($comment);
            }

        }
    }
}
