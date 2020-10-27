<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = Noticia::where('estado', 'Activo')->get();
        return view('news.index', compact('noticias'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|min:15|max:50',
            'subtitulo' => 'required|min:15|max:50',
            'informacion' => 'required|min:10|max:255',
            'imagen' => 'required|min:10|max:50',
            'categoria' => 'required|min:1|max:50',
        ]);

        $noticia = new Noticia();
        $noticia->estado = "Activo";
        $noticia->titulo = $validated['titulo'];
        $noticia->subtitulo = $validated['subtitulo'];
        if ($request->hasFile('newFile')) {
            $file = $request->file("newFile");
            $nombrearchivo  = $file->getClientOriginalName();
            $file->move(public_path("storage/imgPerfil/"), $nombrearchivo);
            $noticia->imagen = $nombrearchivo;
        }
        $noticia->categoria = $validated['categoria'];
        $noticia->coordinador = Auth::user()->id;
        $noticia->save();
        if (session('lang') == 'es') {
            $status = "Se ha publicado la noticia exitosamente";
        } else {
            $status = "The news has been published successfully";
        }
        return back()->with(compact('status'));
    }
}
