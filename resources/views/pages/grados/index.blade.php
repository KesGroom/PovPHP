<div class="col-md-6">
    @foreach ($grados as $grado)
        <div class="card mb-2 ">
            <div class="card-body displayRowSbC">
                <div class="card-text displayRowCC">
                    <ion-icon name="people-circle" class="mr-4"></ion-icon>{{$grado->nombre_grado}} 
                    <b class="ml-2">({{$grado->nivel_educativo}})</b>
                </div>
                <div class="displayRowCC">
                    <a class="a-option" href="{{route('grados.edit',$grado)}}" title="{{ __('pov.edit') }}"><i
                            class="far fa-edit"></i></a>
                    @include('layouts.forms.delete',[
                    'class'=> 'grados',
                    'icono'=> 'fa-trash-alt',
                    'retorno' => $grado,
                    ])
                </div>
            </div>
        </div>
    @endforeach
    <div class='cont-links displayRowCC'>
        {{ $grados->links() }}
    </div>
</div>
<div class="col-md-6">
    @include('pages.grados.create')
</div>
