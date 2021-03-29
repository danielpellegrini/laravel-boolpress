<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Author;
use App\AuthorDetail;


class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for($i = 0; $i < 10; $i++) {

            $author = new Author();
            $author->name = $faker->firstName();
            $author->lastname = $faker->lastName();
            $author->email = $faker->email();
            $author->save();

            $authorDetail = new AuthorDetail();
            $authorDetail->bio = $faker->text();
            $authorDetail->website = $faker->url();
            $authorDetail->pic = 'https://picsum.photos/seed/' . rand(0, 1000) .  '/200/300';

            $author->detail()->save($authorDetail);
        }
    }
}
