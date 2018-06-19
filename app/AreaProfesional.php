<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class AreaProfesional extends Model
{
    //
    protected $table="area_profesional";

    protected $fillable = [
        'id','area_id','profesional_id'
    ];

    public function profesionalTo()
    {
        return $this->belongsTo('App\Profesional');
    }

    public static function getProfesionalByArea($area, $exclude) {
        return DB::table('profesionals')
            ->join('area_profesional','profesionals.id','=','area_profesional.profesional_id')
            ->where('area_profesional.area_id', '=', $area)
            ->whereNotIn('profesionals.id', $exclude)
            -> select('profesionals.*','area_profesional.area_id')->get();
    }

    public static function getProfesionalProjectCount($profesionalId) {
        return DB::table('proyectos')
            ->join('assignments','proyectos.id','=','assignments.proyecto_id')
            ->where('assignments.profesional_id', '=', $profesionalId)
            ->where('proyectos.defended', '=', false)
            -> select('proyectos.*','assignments.proyecto_id')->get();
    }
}
