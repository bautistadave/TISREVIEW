<?php

namespace App\Http\Controllers;

use App\AreaProfesional;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ProfCreateRequest;
use App\Http\Requests\ProfUpdateRequest;
use App\Http\Controllers\Controller;
use App\Profesional;
use App\Area;
use App\Carrera;
use Session;
use Redirect;
use DB;
use Illuminate\Routing\Route;

class ProfesionalController extends Controller
{
    public function __construct()
    {
        //  $this->middleware('auth');
        //  $this->middleware('admin');
        $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
    }

    public function find(Route $route)
    {
        $this->profesional = Profesional::find($route->getParameter('profesional'));
    }

    public function index()
    {
        $profesionals = Profesional::paginate($this->PAGE_SIZE);

        return view('profesional.index', compact('profesionals'));
    }

    public function create()
    {
        $areas = Area::getAreas();
        $carreras = Carrera::lists('namecarre', 'id');
        return view('profesional.create', compact('areas', 'carreras'));

    }

    public function store(ProfCreateRequest $request)
    {
        DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
                'surname' => $request['surname'],
                'phone' => $request['phone'],
            ]);
            $data = $request->all();
            $data["user_id"] = $user->id;
            $profesional = Profesional::create($data);
            $profesionalRole = Role::where('name', '=', 'profesional')->first();
            $user->attachRole($profesionalRole);
            foreach ($request->get("nameare_id") as $area) {
                AreaProfesional::create(['area_id' => $area, 'profesional_id' => $profesional->id]);
            }
        });
        return redirect('/profesional')->with('message', 'Creado exitosamente');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $areas = Area::all();
        $carreras = Carrera::lists('namecarre', 'id');
        return view('profesional.edit', ['profesional' => $this->profesional, 'areas' => $areas, 'carreras' => $carreras]);
    }


    public function update(ProfUpdateRequest $request, $id)
    {
        $this->profesional->fill($request->all());
        $this->profesional->save();
        $user = User::find($this->profesional->user_id);
        $user->fill($request->all());
        $user->save();
        Session::flash('message', 'Profesional Actualizado Correctamente');
        return Redirect::to('/profesional');
    }


    public function destroy($id)
    {
        Profesional::destroy($id);
        Session::flash('message', 'Profesional Eliminado Correctamente');
        return Redirect::to('/usuario');
    }
}
