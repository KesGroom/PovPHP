
<div class="col-md-6">
    @foreach ($materias as $materia)
        <div class="card mb-2 ">
            <div class="card-body displayRowSbC">
                <div class="card-text displayRowCC">
                    <ion-icon name="library" class="mr-4"></ion-icon>{{$materia->nombre_materia}} 
                    <b class="ml-2">({{$materia->areaM->nombre_area}})</b>
                </div>
                <div class="displayRowCC">
                    <a class="a-option" href="{{route('materias.edit', $materia)}}" title="{{ __('pov.edit') }}"><i
                            class="far fa-edit"></i></a>
                    @include('layouts.forms.delete',[
                    'class'=> 'materias',
                    'icono'=> 'fa-trash-alt',
                    'retorno' => $materia,
                    ])
                </div>
            </div>
        </div>
    @endforeach
    <div class='cont-links displayRowCC'>
        {{ $materias->links() }}
    </div>
</div>
<div class="col-md-6">
    @include('pages.materias.create')
</div>
