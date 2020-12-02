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
    <div class="row">
        <div class="col-md-12">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                aria-selected="true">{{ __('pov.AllPQRS')}} 
                @if ($ctAll>0)
                <span class="badge badge-info text-light">{{$ctAll}}</span>
                @endif
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                aria-selected="false">{{ __('pov.txtPregunta')}}
                @if ($ctPregunta>0)
                <span class="badge badge-info text-light">{{$ctPregunta}}</span>
                @endif 
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                aria-selected="false">{{ __('pov.txtQueja')}} 
                @if ($ctQueja>0)
                <span class="badge badge-info text-light">{{$ctQueja}}</span>
                @endif
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#reclamo" role="tab" aria-controls="contact"
                aria-selected="false">{{ __('pov.txtReclamo')}} 
                @if ($ctReclamo>0)    
                    <span class="badge badge-info text-light">{{$ctReclamo}}</span>
                @endif
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Sugerencia" role="tab" aria-controls="contact"
                aria-selected="false">{{ __('pov.txtSugerencia')}} 
                @if ($ctSugerencia>0)
                <span class="badge badge-info text-light">{{$ctSugerencia}}</span>
                @endif
            </a> 
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            @forelse ($pqrs as $pqrss)
                <div class="card mt-4">
                    <div class="card-header displayRowSbC">
                        <div>
                            @switch($pqrss->categoria)
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
                        @if (date('d', strtotime(date('d-m-Y H:i:s')." - ".date('d', strtotime($pqrss->created_at))." days"))>0
                        && date('d', strtotime($pqrss->created_at))!=date('d', strtotime(date('d-m-Y H:i:s'))))
                            {{ __('pov.txtSendDay') }}
                            @if (date('d', strtotime($pqrss->created_at))<date('d', strtotime(date('d-m-Y H:i:s'))))
                            {{ date('d', strtotime(date('d-m-Y H:i:s')." - ".date('d', strtotime($pqrss->created_at))." days")) }} 
                            {{ __('pov.txtDays')}}
                            @else
                            {{ date('d', strtotime($pqrss->created_at." - ".date('d', strtotime(date('d-m-Y H:i:s')))." days")) }}
                            {{ __('pov.txtDays')}}
                            @endif
                        @elseif(date('H', strtotime(date('d-m-Y H:i:s')." - ".date('H', strtotime($pqrss->created_at))." hours"))>0)
                            {{ __('pov.txtSendDay') }}    
                            @if (date('H', strtotime($pqrss->created_at))<date('H', strtotime(date('d-m-Y H:i:s'))))
                            {{ date('H', strtotime(date('d-m-Y H:i:s')." - ".date('H', strtotime($pqrss->created_at))." hours")) }}    
                            {{ __('pov.txtHours')}}
                            @else
                            {{ date('H', strtotime($pqrss->created_at." - ".date('H', strtotime(date('d-m-Y H:i:s')))." hours")) }}
                            {{ __('pov.txtHours')}}
                            @endif
                        @elseif(date('i', strtotime(date('d-m-Y H:i:s')." - ".date('i', strtotime($pqrss->created_at))." minutes"))>0)
                            {{ __('pov.txtSendDay') }}
                            @if (date('i', strtotime($pqrss->created_at))<date('i', strtotime(date('d-m-Y H:i:s'))))
                            {{ date('i', strtotime(date('d-m-Y H:i:s')." - ".date('i', strtotime($pqrss->created_at))." minutes")) }}    
                            {{ __('pov.txtMinutes')}}
                            @else
                            {{ date('i', strtotime($pqrss->created_at." - ".date('i', strtotime(date('d-m-Y H:i:s')))." minutes")) }}
                            {{ __('pov.txtMinutes')}}
                            @endif
                        @else
                            {{ __('pov.txtNow')}}
                        @endif
                        )
                    </div>
                    <div class="cosa">
                        @if ($pqrss->respuesta)
                        <a href="{{ route('pqrs.responder', $pqrss) }}" class="text-dark ">{{__('pov.txtEditAnswer')}} <ion-icon name="arrow-redo"></ion-icon></a>
                        @else
                        <a href="{{ route('pqrs.responder', $pqrss) }}" class="text-dark ">{{__('pov.txtResponder')}} <ion-icon name="arrow-redo"></ion-icon></a>
                        @endif
                    </div>
                    </div>
                    <div class="card-body">
                        <b class="card-text">{{$pqrss->acudientes->user->name}} {{$pqrss->acudientes->user->apellido}}</b>
                        <p class="card-text">{{ $pqrss->asunto }}</p>
                    </div>
                    @if ($pqrss->respuesta)                        
                    <div class="card-footer">
                        <div class="displayRowSbC">
                        <div class="card-text displayRowCC"><b class="mr-2">{{ __('pov.txtResponde')}}</b> {{$pqrss->coor->name}}</div>
                        <div class="card-text displayRowCC"><b class="mr-2">{{ __('pov.txtDateReply')}}</b> {{ date('d/m/Y', strtotime($pqrss->updated_at)) }}</div>
                        </div>
                        <div class="card-text">{{$pqrss->respuesta}}</div>
                    </div>
                    @endif
                </div>
            @empty
                <div class="card mt-4" style="width: 100%;">
                    <div class="card-body displayRowCC">
                        <h5 class="card-title displayRowCC">
                            <ion-icon class="mr-2" style="font-size: 1.5em; color: rgb(230, 175, 57);"
                                name="alert-circle-outline">
                            </ion-icon> {{ __('pov.noResultPQRS') }}
                        </h5>
                    </div>
                </div>
            @endforelse
            <div class="cont-links mt-4 displayRowCC">
                {{ $pqrs->links() }}
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            @forelse ($Pregunta as $pqrss)
                <div class="card mt-4">
                    <div class="card-header displayRowSbC">
                        <div>
                            @switch($pqrss->categoria)
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
                        @if (date('d', strtotime(date('d-m-Y H:i:s')." - ".date('d', strtotime($pqrss->created_at))." days"))>0
                        && date('d', strtotime($pqrss->created_at))!=date('d', strtotime(date('d-m-Y H:i:s'))))
                            {{ __('pov.txtSendDay') }}
                            @if (date('d', strtotime($pqrss->created_at))<date('d', strtotime(date('d-m-Y H:i:s'))))
                            {{ date('d', strtotime(date('d-m-Y H:i:s')." - ".date('d', strtotime($pqrss->created_at))." days")) }} 
                            {{ __('pov.txtDays')}}
                            @else
                            {{ date('d', strtotime($pqrss->created_at." - ".date('d', strtotime(date('d-m-Y H:i:s')))." days")) }}
                            {{ __('pov.txtDays')}}
                            @endif
                        @elseif(date('H', strtotime(date('d-m-Y H:i:s')." - ".date('H', strtotime($pqrss->created_at))." hours"))>0)
                            {{ __('pov.txtSendDay') }}    
                            @if (date('H', strtotime($pqrss->created_at))<date('H', strtotime(date('d-m-Y H:i:s'))))
                            {{ date('H', strtotime(date('d-m-Y H:i:s')." - ".date('H', strtotime($pqrss->created_at))." hours")) }}    
                            {{ __('pov.txtHours')}}
                            @else
                            {{ date('H', strtotime($pqrss->created_at." - ".date('H', strtotime(date('d-m-Y H:i:s')))." hours")) }}
                            {{ __('pov.txtHours')}}
                            @endif
                        @elseif(date('i', strtotime(date('d-m-Y H:i:s')." - ".date('i', strtotime($pqrss->created_at))." minutes"))>0)
                            {{ __('pov.txtSendDay') }}
                            @if (date('i', strtotime($pqrss->created_at))<date('i', strtotime(date('d-m-Y H:i:s'))))
                            {{ date('i', strtotime(date('d-m-Y H:i:s')." - ".date('i', strtotime($pqrss->created_at))." minutes")) }}    
                            {{ __('pov.txtMinutes')}}
                            @else
                            {{ date('i', strtotime($pqrss->created_at." - ".date('i', strtotime(date('d-m-Y H:i:s')))." minutes")) }}
                            {{ __('pov.txtMinutes')}}
                            @endif
                        @else
                            {{ __('pov.txtNow')}}
                        @endif
                        )
                    </div>
                    <div class="cosa">
                        @if ($pqrss->respuesta)
                        <a href="{{ route('pqrs.responder', $pqrss) }}" class="text-dark ">{{__('pov.txtEditAnswer')}} <ion-icon name="arrow-redo"></ion-icon></a>
                        @else
                        <a href="{{ route('pqrs.responder', $pqrss) }}" class="text-dark ">{{__('pov.txtResponder')}} <ion-icon name="arrow-redo"></ion-icon></a>
                        @endif
                    </div>
                    </div>
                    <div class="card-body">
                        <b class="card-text">{{$pqrss->acudientes->user->name}} {{$pqrss->acudientes->user->apellido}}</b>
                        <p class="card-text">{{ $pqrss->asunto }}</p>
                    </div>
                    @if ($pqrss->respuesta)                        
                    <div class="card-footer">
                        <div class="displayRowSbC">
                        <div class="card-text displayRowCC"><b class="mr-2">{{ __('pov.txtResponde')}}</b> {{$pqrss->coor->name}}</div>
                        <div class="card-text displayRowCC"><b class="mr-2">{{ __('pov.txtDateReply')}}</b> {{ date('d/m/Y', strtotime($pqrss->updated_at)) }}</div>
                        </div>
                        <div class="card-text"> {{$pqrss->respuesta}}</div>
                    </div>
                    @endif
                </div>
            @empty
                <div class="card mt-4" style="width: 100%;">
                    <div class="card-body displayRowCC">
                        <h5 class="card-title displayRowCC">
                            <ion-icon class="mr-2" style="font-size: 1.5em; color: rgb(230, 175, 57);"
                                name="alert-circle-outline">
                            </ion-icon> {{ __('pov.noResultPQRS') }}
                        </h5>
                    </div>
                </div>
            @endforelse
            <div class="cont-links mt-4 displayRowCC">
                {{ $Pregunta->links() }}
            </div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            @forelse ($Queja as $pqrss)
                <div class="card mt-4">
                    <div class="card-header displayRowSbC">
                        <div>
                            @switch($pqrss->categoria)
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
                        @if (date('d', strtotime(date('d-m-Y H:i:s')." - ".date('d', strtotime($pqrss->created_at))." days"))>0
                        && date('d', strtotime($pqrss->created_at))!=date('d', strtotime(date('d-m-Y H:i:s'))))
                            {{ __('pov.txtSendDay') }}
                            @if (date('d', strtotime($pqrss->created_at))<date('d', strtotime(date('d-m-Y H:i:s'))))
                            {{ date('d', strtotime(date('d-m-Y H:i:s')." - ".date('d', strtotime($pqrss->created_at))." days")) }} 
                            {{ __('pov.txtDays')}}
                            @else
                            {{ date('d', strtotime($pqrss->created_at." - ".date('d', strtotime(date('d-m-Y H:i:s')))." days")) }}
                            {{ __('pov.txtDays')}}
                            @endif
                        @elseif(date('H', strtotime(date('d-m-Y H:i:s')." - ".date('H', strtotime($pqrss->created_at))." hours"))>0)
                            {{ __('pov.txtSendDay') }}    
                            @if (date('H', strtotime($pqrss->created_at))<date('H', strtotime(date('d-m-Y H:i:s'))))
                            {{ date('H', strtotime(date('d-m-Y H:i:s')." - ".date('H', strtotime($pqrss->created_at))." hours")) }}    
                            {{ __('pov.txtHours')}}
                            @else
                            {{ date('H', strtotime($pqrss->created_at." - ".date('H', strtotime(date('d-m-Y H:i:s')))." hours")) }}
                            {{ __('pov.txtHours')}}
                            @endif
                        @elseif(date('i', strtotime(date('d-m-Y H:i:s')." - ".date('i', strtotime($pqrss->created_at))." minutes"))>0)
                            {{ __('pov.txtSendDay') }}
                            @if (date('i', strtotime($pqrss->created_at))<date('i', strtotime(date('d-m-Y H:i:s'))))
                            {{ date('i', strtotime(date('d-m-Y H:i:s')." - ".date('i', strtotime($pqrss->created_at))." minutes")) }}    
                            {{ __('pov.txtMinutes')}}
                            @else
                            {{ date('i', strtotime($pqrss->created_at." - ".date('i', strtotime(date('d-m-Y H:i:s')))." minutes")) }}
                            {{ __('pov.txtMinutes')}}
                            @endif
                        @else
                            {{ __('pov.txtNow')}}
                        @endif
                        )
                    </div>
                    <div class="cosa">
                        @if ($pqrss->respuesta)
                        <a href="{{ route('pqrs.responder', $pqrss) }}" class="text-dark ">{{__('pov.txtEditAnswer')}} <ion-icon name="arrow-redo"></ion-icon></a>
                        @else
                        <a href="{{ route('pqrs.responder', $pqrss) }}" class="text-dark ">{{__('pov.txtResponder')}} <ion-icon name="arrow-redo"></ion-icon></a>
                        @endif
                    </div>
                    </div>
                    <div class="card-body">
                        <b class="card-text">{{$pqrss->acudientes->user->name}} {{$pqrss->acudientes->user->apellido}}</b>
                        <p class="card-text">{{ $pqrss->asunto }}</p>
                    </div>
                    @if ($pqrss->respuesta)                        
                    <div class="card-footer">
                        <div class="displayRowSbC">
                        <div class="card-text displayRowCC"><b class="mr-2">{{ __('pov.txtResponde')}}</b> {{$pqrss->coor->name}}</div>
                        <div class="card-text displayRowCC"><b class="mr-2">{{ __('pov.txtDateReply')}}</b> {{ date('d/m/Y', strtotime($pqrss->updated_at)) }}</div>
                        </div>
                        <div class="card-text"> {{$pqrss->respuesta}}</div>
                    </div>
                    @endif
                </div>
            @empty
                <div class="card mt-4" style="width: 100%;">
                    <div class="card-body displayRowCC">
                        <h5 class="card-title displayRowCC">
                            <ion-icon class="mr-2" style="font-size: 1.5em; color: rgb(230, 175, 57);"
                                name="alert-circle-outline">
                            </ion-icon> {{ __('pov.noResultPQRS') }}
                        </h5>
                    </div>
                </div>
            @endforelse
            <div class="cont-links mt-4 displayRowCC">
                {{ $Queja->links() }}
            </div>
        </div>
        <div class="tab-pane fade" id="reclamo" role="tabpanel" aria-labelledby="contact-tab">
            @forelse ($Reclamo as $pqrss)
                <div class="card mt-4">
                    <div class="card-header displayRowSbC">
                        <div>
                            @switch($pqrss->categoria)
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
                        @if (date('d', strtotime(date('d-m-Y H:i:s')." - ".date('d', strtotime($pqrss->created_at))." days"))>0
                        && date('d', strtotime($pqrss->created_at))!=date('d', strtotime(date('d-m-Y H:i:s'))))
                            {{ __('pov.txtSendDay') }}
                            @if (date('d', strtotime($pqrss->created_at))<date('d', strtotime(date('d-m-Y H:i:s'))))
                            {{ date('d', strtotime(date('d-m-Y H:i:s')." - ".date('d', strtotime($pqrss->created_at))." days")) }} 
                            {{ __('pov.txtDays')}}
                            @else
                            {{ date('d', strtotime($pqrss->created_at." - ".date('d', strtotime(date('d-m-Y H:i:s')))." days")) }}
                            {{ __('pov.txtDays')}}
                            @endif
                        @elseif(date('H', strtotime(date('d-m-Y H:i:s')." - ".date('H', strtotime($pqrss->created_at))." hours"))>0)
                            {{ __('pov.txtSendDay') }}    
                            @if (date('H', strtotime($pqrss->created_at))<date('H', strtotime(date('d-m-Y H:i:s'))))
                            {{ date('H', strtotime(date('d-m-Y H:i:s')." - ".date('H', strtotime($pqrss->created_at))." hours")) }}    
                            {{ __('pov.txtHours')}}
                            @else
                            {{ date('H', strtotime($pqrss->created_at." - ".date('H', strtotime(date('d-m-Y H:i:s')))." hours")) }}
                            {{ __('pov.txtHours')}}
                            @endif
                        @elseif(date('i', strtotime(date('d-m-Y H:i:s')." - ".date('i', strtotime($pqrss->created_at))." minutes"))>0)
                            {{ __('pov.txtSendDay') }}
                            @if (date('i', strtotime($pqrss->created_at))<date('i', strtotime(date('d-m-Y H:i:s'))))
                            {{ date('i', strtotime(date('d-m-Y H:i:s')." - ".date('i', strtotime($pqrss->created_at))." minutes")) }}    
                            {{ __('pov.txtMinutes')}}
                            @else
                            {{ date('i', strtotime($pqrss->created_at." - ".date('i', strtotime(date('d-m-Y H:i:s')))." minutes")) }}
                            {{ __('pov.txtMinutes')}}
                            @endif
                        @else
                            {{ __('pov.txtNow')}}
                        @endif
                        )
                    </div>
                    <div class="cosa">
                        @if ($pqrss->respuesta)
                        <a href="{{ route('pqrs.responder', $pqrss) }}" class="text-dark ">{{__('pov.txtEditAnswer')}} <ion-icon name="arrow-redo"></ion-icon></a>
                        @else
                        <a href="{{ route('pqrs.responder', $pqrss) }}" class="text-dark ">{{__('pov.txtResponder')}} <ion-icon name="arrow-redo"></ion-icon></a>
                        @endif
                    </div>
                    </div>
                    <div class="card-body">
                        <b class="card-text">{{$pqrss->acudientes->user->name}} {{$pqrss->acudientes->user->apellido}}</b>
                        <p class="card-text">{{ $pqrss->asunto }}</p>
                    </div>
                    @if ($pqrss->respuesta)                        
                    <div class="card-footer">
                        <div class="displayRowSbC">
                        <div class="card-text displayRowCC"><b class="mr-2">{{ __('pov.txtResponde')}}</b> {{$pqrss->coor->name}}</div>
                        <div class="card-text displayRowCC"><b class="mr-2">{{ __('pov.txtDateReply')}}</b> {{ date('d/m/Y', strtotime($pqrss->updated_at)) }}</div>
                        </div>
                        <div class="card-text"> {{$pqrss->respuesta}}</div>
                    </div>
                    @endif
                </div>
            @empty
                <div class="card mt-4" style="width: 100%;">
                    <div class="card-body displayRowCC">
                        <h5 class="card-title displayRowCC">
                            <ion-icon class="mr-2" style="font-size: 1.5em; color: rgb(230, 175, 57);"
                                name="alert-circle-outline">
                            </ion-icon> {{ __('pov.noResultPQRS') }}
                        </h5>
                    </div>
                </div>
            @endforelse
            <div class="cont-links mt-4 displayRowCC">
                {{ $Reclamo->links() }}
            </div>
        </div>
        <div class="tab-pane fade" id="Sugerencia" role="tabpanel" aria-labelledby="contact-tab">
            @forelse ($Sugerencia as $pqrss)
                <div class="card mt-4">
                    <div class="card-header displayRowSbC">
                        <div>
                            @switch($pqrss->categoria)
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
                        @if (date('d', strtotime(date('d-m-Y H:i:s')." - ".date('d', strtotime($pqrss->created_at))." days"))>0
                        && date('d', strtotime($pqrss->created_at))!=date('d', strtotime(date('d-m-Y H:i:s'))))
                            {{ __('pov.txtSendDay') }}
                            @if (date('d', strtotime($pqrss->created_at))<date('d', strtotime(date('d-m-Y H:i:s'))))
                            {{ date('d', strtotime(date('d-m-Y H:i:s')." - ".date('d', strtotime($pqrss->created_at))." days")) }} 
                            {{ __('pov.txtDays')}}
                            @else
                            {{ date('d', strtotime($pqrss->created_at." - ".date('d', strtotime(date('d-m-Y H:i:s')))." days")) }}
                            {{ __('pov.txtDays')}}
                            @endif
                        @elseif(date('H', strtotime(date('d-m-Y H:i:s')." - ".date('H', strtotime($pqrss->created_at))." hours"))>0)
                            {{ __('pov.txtSendDay') }}    
                            @if (date('H', strtotime($pqrss->created_at))<date('H', strtotime(date('d-m-Y H:i:s'))))
                            {{ date('H', strtotime(date('d-m-Y H:i:s')." - ".date('H', strtotime($pqrss->created_at))." hours")) }}    
                            {{ __('pov.txtHours')}}
                            @else
                            {{ date('H', strtotime($pqrss->created_at." - ".date('H', strtotime(date('d-m-Y H:i:s')))." hours")) }}
                            {{ __('pov.txtHours')}}
                            @endif
                        @elseif(date('i', strtotime(date('d-m-Y H:i:s')." - ".date('i', strtotime($pqrss->created_at))." minutes"))>0)
                            {{ __('pov.txtSendDay') }}
                            @if (date('i', strtotime($pqrss->created_at))<date('i', strtotime(date('d-m-Y H:i:s'))))
                            {{ date('i', strtotime(date('d-m-Y H:i:s')." - ".date('i', strtotime($pqrss->created_at))." minutes")) }}    
                            {{ __('pov.txtMinutes')}}
                            @else
                            {{ date('i', strtotime($pqrss->created_at." - ".date('i', strtotime(date('d-m-Y H:i:s')))." minutes")) }}
                            {{ __('pov.txtMinutes')}}
                            @endif
                        @else
                            {{ __('pov.txtNow')}}
                        @endif
                        )
                    </div>
                    <div class="cosa">
                        @if ($pqrss->respuesta)
                        <a href="{{ route('pqrs.responder', $pqrss) }}" class="text-dark ">{{__('pov.txtEditAnswer')}} <ion-icon name="arrow-redo"></ion-icon></a>
                        @else
                        <a href="{{ route('pqrs.responder', $pqrss) }}" class="text-dark ">{{__('pov.txtResponder')}} <ion-icon name="arrow-redo"></ion-icon></a>
                        @endif
                    </div>
                    </div>
                    <div class="card-body">
                        <b class="card-text">{{$pqrss->acudientes->user->name}} {{$pqrss->acudientes->user->apellido}}</b>
                        <p class="card-text">{{ $pqrss->asunto }}</p>
                    </div>
                    @if ($pqrss->respuesta)                        
                    <div class="card-footer">
                        <div class="displayRowSbC">
                        <div class="card-text displayRowCC"><b class="mr-2">{{ __('pov.txtResponde')}}</b> {{$pqrss->coor->name}}</div>
                        <div class="card-text displayRowCC"><b class="mr-2">{{ __('pov.txtDateReply')}}</b> {{ date('d/m/Y', strtotime($pqrss->updated_at)) }}</div>
                        </div>
                        <div class="card-text"> {{$pqrss->respuesta}}</div>
                    </div>
                    @endif
                </div>
            @empty
                <div class="card mt-4" style="width: 100%;">
                    <div class="card-body displayRowCC">
                        <h5 class="card-title displayRowCC">
                            <ion-icon class="mr-2" style="font-size: 1.5em; color: rgb(230, 175, 57);"
                                name="alert-circle-outline">
                            </ion-icon> {{ __('pov.noResultPQRS') }}
                        </h5>
                    </div>
                </div>
            @endforelse
            <div class="cont-links mt-4 displayRowCC">
                {{ $Sugerencia->links() }}
            </div>
        </div>

    </div>
</div>
</div>
</div>

@endsection
