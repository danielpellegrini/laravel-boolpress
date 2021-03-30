<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['sport', 'football', 'tech', 'gossip', 'economy', 'healt', 'science'];

        foreach ($tags as $tag) {
            $tagDB = new Tag();
            $tagDB->name = $tag;
            $tagDB->save();
        }
    }

}
