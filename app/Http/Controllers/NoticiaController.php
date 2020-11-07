<?php

namespace App\Http\Controllers;

use App\Exports\NewsExport;
use App\Exports\NewsTemplate;
use App\Imports\NewsImport;
use App\Models\Categoria_noticia;
use App\Models\Noticia;
use App\Models\Rol_has_permiso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = Noticia::where('estado', 'Activo')->paginate(20);
        $rol = Auth::user()->rol;
        $rhp = Rol_has_permiso::where('rol', $rol)->get();
        return view('pages.news.index', compact('noticias', 'rhp'));
    }
    public function recovery()
    {
        $noticias = Noticia::where('estado', 'Inactivo')->paginate(20);
        $rol = Auth::user()->rol;
        $rhp = Rol_has_permiso::where('rol', $rol)->get();
        return view('pages.news.index', compact('noticias', 'rhp'));
    }

    public function create()
    {
        $rol = Auth::user()->rol;
        $rhp = Rol_has_permiso::where('rol', $rol)->get();
        $categorias = Categoria_noticia::where('estado', 'activo')->get();
        return view('pages.news.create', compact('rhp', 'categorias'));
    }

    public function edit(Noticia $noticia)
    {
        $rol = Auth::user()->rol;
        $rhp = Rol_has_permiso::where('rol', $rol)->get();
        $categorias = Categoria_noticia::where('estado', 'activo')->get();
        return view('pages.news.edit', compact('rhp', 'categorias', 'noticia'));
    }

    public function delete(Noticia $new)
    {
        $rol = Auth::user()->rol;
        $rhp = Rol_has_permiso::where('rol', $rol)->get();
        $count = Noticia::where('estado', 'Activo')->count();
        if ($count == 4) {
            return back()->with(compact('rhp'));
        } else {
            $new->estado = 'Inactivo';
            $new->save();
            return back()->with(compact('rhp'));
        }
    }

    public function restore(Noticia $new)
    {
        $new->estado = 'Activo';
        $new->save();

        $rol = Auth::user()->rol;
        $rhp = Rol_has_permiso::where('rol', $rol)->get();
        return back()->with(compact('rhp'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|min:10|max:50',
            'subtitulo' => 'required|min:10|max:50',
            'info' => 'required|min:20|max:255',
            'categoria' => 'required|min:1|max:50',
        ]);

        $noticia = new Noticia();
        $noticia->estado = "Activo";
        $noticia->titulo = $validated['titulo'];
        $noticia->subtitulo = $validated['subtitulo'];
        $noticia->informacion = $validated['info'];
        if ($request->hasFile('newFile')) {
            $file = $request->file("newFile");
            $nombrearchivo  = $file->getClientOriginalName();
            $file->move(public_path("storage/colegio/"), $nombrearchivo);
            $noticia->imagen = $nombrearchivo;
        } else {
            $noticia->imagen = 'Colegio frontal.jpg';
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

    public function update(Request $request, Noticia $noticia)
    {
        $validated = $request->validate([
            'titulo' => 'required|min:10|max:50',
            'subtitulo' => 'required|min:10|max:50',
            'info' => 'required|min:20|max:255',
            'categoria' => 'required|min:1|max:50',
        ]);

        $noticia->estado = "Activo";
        $noticia->titulo = $validated['titulo'];
        $noticia->subtitulo = $validated['subtitulo'];
        $noticia->informacion = $validated['info'];
        if ($request->hasFile('newFile')) {
            $file = $request->file("newFile");
            $nombrearchivo  = $file->getClientOriginalName();
            $file->move(public_path("storage/colegio/"), $nombrearchivo);
            $noticia->imagen = $nombrearchivo;
        } else {
            $noticia->imagen = $noticia->imagen;
        }
        $noticia->categoria = $validated['categoria'];
        $noticia->coordinador = Auth::user()->id;
        $noticia->save();
        if (session('lang') == 'es') {
            $status = "Se ha actualizado la noticia exitosamente";
        } else {
            $status = "The news has been successfully updated";
        }
        return back()->with(compact('status'));
    }

    public function searchList(Request $request)
    {
        $rol = Auth::user()->rol;
        $noticias = Noticia::where([['titulo', 'like', '%' . $request->texto . '%'], ['estado', 'Activo']])
            ->orWhere([['subtitulo', 'like', '%' . $request->texto . '%'], ['estado', 'Activo']])
            ->orWhere([['informacion', 'like', '%' . $request->texto . '%'], ['estado', 'Activo']])
            ->latest()
            ->take('15')
            ->get();
        $rhp = Rol_has_permiso::where('rol', $rol)->get();
        $texto = $request->texto;
        $count = Noticia::where([['titulo', 'like', '%' . $request->texto . '%'], ['estado', 'Activo']])
            ->orWhere([['subtitulo', 'like', '%' . $request->texto . '%'], ['estado', 'Activo']])
            ->orWhere([['informacion', 'like', '%' . $request->texto . '%'], ['estado', 'Activo']])
            ->count();
        return view('pages.news.newsResult', compact('rhp', 'noticias', 'texto', 'count'));
    }

    public function export()
    {
        return Excel::download(new NewsExport, 'Noticias.xlsx');
    }
    public function template()
    {
        return Excel::download(new NewsTemplate, 'Plantilla_noticias.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file('newFile');
        Excel::import(new NewsImport, $file);

        $noticias = Noticia::where('estado', 'Activo')->paginate(20);
        $rol = Auth::user()->rol;
        $rhp = Rol_has_permiso::where('rol', $rol)->get();
        return view('pages.news.index', compact('noticias', 'rhp'));
    }
}
