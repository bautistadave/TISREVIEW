<?php

use Illuminate\Database\Seeder;
use \App\Modalidad;
class ModalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Modalidad::create([
            'code'=>'123',
            'namemodal'=>'Tesis',
        ]);
        Modalidad::create([
            'code'=>'124',
            'namemodal'=>'Proyecto de Grado',
        ]);
        Modalidad::create([
            'code'=>'125',
            'namemodal'=>'Trabajo Dirigido',
        ]);
    }
}
