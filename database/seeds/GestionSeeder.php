<?php

use Illuminate\Database\Seeder;
use \App\Gestion;
use Carbon\Carbon;
class GestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Gestion::create([
            'start_date'=> Carbon::now(),
            'end_date'=>Carbon::now(),
            'name_gestion'=>'Gestion 01-2014',
        ]);
        Gestion::create([
            'start_date'=> Carbon::now(),
            'end_date'=>Carbon::now(),
            'name_gestion'=>'Gestion 02-2014',
        ]);
        Gestion::create([
            'start_date'=> Carbon::now(),
            'end_date'=>Carbon::now(),
            'name_gestion'=>'Gestion 01-2015',
        ]);
        Gestion::create([
            'start_date'=> Carbon::now(),
            'end_date'=>Carbon::now(),
            'name_gestion'=>'Gestion 02-2015',
        ]);
        Gestion::create([
            'start_date'=> Carbon::now(),
            'end_date'=>Carbon::now(),
            'name_gestion'=>'Gestion 01-2016',
        ]);
        Gestion::create([
            'start_date'=> Carbon::now(),
            'end_date'=>Carbon::now(),
            'name_gestion'=>'Gestion 02-2016',
        ]);
        Gestion::create([
            'start_date'=> Carbon::now(),
            'end_date'=>Carbon::now(),
            'name_gestion'=>'Gestion 01-2017',
        ]);
        Gestion::create([
            'start_date'=> Carbon::now(),
            'end_date'=>Carbon::now(),
            'name_gestion'=>'Gestion 02-2017',
        ]);
        Gestion::create([
            'start_date'=> Carbon::now(),
            'end_date'=>Carbon::now(),
            'name_gestion'=>'Gestion 01-2018',
        ]);
    }
}
