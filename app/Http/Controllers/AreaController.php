<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AreaCreateRequest;
use App\Http\Requests\AreaUpdateRequest;
use App\Http\Controllers\Controller;
use App\Area;
use Session;
use Redirect;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::paginate($this->PAGE_SIZE);
        // $areas = Area::all();
        return view('area.index', compact('areas'));
    }

    public function getSubAreas($area)
    {
        $subareas = Area::getSubAreas($area);
        return view('area.subareas', compact('subareas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::getAreas();
        return view('area.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaCreateRequest $request)
    {
        Area::create([
            'nameare' => $request['nameare'],
            'namesubare' => $request['namesubare'],

        ]);
        return redirect('/area')->with('message', 'Area creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $area = Area::find($id);
        $areas = Area::getAreas();
        return view('area.edit', ['area' => $area, 'areas' => $areas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AreaUpdateRequest $request, $id)
    {
        $area = Area::find($id);
        $area->fill($request->all());
        $area->save();
        Session::flash('message', 'Area Actualizado Correctamente');
        return Redirect::to('/area');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Area::destroy($id);
        Session::flash('message', 'Area Eliminado Correctamente');
        return Redirect::to('/area');
    }
}
