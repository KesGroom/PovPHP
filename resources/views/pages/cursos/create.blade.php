<div class="card">
    <div class="card-header"><ion-icon name="people" class="mr-4"></ion-icon>{{ __('pov.registerCurso') }}</div>
    <div class="card-body">
        <form method="POST" action="{{ route('cursos.store') }}">
            @csrf
            <div class="form-group row">
                <label for="curso" class="col-md-12 col-form-label text-md-left">{{ __('pov.txtCurso') }}</label>

                <div class="col-md-12">
                    <input id="curso" type="text" maxlength="4"
                        class="solo-numero form-control @error('curso') is-invalid @enderror" name="curso"
                        value="{{ old('curso') }}" required autocomplete="curso" autofocus>

                    @error('curso')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="salon" class="col-md-12 col-form-label text-md-left">{{ __('pov.txtSalon') }}</label>

                <div class="col-md-12">
                    <input id="salon" type="text" maxlength="4" 
                        class="solo-numero form-control @error('salon') is-invalid @enderror" name="salon"
                        value="{{ old('salon') }}" required autocomplete="salon" autofocus>

                    @error('salon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class=" ">
                <label for="grado">{{ __('pov.txtGrade') }}</label>
                <select class="form-control" id="grado" name="grado" required>
                    <option value="" selected>{{ __('pov.select') }}</option>
                    @foreach ($gradosList as $grado)
                        <option value="{{ $grado->id }}">{{ $grado->nombre_grado }}</option>
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
