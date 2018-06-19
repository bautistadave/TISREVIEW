<?php

namespace App\Http\Controllers;

use App\AreaProfesional;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Profesional;
use App\Proyecto;
use App\Assignment;
use Illuminate\Support\Facades\Input;
use Session;
use Redirect;
use Illuminate\Routing\Route;
use DB;
class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos=Proyecto::paginate($this->PAGE_SIZE);

      // return $asignaciones;
      return view('asignacion.index', compact('proyectos'));
    }

    public function getTribunalsAssigned($project) {
        $tribunales = Assignment::getTribunalesAsignados($project);
        $profesionals = $this->getProfesionalSugestion($project);
        $proyecto = Proyecto::find($project);
        return view('profesional.tribunalesasignados',compact('tribunales', 'proyecto', 'profesionals'));
    }
    public function getProfesionalsAreaByProject($projectId) {
        $profesionals = $this->getProfesionalSugestion($projectId);
        return view('profesional.profesionalesarea',compact('profesionals'));
    }

    public function cambioTribunales(Request $request) {
        $proyecto = Proyecto::find($request->get("proyecto_id"));
        $profesionals = $this->getProfesionalSugestion($request->get("proyecto_id"));
        return view('profesional.asignados-cambio',compact('profesionals', 'proyecto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $proyectos=Proyecto::all();
        return view('asignacion.create',compact('proyectos'));

    }
    public function selectAjax(Request $request)
    {
        if($request->ajax()){
            // $tribunales = DB::table('profesionals')->whereNotIn('id', [$request->id_pro])->pluck("name","id")->all();
           // $tribunales = DB::table('profesionals')->where('id', $request->id_pro)->pluck('name','id') ->select(...)->get();;
        //    $tribunales = DB::table('profesionals')->where('id',$request->id_pro)->pluck("name","id")->all();
          //  ModelName::whereNotIn()
             $tribunales =   Profesional::select('name','id')->whereNotIn('id', [$request->id_pro])->get();
          //  dd($tribunales);
          //  $states = DB::table('profesionals')->where('id', '',$request->id_pro)->pluck("name","id")->all();
           $data = view('ajax-select',compact('tribunales'))->render();
           // return response()->json(['options'=> $request->id_pro]);
            return response()->json(['options'=> $data]);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        Assignment::create($request->all());
        $proyectos=Proyecto::all();
        return view('asignacion.create',compact('proyectos'));
    }

    public function storePost(Request $request) {
        if($request->ajax()){
            Assignment::create($request->all());
            return response()->json([
                'error' => false,
                'insertedData' => $request->all()
            ]);
        }
    }

    public function changeTribunal(Request $request) {
        $assignation = Assignment::find($request->get("id"));
        $assignation->profesional_id = $request->get("profesional_id");
        $assignation->description = $request->get("descriptionChange");
        $assignation->save();
        $proyecto = Proyecto::find($assignation->proyecto_id);
        $proyecto->excluded = $request->get("profesionalOldId");
        $proyecto->save();
        return json_encode($request->all());
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $asignaciones = Assignment::where('titulo_id', $id)->get();
       $proyecto = Proyecto::findOrFail($id);
        return view('asignacion.show', compact('asignaciones','proyecto'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id  )
    {
      return $id;
      $profesionales=Profesional::lists('name','id');
        //$data=Req::lists('id','name');
      // return $asignaciones;
      return view('asignacion.edit', compact('profesionales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assigned = Assignment::find($id);
        $assigned->delete();
        return view('asignacion.create',compact('proyectos'));
    }

    public function deleteTribunal($id)
    {
        $assigned = Assignment::find($id);
        $assigned->delete();
        return redirect('/asignacion/create');
    }

    /**
     * @param $projectId
     * @return array
     */
    public function getProfesionalSugestion($projectId)
    {
        $project = Proyecto::find($projectId);
        $tribunales = Assignment::getAsignmentsByProjectId($project->id);
        $exclude = [];
        foreach ($tribunales as $tribunal) {
            array_push($exclude, $tribunal->profesional_id);
        }
        array_push($exclude, $project->tutor_id);
        if ($project->excluded != null) {
            array_push($exclude, $project->excluded);
        }
        $getProfesionals = AreaProfesional::getProfesionalByArea($project->area_id, $exclude);
        $profesionals = [];
        foreach ($getProfesionals as $profesional) {
            $cantidad = AreaProfesional::getProfesionalProjectCount($profesional->id);
            if (sizeof($cantidad) < $this->LIMIT_PROJECTS) {
                array_push($profesionals, $profesional);
            }
        }
        return $profesionals;
    }
}
