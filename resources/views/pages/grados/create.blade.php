<div class="card">
    <div class="card-header"><ion-icon name="people-circle" class="mr-4"></ion-icon>{{ __('pov.registerGrade') }}</div>

    <div class="card-body">
        <form method="POST" action="{{ route('grados.store') }}">
            @csrf
            <div class="form-group row">
                <label for="nombre_grado" class="col-md-12 col-form-label text-md-left">{{ __('pov.txtGrade')}}</label>

                <div class="col-md-12">
                    <input id="nombre_grado" type="text"
                        class="form-control @error('nombre_grado') is-invalid @enderror" name="nombre_grado"
                        value="{{ old('nombre_grado') }}" required autocomplete="nombre_grado" autofocus>

                    @error('nombre_grado')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class=" ">
                <label for="nivel_educativo">{{ __('pov.txtNivel') }}</label>
                <select class="form-control" id="nivel_educativo" name="nivel_educativo" required>
                    <option value="">{{ __('pov.select') }}</option>
                    <option value="Primaria">{{ __('pov.txtPrimaria')}}
                    </option>
                    <option value="Secundaria">{{ __('pov.txtSecundaria')}}
                    </option>
                    <option value="Media">{{ __('pov.txtMedia')}}
                    </option>
                </select>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-MC btn-footer">
                    {{ __('pov.register') }}
                </button>
            </div>
        </form>
    </div>
</div>
