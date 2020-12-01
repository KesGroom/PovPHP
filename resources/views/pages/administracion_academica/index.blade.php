@extends('layouts.app')
@section('content')
@section('nav')
    @include('layouts.partials.dashNav')
@endsection
@if (session('status'))
    @section('script')
        @include('layouts.partials.alerts',[
        'option' => session('status'),
        ])
    @endsection
@endif
<div class="container containerMain">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="areas">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#areas" role="tab"
                        aria-controls="home" aria-selected="true">{{ __('pov.txtAreas') }}
                        @if ($ctAreas > 0)   
                            <span class="badge badge-info text-light">{{$ctAreas}}</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item" role="materias">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#materias" role="tab"
                        aria-controls="home" aria-selected="true">{{ __('pov.txtMaterias') }}
                        @if ($ctMateria > 0)   
                            <span class="badge badge-info text-light">{{$ctMateria}}</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item" role="grados">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#grados" role="tab"
                        aria-controls="home" aria-selected="true">{{ __('pov.txtGrados') }}
                        @if ($ctGrado > 0)   
                            <span class="badge badge-info text-light">{{$ctGrado}}</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item" role="materias">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#cursos" role="tab"
                        aria-controls="home" aria-selected="true">{{ __('pov.txtCursos') }}
                        @if ($ctCurso > 0)   
                            <span class="badge badge-info text-light">{{$ctCurso}}</span>
                        @endif
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active mt-4" id="areas" role="tabpanel" aria-labelledby="areas-tab">
                    <div class="row">
                        @include('pages.areas.index')
                    </div>
                </div>

                <div class="tab-pane fade mt-4" id="materias" role="tabpanel" aria-labelledby="materias-tab">
                    <div class="row">
                        @include('pages.materias.index')
                    </div>
                </div>

                <div class="tab-pane fade mt-4" id="grados" role="tabpanel" aria-labelledby="grados-tab">
                    <div class="row">
                        @include('pages.grados.index')
                    </div>
                </div>

                <div class="tab-pane fade mt-4" id="cursos" role="tabpanel" aria-labelledby="cursos-tab">
                    <div class="row">
                        @include('pages.cursos.index')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
