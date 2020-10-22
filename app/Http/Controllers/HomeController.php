<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use App\Models\Rol_has_permiso;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rol = Auth::user()->rol;
        $rhp = Rol_has_permiso::where('rol', $rol)->get();
        foreach($rhp as $r){
            
        }
        return view('home', compact('rhp'));
    }
}
