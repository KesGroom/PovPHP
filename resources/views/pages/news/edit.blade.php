@extends('layouts.app')

@section('content')
    @include('layouts.partials.dashNav')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="container containerMain">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('pov.editarReg') }}</div>
                    <form method="POST" action="{{ route('news.update', $noticia) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="form-group row">
                                    <label for="titulo"
                                        class="col-md-4 col-form-label text-md-right">{{ __('pov.txtTitle') }}</label>

                                    <div class="col-md-6">
                                        <input id="titulo" type="text"
                                            class="form-control @error('titulo') is-invalid @enderror" name="titulo"
                                            value="{{ $noticia->titulo }}" required autocomplete="titulo" autofocus>

                                        @error('titulo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group row">
                                    <label for="subtitulo"
                                        class="col-md-4 col-form-label text-md-right">{{ __('pov.txtSubtitle') }}</label>

                                    <div class="col-md-6">
                                        <input id="subtitulo" type="text"
                                            class="form-control @error('subtitulo') is-invalid @enderror" name="subtitulo"
                                            value="{{ $noticia->subtitulo }}" required autocomplete="subtitulo" autofocus>

                                        @error('subtitulo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group row">
                                    <label for="info"
                                        class="col-md-4 col-form-label text-md-right">{{ __('pov.txtInfo') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="info" type="text"
                                            class="form-control @error('info') is-invalid @enderror" name="info"
                                            value="{{ $noticia->informacion }}" required autocomplete="info" autofocus></textarea>

                                        @error('info')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group row">
                                    <label for="category"
                                        class="col-md-4 col-form-label text-md-right">{{ __('pov.txtCategory') }}</label>
                                    <select class="form-control col-md-6" id="category" name="categoria"
                                        required>
                                        @foreach ($categorias as $categoria)
                                            @if ($noticia->categoria == $categoria->id)
                                                <option value="{{ $categoria->id }}" selected>
                                                    {{ $categoria->nombre_categoria }}
                                                </option>
                                            @else
                                                <option value="{{ $categoria->id }}">
                                                    {{ $categoria->nombre_categoria }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </li>
                        </ul>
                        <li class="list-group-item displayRowSaC">
                            <img class="imgEditPerfil"
                                src="{{ asset('storage/colegio/' . $noticia->imagen . '') }}" alt="">
                            <div class="form-group">
                                <span class="newFile">
                                    <input id="newFile" type="file" accept="image/*"
                                        class="@error('newFile') is-invalid @enderror" name="newFile"
                                        autocomplete="newFile">
                                </span>
                                <label for="newFile" class="displayRowCC">
                                    <ion-icon name="cloud-upload-outline" class="mr-2"></ion-icon><span>{{__('pov.uploadImg')}}</span>
                                </label>
                                @error('newFile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </li>
                        <button type="submit" class="btn btn-MC btn-block btn-footer">
                            {{ __('pov.update') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
