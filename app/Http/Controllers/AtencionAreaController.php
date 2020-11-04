<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AtencionAreaController extends Controller
{
    public function create(){
        $users = DB::table('users')
                ->where('votes', '<>', 100)
                ->get();
        $area = Area::all();
       return view('atencion_areas.create', compact('area'));
    }
    public function store(Request $request){
 
        
    }

}
