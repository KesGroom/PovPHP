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

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('usuarios.store') }}">
                <div class="card">
                    @csrf
                    {{-- Infomración personal --}}
                    <div class="card-header">{{ __('pov.personalInfo') }}</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="form-group row">
                                <label for="tipo_documento"
                                    class="col-md-4 col-form-label text-md-right">{{ __('pov.txtTypeDocument') }}</label>
                                <select class="form-control col-md-6" id="tipo_documento" name="tipo_documento"
                                    required>
                                    <option value="" selected>{{ __('pov.select') }}</option>
                                    <option value="Cedula de ciudadania">{{ __('pov.TDCedula') }}
                                    </option>
                                    <option value="Cedula de extranjeria">{{ __('pov.TDCedulaEx') }}
                                    </option>
                                    <option value="Tarjeta de identidad">{{ __('pov.TDTarjeta') }}
                                    </option>
                                    <option value="Registro civil">{{ __('pov.TDRegistro') }}
                                    </option>
                                </select>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-group row">
                                <label for="id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('pov.txtDocumentNumber') }}</label>

                                <div class="col-md-6">
                                    <input id="id" maxlength="10" pattern="[0-9]{8,10}" type="text"
                                        class="solo-numero form-control @error('id') is-invalid @enderror" name="id"
                                        required autocomplete="id" autofocus>

                                    @error('id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('pov.txtNombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name" required
                                        autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-group row">
                                <label for="apellido"
                                    class="col-md-4 col-form-label text-md-right">{{ __('pov.txtApellido') }}</label>

                                <div class="col-md-6">
                                    <input id="apellido" type="text"
                                        class="form-control @error('apellido') is-invalid @enderror" name="apellido"
                                        required autocomplete="name" autofocus>

                                    @error('apellido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-group row">
                                <label for="fecha_nacimiento"
                                    class="col-md-4 col-form-label text-md-right">{{ __('pov.txtFechaNacimiento') }}</label>

                                <div class="col-md-6">
                                    <input id="fecha_nacimiento" type="date"
                                        max="{{ date('Y-m-d', strtotime(date('Y-m-d') . '- 5 years')) }}"
                                        min="{{ date('Y-m-d', strtotime(date('Y-m-d') . '- 80 years')) }}"
                                        class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                                        name="fecha_nacimiento" required autocomplete="date" autofocus>

                                    @error('fecha_nacimiento')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-group row">
                                <label for="genero"
                                    class="col-md-4 col-form-label text-md-right">{{ __('pov.txtGenero') }}</label>
                                <select class="form-control col-md-6" id="genero" name="genero" required>
                                    <option value="Masculino">{{ __('pov.GenderMale') }}
                                    </option>
                                    <option value="Femenino">{{ __('pov.GenderFemale') }}
                                    </option>
                                </select>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card mt-4">
                    {{-- Información de contacto --}}
                    <div class="card-header">{{ __('pov.contactInfo') }}</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="form-group row">
                                <label for="direccion"
                                    class="col-md-4 col-form-label text-md-right">{{ __('pov.txtAddress') }}</label>

                                <div class="col-md-6">
                                    <input id="direccion" type="text"
                                        class="form-control @error('direccion') is-invalid @enderror" name="direccion"
                                        required autocomplete="name" autofocus>

                                    @error('direccion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-group row">
                                <label for="celular"
                                    class="col-md-4 col-form-label text-md-right">{{ __('pov.txtCellPhone') }}</label>

                                <div class="col-md-6">
                                    <input id="celular" type="tel"
                                        class="solo-numero form-control @error('celular') is-invalid @enderror"
                                        name="celular" required autocomplete="name" autofocus>

                                    @error('celular')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-group row">
                                <label for="telefono_fijo"
                                    class="col-md-4 col-form-label text-md-right">{{ __('pov.txtPhone') }}</label>

                                <div class="col-md-6">
                                    <input id="telefono_fijo" type="text"
                                        class="form-control @error('telefono_fijo') is-invalid @enderror"
                                        name="telefono_fijo" placeholder="{{ __('pov.optional') }}" required
                                        autocomplete="name" autofocus>

                                    @error('telefono_fijo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('pov.txtEmail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="text"
                                        class="form-control @error('email') is-invalid @enderror" name="email" required
                                        autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
                <div class="card mt-4">
                    {{-- configuración de rol --}}
                    <div class="card-header">{{ __('pov.RolUser') }}</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="form-group row">
                                <label for="rol"
                                    class="col-md-4 col-form-label text-md-right">{{ __('pov.txtRol') }}</label>
                                <select class="form-control col-md-6" id="rol" name="rol" required>
                                    <option value="0" selected>{{ __('pov.select') }}</option>
                                    @foreach ($roles as $rol)
                                        <option value="{{ $rol->id }}">{{ $rol->nombre_rol }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" id="btn-others" class="btn btn-MC btn-block btn-footer Oculto">
                                {{ __('pov.register') }}
                            </button>
                        </li>
                        <ul class="list-group list-group-flush Oculto" id="Docente">
                            <div class="card-header">{{ __('pov.Docente') }}</div>
                            <li class="list-group-item">
                                <div class="form-group row">
                                    <label for="area"
                                        class="col-md-4 col-form-label text-md-right">{{ __('pov.txtNivel') }}</label>
                                    <select class="form-control col-md-6" id="area" name="area">
                                        <option value="">{{ __('pov.select') }}</option>
                                        @foreach ($areas as $area)
                                            <option value="{{ $area->id }}">{{ $area->nombre_area }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </li>
                            <li class="list-group-item">
                                {{-- <select multiple class="form-control col-md-6"
                                    id="materias" name="materias">
                                    <option value="">{{ __('pov.select') }}</option>
                                </select> --}}
                                <div class="form-group row">
                                    <div class="col-sm-2">Materias</div>
                                    <div class="col-sm-10">
                                        <div class="Check" id="materias">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-MC btn-block btn-footer">
                                    {{ __('pov.register') }}
                                </button>
                            </li>
                        </ul>
                        <ul class="list-group list-group-flush Oculto" id="Estudiante">
                            <div class="card-header">{{ __('pov.Estudiante') }}</div>
                            <li class="list-group-item">
                                <div class="form-group row">
                                    <label for="nivel"
                                        class="col-md-4 col-form-label text-md-right">{{ __('pov.txtNivel') }}</label>
                                    <select class="form-control col-md-6" id="nivel" name="nivel_type">
                                        <option value="">{{ __('pov.select') }}</option>
                                        <option value="Primaria">Primaria
                                        </option>
                                        <option value="Secundaria">Secundaria
                                        </option>
                                        <option value="Media">Media
                                        </option>
                                    </select>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group row">
                                    <label for="grades"
                                        class="col-md-4 col-form-label text-md-right">{{ __('pov.txtGrade') }}</label>
                                    <select class="form-control col-md-6" id="grades" name="grade">
                                        <option value="">{{ __('pov.select') }}</option>
                                    </select>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group row">
                                    <label for="courses"
                                        class="col-md-4 col-form-label text-md-right">{{ __('pov.txtCurso') }}</label>
                                    <select class="form-control col-md-6" id="courses" name="course">
                                        <option value="">{{ __('pov.select') }}</option>
                                    </select>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group row">
                                    <label for="acudiente"
                                        class="col-md-4 col-form-label text-md-right">{{ __('pov.rolAcu') }}</label>

                                    <div class="col-md-6">
                                        <input id="acudiente" type="text" list="acu-list"
                                            class="solo-numero form-control @error('acudiente') is-invalid @enderror"
                                            name="acudiente" autocomplete="acudiente" autofocus>

                                        @error('acudiente')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <datalist id="acu-list">
                                            @foreach ($acudientes as $acudiente)
                                                <option value="{{ $acudiente->id }}"></option>
                                            @endforeach
                                        </datalist>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-MC btn-block btn-footer">
                                    {{ __('pov.register') }}
                                </button>
                            </li>
                        </ul>
                    </ul>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script>
    var roles = document.getElementById('rol'),
        btn = document.getElementById('btn-others'),
        doc = document.getElementById('Docente'),
        est = document.getElementById('Estudiante');

    roles.addEventListener('change', function() {
        if (roles.value == 0) {
            doc.classList.add('Oculto');
            btn.classList.add('Oculto');
            est.classList.add('Oculto');
        } else if (roles.value == 2) {
            doc.classList.remove('Oculto');
            btn.classList.add('Oculto');
            est.classList.add('Oculto');
        } else if (roles.value == 3) {
            est.classList.remove('Oculto');
            btn.classList.add('Oculto');
            doc.classList.add('Oculto');
        } else {
            btn.classList.remove('Oculto');
            est.classList.add('Oculto');
            doc.classList.add('Oculto');
        }
    });

    //Nivel educativo
    $(document).ready(function() {
        $('#nivel').on('change', onChangeNivel);
    });

    function onChangeNivel() {
        var nivel_type = $(this).val();
        if (!nivel_type) {
            $('#grades').html('<option value="">Seleccione</option>');
            return;
        }
        if (!nivel_type) {
            $('#courses').html('<option value="">Seleccione</option>');
            return;
        }

        // AJAX
        $.get('/api/nivel_educativo/' + nivel_type + '/grados', function(data) {
            var html_select;
            for (let i = 0; i < data.length; i++) {
                html_select += '<option value="' + data[i].id + '">' + data[i].nombre_grado + '</option>';
            }
            $('#grades').html(html_select);
        });
    }

    //Grados
    $(document).ready(function() {
        $('#grades').on('change', onChangeGrades);
    });

    function onChangeGrades() {
        var grade_id = $(this).val();
        if (!grade_id) {
            $('#courses').html('<option value="">Seleccione</option>');
            return;
        }

        // AJAX
        $.get('/api/grado/' + grade_id + '/curso', function(data) {
            var html_select;
            for (let i = 0; i < data.length; i++) {
                html_select += '<option value="' + data[i].id + '">' + data[i].curso + ' Salón: ' + data[i]
                    .salon +
                    '</option>';
            }
            $('#courses').html(html_select);
        });
    }

    //Areas
    $(document).ready(function() {
        $('#area').on('change', onChangeAreas);
    });

    function onChangeAreas() {
        var area_id = $(this).val();
        if (!area_id) {
            $('#materias').html('<p>Por favor seleccione un area</p>');
            return;
        }

        // AJAX
        $.get('/api/area/' + area_id + '/materia', function(data) {
            var html_select;
            for (let i = 0; i < data.length; i++) {
                html_select +='<input class="form-check-input" type="checkbox" id="' + data[i].nombre_materia +
                    '"><label class="form-check-label" for="' + data[i].nombre_materia + '">' + data[i]
                    .nombre_materia + '</label>';
            }
            $('#materias').html(html_select);
        });
    }

</script>
@endsection
