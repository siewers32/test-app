<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([
            'title' => 'Tokyo Story',
            'year' => 1953,
            'created_at' =>  \Carbon\Carbon::now(),
        ]);
        DB::table('movies')->insert([
            'title' => 'Sunrise',
            'year' => 1927,
            'created_at' =>  \Carbon\Carbon::now(),
        ]);
        DB::table('movies')->insert([
            'title' => 'A Space Odyssey',
            'year' => 1968,
            'created_at' =>  \Carbon\Carbon::now(),
        ]);
        DB::table('movies')->insert([
            'title' => 'The Searchers',
            'year' => 1956,
            'created_at' =>  \Carbon\Carbon::now(),
        ]);
        DB::table('movies')->insert([
            'title' => 'Man With a Movie Camera',
            'year' => 1927,
            'created_at' =>  \Carbon\Carbon::now(),
        ]);
    }
}
