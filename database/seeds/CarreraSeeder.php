<?php

use Illuminate\Database\Seeder;
use \App\Carrera;
class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Carrera::create([
            'code'=>'123',
            'namecarre'=>'Ingenieria de Sistemas',

        ]);
        Carrera::create([

            'code'=>'124',
            'namecarre'=>'Ingenieria Industrial',

        ]);
        Carrera::create([
            'code'=>'125',
            'namecarre'=>'Ingenieria Quimica',

        ]);
        Carrera::create([
            'code'=>'126',
            'namecarre'=>'Ingenieria Civil',

        ]);
        Carrera::create([
            'code'=>'127',
            'namecarre'=>'Ingenieria Civil',

        ]);
        Carrera::create([
            'code'=>'128',
            'namecarre'=>'Ingenieria Electronica',

        ]);
    }
}
