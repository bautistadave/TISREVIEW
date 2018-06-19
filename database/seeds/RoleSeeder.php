<?php

use Illuminate\Database\Seeder;
use \App\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create([
            'name'=> 'administrator',
            'display_name'=> 'Administrador',
            'description'=> 'Usuario Administrador',
        ]);
        Role::create([
            'name'=> 'profesional',
            'display_name'=> 'Profesional',
            'description'=> 'Usuario Profesional',
        ]);
        Role::create([
            'name'=> 'auxialiar',
            'display_name'=> 'Auxialiar',
            'description'=> 'Usuario Auxialiar',
        ]);
        Role::create([
            'name'=> 'guest',
            'display_name'=> 'Invitado',
            'description'=> 'Usuario Invitado',
        ]);
    }
}
