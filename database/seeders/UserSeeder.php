<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'spock',
            'email' => 'spock@gmail.com',
            'password' =>  bcrypt('password'),
            'created_at' =>  \Carbon\Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'truus',
            'email' => 'truus@gmail.com',
            'password' =>  bcrypt('1234'),
            'created_at' =>  \Carbon\Carbon::now(),
        ]);
    }
}
