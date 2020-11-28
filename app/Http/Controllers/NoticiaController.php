<?php

namespace App\Http\Controllers;

use App\Exports\NewsExport;
use App\Exports\NewsTemplate;
use App\Exports\TemplateExport;
use App\Imports\NewsImport;
use App\Models\Categoria_noticia;
use App\Models\Noticia;
use App\Models\Rol_has_permiso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PHPUnit\Framework\Constraint\IsTrue;

class NoticiaController extends Controller
{
    public function index()
    {
        if (!Auth::user()) {
            return WelcomeController::welcome();
        }
        $validated = PermisoController::validatedPermit('Lista de noticias');
        if ($validated) {
            $noticias = Noticia::where('estado', 'Activo')->paginate(20);
            $rhp = RolHasPermisoController::rhp();
            return view('pages.news.index', compact('noticias', 'rhp'));
        } else {
            return WelcomeController::welcome();
        }
    }
    public function recovery()
    {
        if (!Auth::user()) {
            return WelcomeController::welcome();
        }
        $validated = PermisoController::validatedPermit('Lista de noticias');
        if ($validated) {
            $noticias = Noticia::where('estado', 'Inactivo')->paginate(20);
            $rhp = RolHasPermisoController::rhp();
            return view('pages.news.index', compact('noticias', 'rhp'));
        } else {
            return WelcomeController::welcome();
        }
    }

    public function create()
    {
        if (!Auth::user()) {
            return WelcomeController::welcome();
        }
        $validated = PermisoController::validatedPermit('Lista de noticias');
        if ($validated) {
            $rhp = RolHasPermisoController::rhp();
            return view('pages.news.create', compact('rhp'));
        } else {
            return WelcomeController::welcome();
        }
    }

    public function edit(Noticia $noticia)
    {
        if (!Auth::user()) {
            return WelcomeController::welcome();
        }
        $validated = PermisoController::validatedPermit('Lista de noticias');
        if ($validated) {
            $rhp = RolHasPermisoController::rhp();
            return view('pages.news.edit', compact('rhp', 'noticia'));
        } else {
            return WelcomeController::welcome();
        }
    }

    public function delete(Noticia $new)
    {
        $rhp = RolHasPermisoController::rhp();
        $count = Noticia::where('estado', 'Activo')->count();
        if ($count == 4) {
            return back()->with(compact('rhp'));
        } else {
            $new->estado = 'Inactivo';
            $new->save();
            return back()->with(compact('rhp'));
        }
    }

    public function restore(Noticia $noticia)
    {
        $noticia->estado = 'Activo';
        $noticia->save();

        $rhp = RolHasPermisoController::rhp();
        return back()->with(compact('rhp'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|min:10|max:255',
            'subtitulo' => 'required|min:10|max:255',
            'info' => 'required|min:20|max:255',
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
        $titulos = [
            'Titulo',
            'Subtitulo',
            'Informacion',
            'Publicado por',
            'Fecha de publicacion',
        ];
        $template = 'false';
        $items_data = 'news';
        return Excel::download(new TemplateExport($titulos, Noticia::where('estado', 'Activo')->get(), $template, $items_data), 'noticias.xlsx');
    }
    public function template()
    {
        $titulos = [
            'Titulo',
            'Subtitulo',
            'Informacion',
            'Publicado por',
            'Fecha de publicacion',
        ];
        $template = 'true';
        $items_data = 'news';
        return Excel::download(new TemplateExport($titulos, Noticia::where('estado', 'Activo')->get(), $template, $items_data), 'Plantilla_noticias.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file('newFile');
        Excel::import(new NewsImport, $file);

        $noticias = Noticia::where('estado', 'Activo')->paginate(20);
        $rhp = RolHasPermisoController::rhp();
        return view('pages.news.index', compact('noticias', 'rhp'));
    }
}
