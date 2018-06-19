<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Assignment extends Model
{
    protected $table='assignments';
    protected $fillable=['id','profesional_id','proyecto_id'];

    public  function  Proyecto()
    {
        return $this->belongsTo('App\Producto');
    }

    public static function getTribunalesAsignados($projectId) {
        return DB::table('profesionals')
            ->join('assignments','profesionals.id','=','assignments.profesional_id')
            ->where('assignments.proyecto_id', '=', $projectId)
            -> select('profesionals.*','assignments.*')->get();
    }

    public static function getAsignmentsByProjectId($projectId) {
        return DB::table('assignments')
            ->where('proyecto_id', '=', $projectId)->get();
    }

    public  static  function AsignacionesTribu() {
        return  DB::table('proyectos')
                ->leftJoin('assignments', 'proyectos.id', '=', 'assignments.titulo_id')
               -> select('proyectos.titulo','proyectos.id','assignments.name_id')
               ->groupby('proyectos.id')
                ->get();
        /**
            DB::table('proyectos')
            ->join('proyectos','proyectos.id','=','assignments.titulo_id')
            -> select('proyectos.titulo','proyectos.id','assignments.name_id')

            ->get()->distinct('proyectos.id');
         * */
    }
    public static function Asignaciones(){
      return DB::table('assignments')
          ->join('proyectos','proyectos.id','=','assignments.titulo_id')
          -> select('proyectos.titulo','assignments.name_id')
         
          ->get();

      /**
       *   return DB::table('assignments')
      ->join('profesionals','profesionals.id','=','assignments.name_id')
      ->join('proyectos','proyectos.id','=','assignments.titulo_id')
      -> select('profesionals.name','proyectos.titulo','profesionals.id')

      ->get();
       */
        

    }
    public static function Asignaciones1(){
      return DB::table('assignments')
          ->join('profesionals','profesionals.id','=','assignments.name_id')
          ->join('proyectos','proyectos.id','=','assignments.titulo_id')
          -> select('profesionals.name','profesionals.id')
          // -> where('profesionals.name', '=', 'proyectos.tutor')
          ->get();
          // ->paginate(2);

    }
    public static function Asignaciones2(){
      return DB::table('assignments')
          ->join('profesionals','profesionals.id','=','assignments.name_id')
          ->join('proyectos','proyectos.id','=','assignments.titulo_id')
          -> select('proyectos.titulo','proyectos.id')
          // -> where('profesionals.name', '=', 'proyectos.tutor')
          ->get();
          // ->paginate(2);

    }
}
