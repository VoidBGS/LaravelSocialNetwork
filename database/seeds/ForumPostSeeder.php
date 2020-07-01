<?php

use Illuminate\Database\Seeder;
use App\ForumPost;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ForumPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         for ($i=0; $i <= 10; $i++) { 
            $name = Str::random(10);
            $object = new ForumPost();
            $object->topic = Str::random(25);
            $object->content = Str::random(300);
            $object->posted_by = $name;
            $object->last_post_on = Carbon::now();
            $object->last_post_by = $name;
            $object->save();
        }
    }
}
