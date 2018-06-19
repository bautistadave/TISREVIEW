<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Auxi;
use Session;
use Redirect;
use App\Http\Requests\AuxiCreateRequest;
use App\Http\Requests\AuxiUpdateRequest;

class AuxiliarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aux = Auxi::paginate($this->PAGE_SIZE);
        //  return $users;
        // $users = User::all();
        return view('auxiliar.index', compact('aux'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auxiliar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuxiCreateRequest $request)
    {
        DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
                'surname' => $request['surname'],
                'phone' => $request['phone'],
            ]);
            $auxiliarRole = Role::where('name', '=', 'auxialiar')->first();
            $user->attachRole($auxiliarRole);
            $data = $request->all();
            $data["user_id"] = $user->id;
            Auxi::create($data);
            Session::flash('message', 'Usuario Auxiliar creado Correctamente');
        });
        return redirect('/auxiliar');
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
        $aux = Auxi::find($id);
        return view('auxiliar.edit', ['aux' => $aux]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuxiUpdateRequest $request, $id)
    {
        $aux = Auxi::find($id);
        $aux->fill($request->all());
        $aux->save();
        $user = User::find($aux->user_id);
        $user->fill($request->all());
        $user->save();
        Session::flash('message', 'Auxiliar actualizado Correctamente');
        return Redirect::to('/auxiliar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Auxi::destroy($id);
        Session::flash('message', 'Auxiliar eliminado Correctamente');
        return Redirect::to('/auxiliar');
    }
}
