<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function createArea(){
        return view('citas.createArea');
    }
    public function storeArea(Request $request){

    }
}
