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
    @foreach ($areas as $area)
        <div class="card mb-2 ">
            <div class="card-body displayRowSbC">
                <div class="card-text displayRowCC">
                    <ion-icon name="school" class="mr-4"></ion-icon>{{ $area->nombre_area }}
                </div>
                <div class="displayRowCC">
                    <a class="a-option" href="{{ route('areas.edit', $area) }}" title="{{ __('pov.edit') }}"><i
                            class="far fa-edit"></i></a>
                    @include('layouts.forms.delete',[
                    'class'=> 'areas',
                    'icono'=> 'fa-trash-alt',
                    'retorno' => $area,
                    ])
                </div>
            </div>
        </div>
    @endforeach
    <div class='cont-links displayRowCC'>
        {{ $areas->links() }}
    </div>
</div>
<div class="col-md-6">
    @include('pages.areas.create')
</div>
@endsection