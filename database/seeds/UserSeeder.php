<?php

use Illuminate\Database\Seeder;
use \App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'sat umss',
            'email' => 'satumss@umss.edu.bo',
            'password' => bcrypt('password'),
        ]);
    }
}
