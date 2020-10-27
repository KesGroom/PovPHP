<style>
    /*-----*/
    .card-header {
        border: none !important;
    }

    .txtDoc {
        color: brown;
        font-size: 12px;
    }

    .txtEst {
        color: goldenrod;
        font-size: 12px;
    }

    .txtOther {
        color: rgb(219, 221, 97);
        font-size: 12px;
    }

    .txtAcu {
        color: rgb(233, 121, 93);
        font-size: 12px;
    }

    .falseLink {
        border: none;
        background: none;
        outline: none !important;
        cursor: pointer;
    }

    .falseLink:hover {
        border: none;
        background: none;
        outline: none;
        color: #b71c1c;
    }

    .actions {
        width: 100%;
        padding: 0.5rem;
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
    }

    .actions form {
        margin-left: 1rem;
    }

    .actions a {
        margin-top: -0.9rem;
    }

    .page-link {
        position: relative;
        display: block;
        padding: 0.5rem 0.75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #b71c1c !important;
        background-color: #fff;
        border: 1px solid #dee2e6;
    }

    .page-item.active .page-link {
        z-index: 3;
        color: #fff !important;
        background-color: #b71c1c !important;
        border-color: #8d1414 !important;
    }

    .panel-control {
        width: 100%;
        height: fit-content;
        border: 1px solid rgba(0, 0, 0, 0.125);
        border-radius: 5px;
        background-color: #fff;
        overflow: hidden;
    }

    .panel-control .Pc-principal,
    .panel-control .Pc-secundario {
        width: 100%;
    }

    .panel-control .Pc-principal {
        padding: 0 2rem;
    }

    .buscador {
        position: relative;
    }

    .input-buscador {
        width: 25rem;
        border-radius: 15px;
        padding: 0.1rem 0.5rem;
        font-size: 0.9em;
        transition: all linear 200ms;
    }

    .input-buscador:focus {
        outline: none;
        padding: 0.1rem 0.5rem;
    }

    .input-buscador:focus~.icon-buscador a {
        color: #b71c1c !important;
    }

    .icon-buscador {
        position: absolute;
        right: 0;
    }

    .icon-buscador a {
        color: #000;
        transition: all linear 200ms;
    }

    .icon-buscador a:hover {
        color: #000;
    }

    .icon-buscador a ion-icon {
        font-size: 2em;
    }

    .add-icon {
        font-size: 1.3em;
        color: #000;
    }

    .add-icon:hover {
        font-size: 1.3em;
        color: #b71c1c;
    }

    .panel-control .PC-secundario {
        border-top: 1px solid rgba(0, 0, 0, 0.125);
    }

    .panel-control .PC-secundario .PC-button {
        padding: 0.3rem 1rem;
        color: #fff;
        width: 16.66%;
        font-size: 0.9em;

    }

    .panel-control .PC-secundario .PC-button ion-icon,
    .panel-control .PC-secundario .PC-button .fas {
        margin-right: 0.5rem;
    }

    .excel {
        background-color: #67CB99;
    }

    .importExcel {
        background-color: #67bfcb;
    }

    .templateExcel {
        background-color: #f0e338;
    }

    .filter {
        background-color: #C4C4C4;
    }

    .graphic {
        background-color: #d68a8a;
    }

    .restore {
        background-color: #da9e6e;
    }

    .excel:hover {
        background-color: #5db88a;
    }

    .importExcel:hover {
        background-color: #5aa8b3;
    }

    .templateExcel:hover {
        background-color: #e7da27;
    }

    .filter:hover {
        background-color: #b1adad;
    }

    .graphic:hover {
        background-color: #c57373;
    }

    .restore:hover {
        background-color: #cc8b55;
    }

    .modal-footer {
        padding: 0 !important;
    }

</style>

@extends('layouts.app')

