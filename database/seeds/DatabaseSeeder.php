<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\Category;
use App\Model\Question;
use App\Model\Replay;
use App\Model\Like;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(User::class,10)->create();
        factory(Category::class,5)->create();
        factory(Question::class,10)->create();
        factory(Replay::class,50)->create()->each(function($replay){
          return $replay->like()->save(factory(Like::class)->make());
        });
    }
}
