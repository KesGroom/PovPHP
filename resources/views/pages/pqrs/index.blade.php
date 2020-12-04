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
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true">{{ __('pov.AllPQRS') }}
                        @if ($ctAll > 0)
                            <span class="badge badge-info text-light">{{ $ctAll }}</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false">{{ __('pov.txtPregunta') }}
                        @if ($ctPregunta > 0)
                            <span class="badge badge-info text-light">{{ $ctPregunta }}</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                        aria-controls="contact" aria-selected="false">{{ __('pov.txtQueja') }}
                        @if ($ctQueja > 0)
                            <span class="badge badge-info text-light">{{ $ctQueja }}</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#reclamo" role="tab"
                        aria-controls="contact" aria-selected="false">{{ __('pov.txtReclamo') }}
                        @if ($ctReclamo > 0)
                            <span class="badge badge-info text-light">{{ $ctReclamo }}</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Sugerencia" role="tab"
                        aria-controls="contact" aria-selected="false">{{ __('pov.txtSugerencia') }}
                        @if ($ctSugerencia > 0)
                            <span class="badge badge-info text-light">{{ $ctSugerencia }}</span>
                        @endif
                    </a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    @include('pages.pqrs.list',[
                    'pqrsList' => $pqrs,
                    'coorView' => 'true',
                    ])
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    @include('pages.pqrs.list',[
                    'pqrsList' => $Pregunta,
                    'coorView' => 'true',
                    ])
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    @include('pages.pqrs.list',[
                    'pqrsList' => $Queja,
                    'coorView' => 'true',
                    ])
                </div>
                <div class="tab-pane fade" id="reclamo" role="tabpanel" aria-labelledby="contact-tab">
                    @include('pages.pqrs.list',[
                    'pqrsList' => $Reclamo,
                    'coorView' => 'true',
                    ])
                </div>
                <div class="tab-pane fade" id="Sugerencia" role="tabpanel" aria-labelledby="contact-tab">
                    @include('pages.pqrs.list',[
                    'pqrsList' => $Sugerencia,
                    'coorView' => 'true',
                    ])
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
