<?php
use App\Course;
use App\Video;
use Illuminate\Database\Seeder;

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
        factory(Course::class, 10)->create()->each(function($course){
            $course->videos()->saveMany(factory(Video::class, 10)->make());
        });
    }
}
