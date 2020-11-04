

@extends('layouts.app')
@section('content')
    @include('layouts/partials/dashNav')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="container containerMain">
        <div class="row justify-content-around">
            <div class="row col-sd-12 col-md-6">
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">{{ __('pov.infoPersonal') }}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $usuario->name }} {{ $usuario->apellido }}</li>
                            <li class="list-group-item">{{ $usuario->tipo_documento }}</li>
                            <li class="list-group-item">{{ $usuario->id }}</li>
                            <li class="list-group-item">{{ date('d-m-Y', strtotime($usuario->fecha_nacimiento)) }}</li>
                        </ul>
                    </div>
                </div>
                @include('pages.userPages.changePass')

                <div class="row col-sd-12 col-md-6">
                    @include('pages.userPages.changePhoto')
                    @include('pages.userPages.changeInfo')
                </div>
            </div>
        </div>
    @endsection
