<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Proyecto;
class FrontController extends Controller
{
   public function index(){
        return view('index');
   }

   public function contacto(){
        return view('contacto');
   }

   public function reviews(Request $request){
      $proyectos = Proyecto::all();
        return view('reviews', compact('proyectos'));
   }

   public function admin(){
        return view('admin.index');
   }
}
