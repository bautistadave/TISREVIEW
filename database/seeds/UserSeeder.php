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
            'surname' => 'sat umss',
            'phone' => '79703161',
            'email' => 'satumss@umss.edu.bo',
            'password' => bcrypt('password'),
        ]);
    }
}
