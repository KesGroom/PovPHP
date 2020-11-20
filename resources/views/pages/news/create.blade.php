@extends('layouts.app')
@section('content')
@section('nav')
@include('layouts.partials.dashNav')
@endsection
    <div class="container containerMain">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{ __('pov.createNew') }}</h5>
                    </div>
                    <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
                        @csrf
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="form-group row">
                                    <label for="titulo"
                                        class="col-md-4 col-form-label text-md-right">{{ __('pov.txtTitle') }}
                                    </label>
                                    <div class="col-md-6">
                                        <input id="titulo" type="text"
                                            class="form-control @error('titulo') is-invalid @enderror" name="titulo"
                                            required autocomplete="titulo">
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
                                        class="col-md-4 col-form-label text-md-right">{{ __('pov.txtSubtitle') }}
                                    </label>
                                    <div class="col-md-6">
                                        <input id="subtitulo" type="text"
                                            class="form-control @error('subtitulo') is-invalid @enderror" name="subtitulo"
                                            required autocomplete="titulo">
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
                                    <label for="info" class="col-md-4 col-form-label text-md-right">{{ __('pov.txtInfo') }}
                                    </label>
                                    <div class="col-md-6">
                                        <textarea id="info" type="text"
                                            class="form-control @error('info') is-invalid @enderror" name="info" required
                                            autocomplete="info"></textarea>
                                        @error('info')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <span class="newFile">
                                        <input id="newFile" type="file" accept="image/*"
                                            class="@error('newFile') is-invalid @enderror" name="newFile"
                                            autocomplete="newFile">
                                    </span>
                                    <label for="newFile" class="displayRowCC" style="width: 100%;">
                                        <ion-icon name="cloud-upload-outline" class="mr-2"></ion-icon>
                                        <span>{{ __('pov.uploadImg') }}</span>
                                    </label>
                                    @error('newFile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </li>

                        </ul>
                        <button type="submit" class="btn btn-MC btn-block btn-footer">
                            {{ __('pov.register') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
