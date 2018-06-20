<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\carbon;
class Profesional extends Model
{
    //
    protected $table="profesionals";

    protected $fillable = [
        'name','surname','phone','invitado','namecarre_id','email','password','user_id','nameare_id[]',
    ];
    public static function boot(){
        parent::boot();
        static::creating(function ($profesional) {
            $profesional->code_number = Carbon::now()->timestamp;
        });
    }

    public function areas()
    {
        return $this->belongsToMany('App\Area');
    }

    public function areasProfesional()
    {
        return $this->belongsToMany('App\AreaProfesional');
    }
    public function profesionalProjects(){
        return $this->belongsToMany('App\Proyecto', 'assignments');
    }


    public function carrera()
    {
        return $this->belongsTo('App\Carrera', 'namecarre_id', 'id');
    }

    public static function Profesionals(){
        return DB::table('profesionals')
            ->join('areas','areas.id','=','profesionals.nameare_id')
            ->join('carreras','carreras.id','=','profesionals.namecarre_id')
            -> select('profesionals.*','areas.nameare','carreras.namecarre')
            ->paginate(2);
    }

    public static function getProfesionalCarreraArea($size = 5) {
        return DB::table('profesionals')
            ->join('carreras','carreras.id','=','profesionals.namecarre_id')
            -> select('profesionals.*','carreras.namecarre')
            ->paginate($size);
    }
}
