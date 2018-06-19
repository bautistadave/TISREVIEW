<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\carbon;
use DB;
use Illuminate\Http\Request;

class Proyecto extends Model
{
    // use Notifiable;
    protected $table = "proyectos";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'author', 'tutor_id', 'tutor_data', 'gestion_id', 'namecarre_id', 'area_id', 'subarea_id', 'namemodal_id', 'descripcion', 'path'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($project) {
            $project->defended = false;
            $project->project_number = Carbon::now()->timestamp;
        });
    }

    public function proyectoTribunales()
    {
        return $this->belongsToMany('App\Profesional', 'assignments');
    }

    public function setPathAttribute($path)
    {
        if (!empty($path)) {
            //$this->attributes['path']=Carbon::now()->second.$path->getClientOriginalName();
            $name = Carbon::now()->second . $path->getClientOriginalName();
            $this->attributes['path'] = $name;
            \Storage::disk('local')->put($name, \File::get($path));
        }
    }

    public static function Proyectos()
    {
        return DB::table('proyectos')
            ->join('carreras', 'carreras.id', '=', 'proyectos.namecarre_id')
            ->join('areas', 'areas.id', '=', 'proyectos.area_id')
            ->join('modalidads', 'modalidads.id', '=', 'proyectos.namemodal_id')
            ->select('proyectos.*', 'carreras.namecarre', 'areas.nameare', 'modalidads.namemodal')
            ->paginate(10);
    }

    public static function filterProjects(Request $request){
        //->where('name', 'like', 'T%')
        //  "firstName": "aaa",
        //  "lastName": "aaa",
        //  "query": "aaa"
        $base = DB::table('proyectos');
        $result = $base->join('carreras', 'carreras.id', '=', 'proyectos.namecarre_id')
            ->join('modalidads', 'modalidads.id', '=', 'proyectos.namemodal_id');
        if ($request->get("carreras") != null) {
            $result = $result->whereIn('proyectos.namecarre_id', $request->get("carreras"));
        }
        if (($request->get("modalidades") != null)) {
            $result = $result->whereIn('proyectos.namemodal_id', $request->get("modalidades"));
        }
        if (($request->get("gestiones") != null)) {
            $result = $result->whereIn('proyectos.gestion_id', $request->get("gestiones"));
        }
        if (!empty(trim($request->get("firstName")))){
            $result = $result->where('proyectos.author', 'like', '%'.$request->get("firstName").'%');
        }
        if (!empty(trim($request->get("query")))){
            $result = $result->where('proyectos.titulo', 'like', '%'.$request->get("query").'%');
        }
        $result = $result
            ->select('proyectos.*', 'carreras.namecarre', 'modalidads.namemodal')
            ->get();

        return $result;
    }


    protected $hidden = [
        // 'password', 'remember_token',
    ];

    public function Assignment()
    {
        return $this->hasMany('App\Assignment');
    }
}
