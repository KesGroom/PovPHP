<div class="card">
    <div class="card-header"><ion-icon name="library" class="mr-4"></ion-icon>{{ __('pov.registerMat') }}</div>
    <div class="card-body">
        <form method="POST" action="{{ route('materias.store') }}">
            @csrf
            <div class="form-group row">
                <label for="nombre_materia" class="col-md-12 col-form-label text-md-left">{{ __('pov.addMat')}}</label>

                <div class="col-md-12">
                    <input id="nombre_materia" type="text"
                        class="form-control @error('nombre_materia') is-invalid @enderror" name="nombre_materia"
                        value="{{ old('nombre_materia') }}" required autocomplete="nombre_materia" autofocus>

                    @error('nombre_materia')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class=" ">
                <label for="area">{{ __('pov.txtArea')}}</label>
                <select class="form-control" id="area" name="area" required>
                    <option value="">{{ __('pov.select')}}</option>
                    @foreach ($areasList as $area)
                        <option value="{{ $area->id }}">{{ $area->nombre_area }}</option>
                    @endforeach
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
