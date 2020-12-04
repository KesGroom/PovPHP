@forelse ($pqrsList as $pqrs)
    <div class="card mt-4">
        <div class="card-header displayRowSbC">
            <div>
                @switch($pqrs->categoria)
                    @case('Pregunta')
                    {{ __('pov.txtPregunta') }}
                    @break
                    @case('Queja')
                    {{ __('pov.txtQueja') }}
                    @break
                    @case('Reclamo')
                    {{ __('pov.txtReclamo') }}
                    @break
                    @case('Sugerencia')
                    {{ __('pov.txtSugerencia') }}
                    @break

                @endswitch
                (
                @if ($pqrs->created_at->diffInYears(now()) > 0)
                    {{ __('pov.txtSendDay') }}
                    {{ $pqrs->created_at->diffInYears(now()) }}
                    {{ __('pov.txtYears') }}
                @elseif ($pqrs->created_at->diffInMonths(now())>0)
                    {{ __('pov.txtSendDay') }}
                    {{ $pqrs->created_at->diffInMonths(now()) }}
                    {{ __('pov.txtMonths') }}
                @elseif ($pqrs->created_at->diffInDays(now())>0)
                    {{ __('pov.txtSendDay') }}
                    {{ $pqrs->created_at->diffInDays(now()) }}
                    {{ __('pov.txtDays') }}
                @elseif($pqrs->created_at->diffInHours(now())>0)
                    {{ __('pov.txtSendDay') }}
                    {{ $pqrs->created_at->diffInHours(now()) }}
                    {{ __('pov.txtHours') }}
                @elseif($pqrs->created_at->diffInMinutes(now())>0)
                    {{ __('pov.txtSendDay') }}
                    {{ $pqrs->created_at->diffInMinutes(now()) }}
                    {{ __('pov.txtMinutes') }}
                @else
                    {{ __('pov.txtNow') }}

                @endif
                )
            </div>
            <div class="cosa">
                @if ($coorView == 'true')
                    @if ($pqrs->respuesta)
                        <a href="{{ route('pqrs.responder', $pqrs) }}" class="text-dark ">{{ __('pov.txtEditAnswer') }}
                            <ion-icon name="arrow-redo"></ion-icon>
                        </a>
                    @else
                        <a href="{{ route('pqrs.responder', $pqrs) }}" class="text-dark ">{{ __('pov.txtResponder') }}
                            <ion-icon name="arrow-redo"></ion-icon>
                        </a>
                    @endif
                @else
                    @include('layouts.forms.delete',[
                    'class'=> 'pqrs',
                    'icono'=> 'fa-trash-alt',
                    'retorno' => $pqrs,
                    ])
                @endif
            </div>

        </div>
        <div class="card-body">
            @if ($coorView == 'true')
                <b class="card-text">{{ $pqrs->acudientes->user->name }} {{ $pqrs->acudientes->user->apellido }}</b>
            @endif
            <p class="card-text">{{ $pqrs->asunto }}</p>
        </div>
        @if ($pqrs->respuesta)
            <div class="card-footer">
                <div class="displayRowSbC">
                    <div class="card-text displayRowCC"><b class="mr-2">{{ __('pov.txtResponde') }}</b>
                        {{ $pqrs->coor->name }}
                    </div>
                    <div class="card-text displayRowCC"><b class="mr-2">{{ __('pov.txtDateReply') }}</b>
                        {{ date('d/m/Y', strtotime($pqrs->updated_at)) }}
                    </div>
                </div>
                <div class="card-text"> {{ $pqrs->respuesta }}</div>
            </div>
        @endif
    </div>
@empty
    <div class="card mt-4" style="width: 100%;">
        <div class="card-body displayRowCC">
            <h5 class="card-title displayRowCC">
                <ion-icon class="mr-2" style="font-size: 1.5em; color: rgb(230, 175, 57);" name="alert-circle-outline">
                </ion-icon> {{ __('pov.noResultPQRS') }}
            </h5>
        </div>
    </div>
@endforelse
<div class="cont-links displayRowCC">
    {{ $pqrsList->links() }}
</div>
