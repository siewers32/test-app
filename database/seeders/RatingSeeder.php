<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (DB::table('users')->get() as $user) {
            foreach(DB::table('movies')->get() as $movie) {
                DB::table('ratings')->insert([
                    'user_id' => $user->id,
                    'movie_id' => $movie->id,
                    'rating' => random_int(1,5),
                    'created_at' => \Carbon\Carbon::now(),
                ]);
            }
        }
    }
}
