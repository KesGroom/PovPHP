<style>
    /*-----*/
    .card-header {
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
<div class="container containerMain">
    @include('layouts.partials.optionsTable', [
    'tituloPC'=> __('pov.usersReg'),
    'addElement'=> __('pov.addUser'),
    'importExcel' => route('usuarios.import'),
    'exportExcel' => route('usuarios.export'),
    'templateExcel' => route('usuarios.template') ,
    'restore' => route('usuarios.recovery') ,
    'add' => route('usuarios.create'),
    'optionalBtn' => 'false',
    ])
    <div class="cont-card-img-table" id="resultado">
    </div>
    <div class="cont-card-img-table" id="noConsult">
        @include('pages/usuarios/userList')
    </div>

</div>
<script>
    var clase = 'usuarios';
</script>
@endsection
