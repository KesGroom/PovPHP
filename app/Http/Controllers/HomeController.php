<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
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
        return view('home', compact('rhp'));
    }

    public function welcome(){
        $latestNews = Noticia::where('estado', 'activo')->orderBy('created_at', 'desc')->get()->take(4);
        return view('welcome', compact('latestNews'));
    }
}
