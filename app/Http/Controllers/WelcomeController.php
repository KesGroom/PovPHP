<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public static function welcome(){
        $latestNews = Noticia::where('estado', 'activo')->orderBy('created_at', 'desc')->get()->take(4);
        return view('welcome', compact('latestNews'));
    }
}
