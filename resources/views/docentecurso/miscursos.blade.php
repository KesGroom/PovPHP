@extends('layouts.app')

@section('content')
<table class="table">
    <thead>
<th>Docente</th>
<th>curso</th>
    </thead>
    <tbody>
        @foreach ($cursos as $curso)
            <tr>
                <td>{{$curso->docente}}</td>
                <td>{{$curso->curso}}</td>
                <td>
                    <form method="POST" action="{{ route('docentecurso.crearplantillas') }}" >
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="curso" type="hidden" class="form-control @error('curso') is-invalid @enderror" name="curso" value="{{ $curso->curso }}" required autocomplete="curso" autofocus>
        
                                @error('curso')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">XD</button>
                    </form>
                </td>
            </tr>
        
        @endforeach

    </tbody>
</table>
@endsection
