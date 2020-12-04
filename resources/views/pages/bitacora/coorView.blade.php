<h3 class="mb-2">{{ __('pov.txtEstuServ') }}</h3>
<div class="displayRowIniC mb-4">
    @forelse ($salas as $sala)
        <div class="card mr-3">
            <div class="card-header displayRowCC">
                @if (Auth::user()->foto_perfil == 'icon.png')
                    <img style="width: 3rem; height: 3rem; border-radius: 100%;" class="mr-2"
                        src="{{ asset('img/icon.png') }}" alt="">
                @else
                    <img src="{{ asset('storage/' . $sala->estu->user->foto_perfil) }}" alt="">
                @endif
                <b>{{ $sala->estu->user->name }} <br>{{ $sala->estu->user->apellido }}</b>
            </div>
            <div class="card-header">
                {{ __('pov.txtHrsService') }}: {{ $sala->estu->tiempo_servicio }} {{ __('pov.txtHours') }}
            </div>
            <div class="card-body">
                {{ __('pov.txtNombZona') }}:
                <br>
                {{ $sala->zonaSS->nombre_zona }}
                <br>
                {{ $sala->tiempo_servicio }} / {{ $sala->zonaSS->tiempo_servicio }} {{ __('pov.txtHours') }}
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="{{ route('bitacora.indexBit', $sala->id) }}" class="a-option"><i
                            class="fas fa-address-book"></i> {{ __('pov.txtVerBita') }}</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('bitacora.create', $sala) }}" class="a-option"><i class="fas fa-plus-square"></i>
                        {{ __('pov.txtAddBita') }}</a>
                </li>
            </ul>
        </div>
    @empty
        <div class="card" style="width: 100%;">
            <div class="card-body displayRowCC">
                <h5 class="card-title displayRowCC">
                    <ion-icon style="font-size: 1.5em; color: rgb(230, 175, 57);" name="alert-circle-outline" class="mr-2">
                    </ion-icon>{{ __('pov.noExistSS') }}
                </h5>
            </div>
        </div>
    @endforelse
</div>
<div class='cont-links displayRowCC'>
    {{ $salas->links() }}
</div>

<h3 class="mb-2">{{ __('pov.txtRegsBita') }}</h3>

<table class="table">
    <thead>
        <tr>
            <th scope="col">{{ __('pov.txtFechaRegistro') }}</th>
            <th scope="col">{{ __('pov.txtTiempoPrestado') }}</th>
            <th scope="col">{{ __('pov.txtObservaciones') }}</th>
            <th scope="col">{{ __('pov.txtLaboresRealizadas') }}</th>
            <th scope="col">{{ __('pov.rolEst') }}</th>
            <th scope="col">{{ __('pov.txtZonaServicio') }}</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($bi as $bita)
            <tr>
                <td>{{ date('d/m/Y', strtotime($bita->created_at)) }}</td>
                <td>{{ $bita->tiempo_prestado }}</td>
                <td>{{ $bita->observaciones }}</td>
                <td>{{ $bita->labores }}</td>
                <td>{{ $bita->salaSS->estu->user->name }} {{ $bita->salaSS->estu->user->apellido }}</td>
                <td>{{ $bita->salaSS->zonaSS->nombre_zona }}</td>
                <td>
                    <a class="a-option" href="{{ route('bitacora.edit', $bita) }}" title="{{ __('pov.edit') }}"><i
                            class="far fa-edit"></i>
                </td>
                <td>
                    @include('layouts.forms.delete',[
                    'class'=> 'bitacora',
                    'icono'=> 'fa-trash-alt',
                    'retorno' => $bita,
                    ])
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8">
                    <div class="card" style="width: 100%;">
                        <div class="card-body displayRowCC">
                            <h5 class="card-title displayRowCC">
                                <ion-icon style="font-size: 1.5em; color: rgb(230, 175, 57);" name="alert-circle-outline"
                                    class="mr-2">
                                </ion-icon>{{ __('pov.noExistBit') }}
                            </h5>
                        </div>
                    </div>
                </td>
            </tr>

        @endforelse
    </tbody>
</table>
