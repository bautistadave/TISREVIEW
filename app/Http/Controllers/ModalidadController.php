<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ModCreateRequest;
use App\Http\Requests\ModUpdateRequest;
use App\Http\Controllers\Controller;
use App\Modalidad;
use Session;
use Redirect;
class ModalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modalidads = Modalidad::paginate(5);
        // $modalidads = Modalidad::all();
        return view('modalidad.index',compact('modalidads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modalidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModCreateRequest $request)
    {
        Modalidad::create([
            'code' => $request['code'],
            'namemodal' => $request['namemodal'],
        ]);

        return redirect('/modalidad')->with('message','store');
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
    public function edit($id)
    {
        $modalidad = Modalidad::find($id);
        return view('modalidad.edit',['modalidad'=>$modalidad]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModUpdateRequest $request, $id)
    {
        $modalidad = Modalidad::find($id);
        $modalidad->fill($request->all());
        $modalidad->save();
        Session::flash('message','Modalidad Actualizado Correctamente');
        return Redirect::to('/modalidad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Modalidad::destroy($id);
        Session::flash('message','Modalidad Eliminado Correctamente');
        return Redirect::to('/modalidad');
    }
}
