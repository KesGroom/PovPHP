<style>
    .indicador {
        width: 0.9rem;
        height: 0.9rem;
        border: 1px solid rgb(150, 149, 149);
        border-radius: 100%;
    }

    .btn-SS {
        font-size: 2em;
    }

    .aceptar {
        color: rgb(19, 163, 19);
    }

    .aceptar:hover {
        color: rgb(23, 177, 23) !important;
    }

    .rechazo {
        color: rgb(189, 33, 33);
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
<div class="container">
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="displayRoWCC">
                <ion-icon name="hourglass-outline" class="mr-2"></ion-icon>{{ __('pov.prrRecordatorio') }}
            </h5>
            <div class="card-text displayRowSaC">
                <div class="displayRowCC">
                    <div class="indicador mr-2" style="background-color: rgba(248, 222, 108, 0.541)"></div>
                    <b>{{ __('pov.txtThreeDay') }}</b>
                </div>
                <div class="displayRowCC">
                    <div class="indicador mr-2" style="background-color: rgb(240, 178, 64, 0.541)"></div>
                    <b>{{ __('pov.txtTwoDay') }}</b>
                </div>
                <div class="displayRowCC">
                    <div class="indicador mr-2" style="background-color: rgb(240, 99, 64, 0.541)"></div>
                    <b>{{ __('pov.txtOneDay') }}</b>
                </div>

            </div>
        </div>
    </div>
    @forelse ($salas as $sala)
        @switch($sala->created_at->diffInDays(now()))
            @case(5)
            <div class="card mb-3" style="background-color: rgba(240, 99, 64, 0.541)">
                @break
                @case(4)
                <div class="card mb-3" style="background-color: rgb(240, 178, 64, 0.541)">
                    @break
                    @case(3)
                    <div class="card mb-3" style="background-color: rgb(248, 222, 108, 0.541)">
                        @break
                        @default
                        <div class="card mb-3">
                        @endswitch

                        <div class="card-body displayRowSbC">
                            <div class="card-text"><b>{{ __('pov.rolEst') }}:</b> {{ $sala->estu->user->name }}
                                {{ $sala->estu->user->apellido }} ({{ $sala->estu->user->id }})
                            </div>
                            <div class="card-text"><b>{{ __('pov.txtNombZona') }}:</b> {{ $sala->zonaSS->nombre_zona }}
                            </div>
                            <div class="card-text"><b>{{ __('pov.txtFechaPost') }}:</b>
                                {{ date('d-m-Y', strtotime($sala->created_at)) }}
                            </div>
                            <div class="displayRowCC" style="padding-top: 0.9rem;">
                                @include('pages.sala.aceptar')
                                @include('pages.sala.rechazar')
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card" style="width: 100%;">
                        <div class="card-body displayRowCC">
                            <h5 class="card-title displayRowCC">
                                <ion-icon style="font-size: 1.5em; color: rgb(230, 175, 57);" name="alert-circle-outline"
                                    class="mr-2">
                                </ion-icon>{{ __('pov.noExistSS') }}
                            </h5>
                        </div>
                    </div>
                @endforelse
            </div>
        @endsection
