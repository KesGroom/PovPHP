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
<div class="col-md-6">
    @foreach ($cursos as $curso)
        <div class="card mb-2 ">
            <div class="card-body displayRowSbC">
                <div class="card-text displayRowCC">
                    <ion-icon name="people" class="mr-4"></ion-icon>{{ $curso->curso }}
                    <b class="ml-2">({{ __('pov.txtSalon')}}: {{ $curso->salon }})</b>
                </div>
                <div class="displayRowCC">
                    <a class="a-option" href="{{ route('cursos.edit', $curso) }}" title="{{ __('pov.edit') }}"><i
                            class="far fa-edit"></i></a>
                    @include('layouts.forms.delete',[
                    'class'=> 'cursos',
                    'icono'=> 'fa-trash-alt',
                    'retorno' => $curso,
                    ])
                </div>
            </div>
        </div>
    @endforeach
    <div class='cont-links displayRowCC'>
        {{ $cursos->links() }}
    </div>
</div>
<div class="col-md-6">
    @include('pages.cursos.create')
</div>
@endsection