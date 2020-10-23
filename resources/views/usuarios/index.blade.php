<style>
    .card-img-MC {
        position: absolute;
        width: 3rem;
        /*5*/
        height: 3rem;
        border-radius: 50%;
        top: -1.5rem;
        /*-2.5*/
        left: 0.5rem;
        transition: all linear 400ms;
    }

    .card-img-table {
        padding: 0.9rem 0 0 0;
        /*2rem*/
        width: 12rem;
        height: 100px;
        /*18*/
        transition: all linear 400ms;
        margin-top: 1rem;
        margin-right: 1rem;
        margin-bottom: 2.5rem;
    }

    .card-img-table {
        width: 18rem;
        height: fit-content;
        padding: 0 0 0 0;
    }

    .card-img-table .card-img-MC {
        width: 5rem;
        height: 5rem;
        border-radius: 50%;
        top: -2.5rem;
        left: 0.5rem;
    }

    .card-img-table .list-group-item {
        /* padding: 12px 20px; */
        height: 65px;
        overflow: hidden;
        transition: all linear 400ms;
        font-size: 13.5px;
    }

    .card-img-table .list-group {
        height: fit-content !important;
    }

    .card-img-table .actions {
        display: flex;
        flex-direction: row;
        justify-content: flex-end;
        align-items: center;
    }

    .cont-card-img-table {
        width: 100%;
        padding: 1rem;
        display: flex;
        flex-flow: row wrap;
        justify-content: space-between;
        align-content: center;
        margin-top: 1rem;
    }

    .txtRol {
        font-size: 12px;
        color: blueviolet;
    }

    .actions {
        width: 100%;
        padding: 0.5rem;
    }

    .actions a {
        color: black;
        margin-left: 1rem;
    }

    .actions a:hover {
        color: #b71c1c;
    }

    .cont-links {
        width: 100%;

    }

    /*-----*/
    .card-header {
        border: none !important;
    }

</style>

@extends('layouts.app')

@section('content')
    @include('layouts.partials.dashNav')
    <div class="container containerMain">
        <h2 class="mt-4 mb-4">Usuarios registrados</h2>
        <div class="cont-card-img-table">
            @foreach ($usuarios as $usuario)
                <div class="card card-img-table">
                    <img src="{{ asset('storage/imgPerfil/' . $usuario->foto_perfil . '') }}" class=" card-img-MC"
                        alt="FotoPerfilMariaCano">
                    <div class="actions">
                        <a href="{{ route('usuarios.edit', $usuario) }}" title="{{ __('pov.edit') }}"><i
                                class="fas fa-user-edit"></i></a>
                        <a href="" title="{{ __('pov.delete') }}"><i class="fas fa-user-minus"></i></a>
                    </div>
                    <div class="card-header">
                        {{ $usuario->name }} {{ $usuario->apellido }}
                        <p class="txtRol">{{ $usuario->roles->nombre_rol }}
                            @if ($usuario->genero == 'Masculino')
                                <ion-icon name="male-outline"></ion-icon>
                            @else
                                <ion-icon name="female-outline"></ion-icon>
                            @endif
                        </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $usuario->tipo_documento }} {{ $usuario->id }}</li>
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
