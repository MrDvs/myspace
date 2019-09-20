<?php

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
    	for($i = 1; $i <= 10; $i++) {
	        DB::table('users')->insert([
	            'username' => Str::random(10),
	            'first_name' => Str::random(10),
	            'last_name' => Str::random(10),
	            'zipcode' => Str::random(6),
	            'city' => Str::random(10),
	            'street' => Str::random(10),
	            'house_number' => 5,
	            'email' => Str::random(10).'@gmail.com',
	            'password' => bcrypt('password'),
	            'profile_pic_path' => '5d834b8b5376c.jpg',
	            'relationship_status' => "It's complicated",
	        ]);
	    }
    }
}
