<?php

namespace App\Http\Controllers;

use App\Gestion;
use App\Profesional;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ProyCreateRequest;
use App\Http\Requests\ProyUpdateRequest;
use App\Http\Controllers\Controller;
use App\Proyecto;
use App\Modalidad;
use App\Carrera;
use App\Area;
use Session;
use Redirect;
use Illuminate\Routing\Route;
use Carbon\Carbon;
use PDF;
class ProyectoController extends Controller
{
    public function __construct(){
        //  $this->middleware('auth');
        //  $this->middleware('admin');
        $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }


    public function find(Route $route){
        $this->proyecto = Proyecto::find($route->getParameter('proyecto'));
    }
    public function index()
    {
        $proyectos = Proyecto::Proyectos();
        return view('proyecto.index',compact('proyectos'));

    }
    public function searchProjetCriteria(){
        $carreras = Carrera::all();
        $gestiones = Gestion::all();
        $modalidades = Modalidad::all();
        return view('proyecto.filter', compact('carreras', 'modalidades', 'gestiones'));
    }

    public function cambiarEstado($proyectoId) {
        $proyecto = Proyecto::find($proyectoId);
        $proyecto->defended = true;
        $proyecto->save();
        return redirect('/proyecto')->with('message','Se cambio el estado exitosamente');
    }

    public function filterProjects(Request $request){
        $proyectos = Proyecto::filterProjects($request);

        view()->share('proyectos', $proyectos);
        $pdf = PDF::loadView('proyecto.filter-report');
        //return $pdf->stream();

        $file = "reports/".time().".pdf";
        $pdf->save($file);
        $url = url($file);
        return view('proyecto.filter-data',compact('proyectos', 'url'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras=Carrera::lists('namecarre','id');
        $tutores = Profesional::all();
        $areas=Area::getAreas();
        $gestiones = Gestion::all();
        $modalidads=Modalidad::lists('namemodal','id');
        return view('proyecto.create',compact('carreras','areas','modalidads', 'tutores', 'gestiones'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProyCreateRequest $request){
        $profesional = Profesional::find($request->get("tutor_id"));
        $data = $request->all();
        $data["tutor_data"] = $profesional->name. ' '.$profesional->surname;
        Proyecto::create($data);
        return redirect('/proyecto')->with('message','Creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $carreras=Carrera::lists('namecarre','id');
        $tutores = Profesional::all();
        $areas=Area::getAreas();
        $modalidads=Modalidad::lists('namemodal','id');
        $gestiones = Gestion::all();
        $proyecto = $this->proyecto;
        return view('proyecto.edit', compact('proyecto', 'carreras','areas','modalidads', 'tutores', 'gestiones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProyUpdateRequest $request, $id)
    {

        $this->proyecto->fill($request->all());
        $this->proyecto->save();
        Session::flash('message','Proyecto Actualizado Correctamente');
        return Redirect::to('/proyecto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->proyecto->delete();
        \Storage::delete($this->proyecto->path);
        Session::flash('message','Proyecto Eliminado Correctamente');
        return Redirect::to('/proyecto');
    }
}
