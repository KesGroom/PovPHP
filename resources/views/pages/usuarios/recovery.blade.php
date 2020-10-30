<style>
    /*-----*/
    .card-header {
        border: none !important;
    }
</style>
@extends('layouts.app')

@section('content')
    @include('layouts.partials.dashNav')
    <div class="container containerMain">
        @include('layouts.partials.optionsTable', [
        'tituloPC'=> __('pov.usersReg'),
        'addElement'=> __('pov.addUser'),
        'importExcel' => route('usuarios.import'),
        'exportExcel' => route('usuarios.export'),
        'templateExcel' => route('usuarios.template') ,
        'restore' => route('usuarios.recovery') ,
        ])
        <div class="cont-card-img-table" id="resultado">
        </div>
        <div class="cont-card-img-table" id="noConsult">
            @include('pages.usuarios.userList')
        </div>
    </div>
@endsection