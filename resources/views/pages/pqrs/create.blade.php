@extends('layouts.app')
@section('content')
@section('nav')
    @include('layouts.partials.dashNav')

    @if (session('status'))
        @section('script')
            @include('layouts.partials.alerts',[
            'option' => session('status'),
            ])
        @endsection
    @endif
@endsection
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('pov.newPQRS') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('pqrs.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="asunto"
                                class="col-md-12 col-form-label text-md-left">{{ __('pov.txtAsunto') }}</label>

                            <div class="col-md-12">
                                <textarea id="asunto" rows="6"
                                    class="form-control @error('asunto') is-invalid @enderror" name="asunto"
                                    value="{{ old('asunto') }}" required autocomplete="asunto" autofocus></textarea>

                                @error('asunto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class=" ">
                            <label for="categoria">{{ __('pov.txtCategory') }}</label>
                            <select class="form-control" id="categoria" name="categoria" required>
                                <option value="Pregunta">{{ __('pov.txtPregunta') }}</option>
                                <option value="Queja">{{ __('pov.txtQueja') }}</option>
                                <option value="Reclamo">{{ __('pov.txtReclamo') }}</option>
                                <option value="Sugerencia">{{ __('pov.txtSugerencia') }}</option>
                            </select>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-MC btn-footer">
                                {{ __('pov.txtSend') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <h3 class="mb-4">{{ __('pov.tltMisPQRS') }}</h3>
            @forelse ($myPQRS as $pqrs)
                <div class="card mb-4">
                    <div class="card-header displayRowSbC">
                        <div>
                            @switch($pqrs->categoria)
                                @case('Pregunta')
                                    {{ __('pov.txtPregunta')}}
                                    @break
                                @case('Queja')
                                    {{ __('pov.txtQueja')}}
                                    @break
                                @case('Reclamo')
                                    {{ __('pov.txtReclamo')}}
                                    @break
                                @case('Sugerencia')
                                    {{ __('pov.txtSugerencia')}}
                                    @break
                                    
                            @endswitch
                        ( 
                        @if (date('d', strtotime(date('d-m-Y H:i:s')." - ".date('d', strtotime($pqrs->created_at))." days"))>0
                        && date('d', strtotime($pqrs->created_at))!=date('d', strtotime(date('d-m-Y H:i:s'))))
                            {{ __('pov.txtSendDay') }}
                            @if (date('d', strtotime($pqrs->created_at))<date('d', strtotime(date('d-m-Y H:i:s'))))
                            {{ date('d', strtotime(date('d-m-Y H:i:s')." - ".date('d', strtotime($pqrs->created_at))." days")) }} 
                            {{ __('pov.txtDays')}}
                            @else
                            {{ date('d', strtotime($pqrs->created_at." - ".date('d', strtotime(date('d-m-Y H:i:s')))." days")) }}
                            {{ __('pov.txtDays')}}
                            @endif
                        @elseif(date('H', strtotime(date('d-m-Y H:i:s')." - ".date('H', strtotime($pqrs->created_at))." hours"))>0)
                            {{ __('pov.txtSendDay') }}    
                            @if (date('H', strtotime($pqrs->created_at))<date('H', strtotime(date('d-m-Y H:i:s'))))
                            {{ date('H', strtotime(date('d-m-Y H:i:s')." - ".date('H', strtotime($pqrs->created_at))." hours")) }}    
                            {{ __('pov.txtHours')}}
                            @else
                            {{ date('H', strtotime($pqrs->created_at." - ".date('H', strtotime(date('d-m-Y H:i:s')))." hours")) }}
                            {{ __('pov.txtHours')}}
                            @endif
                        @elseif(date('i', strtotime(date('d-m-Y H:i:s')." - ".date('i', strtotime($pqrs->created_at))." minutes"))>0)
                            {{ __('pov.txtSendDay') }}
                            @if (date('i', strtotime($pqrs->created_at))<date('i', strtotime(date('d-m-Y H:i:s'))))
                            {{ date('i', strtotime(date('d-m-Y H:i:s')." - ".date('i', strtotime($pqrs->created_at))." minutes")) }}    
                            {{ __('pov.txtMinutes')}}
                            @else
                            {{ date('i', strtotime($pqrs->created_at." - ".date('i', strtotime(date('d-m-Y H:i:s')))." minutes")) }}
                            {{ __('pov.txtMinutes')}}
                            @endif
                        @else
                            {{ __('pov.txtNow')}}
                        @endif
                        )
                    </div>
                    <div class="cosa">
                        @include('layouts.forms.delete',[
                        'class'=> 'pqrs',
                        'icono'=> 'fa-trash-alt',
                        'retorno' => $pqrs,
                        ])
                    </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $pqrs->asunto }}</p>
                    </div>
                    @if ($pqrs->respuesta)                        
                    <div class="card-footer">
                        <div class="displayRowSbC">
                        <div class="card-text displayRowCC"><b class="mr-2">{{ __('pov.txtResponde')}}</b> {{$pqrs->coor->name}}</div>
                        <div class="card-text displayRowCC"><b class="mr-2">{{ __('pov.txtDateReply')}}</b> {{ date('d/m/Y', strtotime($pqrs->updated_at)) }}</div>
                        </div>
                        <div class="card-text"> {{$pqrs->respuesta}}</div>
                    </div>
                    @endif
                </div>
            @empty
                <div class="card" style="width: 100%;">
                    <div class="card-body displayRowCC">
                        <h5 class="card-title displayRowCC">
                            <ion-icon class="mr-2" style="font-size: 1.5em; color: rgb(230, 175, 57);"
                                name="alert-circle-outline">
                            </ion-icon> {{ __('pov.noResultPQRS') }}
                        </h5>
                    </div>
                </div>
            @endforelse
            <div class="cont-links displayRowCC">
                {{ $myPQRS->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