@section('content')
    @include('layouts.partials.dashNav')
    <div class="container containerMain">
        <div class="panel-control displayColIniC">
            <div class="PC-principal displayRowSbC">
                <h2 class="mt-4 mb-4">{{ __('pov.usersReg') }}</h2>
                <div class="buscador">
                    <input type="text" placeholder="{{ __('pov.search') }}" class="input-buscador" id="buscador">
                    <label for="buscador" class="icon-buscador">
                        <a href="">
                            <ion-icon name="search-circle"></ion-icon>
                        </a>
                    </label>
                </div>
                <a href="" class="add-icon displayRowCC">
                    <ion-icon name="add-circle"></ion-icon>
                    {{ __('pov.addUser') }}
                </a>
            </div>
            <div class="PC-secundario displayRowEndC">
                <a href="" class="PC-button filter displayRowCC">
                    <ion-icon name="filter"></ion-icon>
                    {{ __('pov.filter') }}
                </a>
                <a href="" class="PC-button graphic displayRowCC">
                    <ion-icon name="pie-chart"></ion-icon>
                    {{ __('pov.graphic') }}
                </a>
                <a href="" class="PC-button restore displayRowCC">
                    <ion-icon name="sync-circle"></ion-icon>
                    {{ __('pov.restore') }}
                </a>
                <a href="" data-toggle="modal" data-target="#exampleModal" class="PC-button importExcel displayRowCC">
                    <i class="fas fa-file-upload"></i>
                    {{ __('pov.impoExcel') }}
                </a>
                <a href="{{ route('usuarios.template') }}" class="PC-button templateExcel displayRowCC">
                    <i class="fas fa-file-download"></i>
                    {{ __('pov.templateExcel') }}
                </a>
                <a href="{{ route('usuarios.export') }}" class="PC-button excel displayRowCC">
                    <i class="fas fa-file-excel"></i>
                    {{ __('pov.excel') }}
                </a>
            </div>

        </div>
        @include('imports.users')
        <div class="cont-card-img-table">
            @foreach ($usuarios as $usuario)
                <div class="card card-img-table">
                    <img src="{{ asset('storage/imgPerfil/' . $usuario->foto_perfil . '') }}" class=" card-img-MC"
                        alt="FotoPerfilMariaCano">
                    <div class="actions">
                        @include('usuarios.resetPhoto')
                        <a href="{{ route('usuarios.edit', $usuario) }}" title="{{ __('pov.edit') }}"><i
                                class="fas fa-user-edit"></i></a>
                        @include('usuarios.delete')
                    </div>
                    <div class="card-header">
                        {{ $usuario->name }} {{ $usuario->apellido }} <br>
                        @if ($usuario->roles->nombre_rol == 'Coordinador' && $usuario->genero == 'Masculino')
                            <a href="{{ route('usuarios.indexRol', $usuario) }}" class="txtRol">
                                {{ __('pov.rolCoorM') }}
                            @elseif($usuario->roles->nombre_rol == 'Coordinador' && $usuario->genero == 'Femenino')
                                <a href="{{ route('usuarios.indexRol', $usuario) }}" class="txtRol">
                                    {{ __('pov.rolCoorF') }}
                                @elseif($usuario->roles->nombre_rol == 'Docente')
                                    <a href="{{ route('usuarios.indexRol', $usuario) }}" class="txtDoc">
                                        {{ __('pov.rolDoc') }}
                                    @elseif($usuario->roles->nombre_rol == 'Estudiante')
                                        <a href="{{ route('usuarios.indexRol', $usuario) }}" class="txtEst">
                                            {{ __('pov.rolEst') }}
                                        @elseif($usuario->roles->nombre_rol == 'Acudiente')
                                            <a href="{{ route('usuarios.indexRol', $usuario) }}" class="txtAcu">
                                                {{ __('pov.rolAcu') }}
                                            @else
                                                <a href="{{ route('usuarios.indexRol', $usuario) }}" class="txtOther">
                                                    {{ $usuario->roles->nombre_rol }}

                        @endif


                        @if ($usuario->genero == 'Masculino')
                            <ion-icon name="male-outline"></ion-icon>
                        @else
                            <ion-icon name="female-outline"></ion-icon>
                        @endif
                        </a>
                    </div>
                    <ul class="list-group list-group-flush">
                        @if ($usuario->tipo_documento == 'Cedula de ciudadania')
                            <li class="list-group-item">{{ __('pov.TDCedula') }}<br> {{ $usuario->id }}</li>
                        @elseif($usuario->tipo_documento == 'Tarjeta de identidad')
                            <li class="list-group-item">{{ __('pov.TDTarjeta') }}<br> {{ $usuario->id }}</li>
                        @else
                            <li class="list-group-item">{{ __('pov.TDCedulaEx') }}<br> {{ $usuario->id }}</li>
                        @endif
                        <li class="list-group-item">{{ $usuario->email }}</li>
                        <li class="list-group-item">{{ $usuario->celular }} - {{ $usuario->telefono_fijo }}</li>
                        <li class="list-group-item">{{ date('d-m-Y', strtotime($usuario->fecha_nacimiento)) }} -
                            {{ $usuario->direccion }}
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>
        <div class="cont-links displayRowCC">
            {{ $usuarios->links() }}
        </div>
    </div>
@endsection
