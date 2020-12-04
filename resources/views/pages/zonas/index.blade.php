<style>
    /*-----*/
    .containerMain .card-header {
        border: none !important;
    }

</style>
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
@if (Auth::user()->rol == 1)
    <div class="container containerMain">
        @include('layouts.partials.optionsTable',[
        'tituloPC'=> __('pov.tltZonas'),
        'addElement'=> __('pov.AddZona'),
        'importExcel' => route('usuarios.import'),
        'exportExcel' => route('usuarios.export'),
        'templateExcel' => route('usuarios.template'),
        'restore' => route('usuarios.recovery'),
        'add' => route('zonas.create'),
        'optionalBtn' => 'true',
        'optionalRoute' => route('sala.index'),
        'optionalIcon' => 'albums',
        'optionalText' => __('pov.txtPostulations')
        ])
    </div>
@endif
<div class="container mb-4">
    @switch ($postulation)
        @case('false')
        <div class="row">
            @forelse ($zonas as $zona)
                <div class="col-md-4">
                    <div class="card">
                        @if ($zona->estado == 'Bloqueado')
                            <div class="card-header displayRowSbC bg-danger text-light">
                            @else
                                <div class="card-header displayRowSbC">
                        @endif
                        <div class="card-text"><i class="fas fa-people-carry mr-2"></i>{{ $zona->nombre_zona }}</div>
                        <div class="card-text"><b><i class="fas fa-stopwatch mr-2"></i>{{ $zona->tiempo_servicio }}
                                {{ __('pov.txtHrsService') }}</b></div>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <b>{{ __('pov.txtEncargado') }}: </b>{{ $zona->encargado }}
                        </div>
                        <div class="card-text"><b>{{ __('pov.txtLugar') }}: </b>{{ $zona->lugar }}</div>
                        <div class="card-text"><b>{{ __('pov.txtHorarios') }}: </b><br>
                            {{ __('pov.txtEntrada') }} {{ $zona->hora_entrada }} <br>
                            {{ __('pov.txtSalida') }} {{ $zona->hora_salida }}
                        </div>
                        <div class="card-text"><b>{{ __('pov.txtDiasServ') }}: </b>{{ $zona->dias_servicio }}</div>
                        <div class="card-text"><b>{{ __('pov.txtLabores') }}: </b><br> {{ $zona->labores }}</div>
                    </div>
                    <div class="card-footer displayRowSbC">
                        <div class="card-text displayRowCC"><i class="fas fa-users mr-2"></i><b
                                class="mr-2">{{ __('pov.txtCupos') }}:</b>
                            {{ $zona->cupos }}
                        </div>
                        @if (Auth::user()->rol == 1)
                            <div class="displayRowCC">
                                <a class="a-option" href="{{ route('zonas.edit', $zona) }}" title="{{ __('pov.edit') }}">
                                    <i class="far fa-edit"></i></a>
                                <div class="displayRowCC" style="padding-top: 0.9rem;">
                                    @include('layouts.forms.delete',[
                                    'class'=> 'zonas',
                                    'icono'=> 'fa-trash-alt',
                                    'retorno' => $zona,
                                    ])
                                    @if ($zona->estado == 'Bloqueado')
                                        @include('pages.zonas.unblock')
                                    @else
                                        @include('pages.zonas.block')
                                    @endif
                                </div>
                            </div>
                        @elseif(Auth::user()->rol == 3)
                            <div class="displayRowCC" style="padding-top: 0.9rem;">
                                <form action="{{ route('sala.store', $zona) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <button type="submit" class="btn btn-MC">{{ __('pov.txtPostular') }}</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="card" style="width: 100%;">
                    <div class="card-body displayRowCC">
                        <h5 class="card-title displayRowCC">
                            <ion-icon style="font-size: 1.5em; color: rgb(230, 175, 57);" name="alert-circle-outline"
                                class="mr-2">
                            </ion-icon>{{ __('pov.noExistZone') }}
                        </h5>
                    </div>
                </div>
            @endforelse
        </div>

        @break
        @case('true')
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-text"><i class="fas fa-hourglass-half mr-2"></i>{{ __('pov.txtPostPro') }}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            {{ __('pov.prrPosP1') }} <b>{{ $PV->zonaSS->nombre_zona }}</b>
                            {{ __('pov.prrPosP2') }} {{ date('d', strtotime($PV->created_at)) }}
                            {{ __('pov.prrPosP3') }}
                            {{ date('m', strtotime($PV->created_at)) }}
                            {{ __('pov.prrPosP4') }}
                            <br>
                            <br>
                            {{ __('pov.prrPosP5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @break
        @case('service')
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-text"><i class="fas fa-people-carry mr-2"></i>No puede aplicar a ninguna zona
                            actualmente
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            Usted se encuentra en servicio actualmente por lo que no puede aplicar a otras zonas de
                            servicio,
                            culminado su servicio se le reestablecerá el acceso a esta página.
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('bitacora.index') }}" class="btn btn-MC btn-footer">{{ __('pov.txtVerBita') }}</a>
                    </div>
                </div>
            </div>
        </div>
        @break
        @default
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-text"><i class="fas fa-people-carry mr-2"></i>No puede aplicar a ninguna zona
                            actualmente
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-text">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endswitch
</div>
@endsection
