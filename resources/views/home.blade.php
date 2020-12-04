@extends('layouts.app')
@section('content')
@section('nav')
    @include('layouts.partials.dashNav')
    <div class="row p-3" style="margin-right: 0px;">
        <div class="col-sm-9">
            <img src="{{asset('img/First-New.png')}}" alt="" style="width: 100%; border-bottom: 3px solid black; border-radius: 5px;">
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-11 mt-4 displayRowCC">
                    @include('layouts.dash.relojes')
                </div>
                <div class="col-md-11 mt-4 displayRowCC ">
                    @include('layouts.dash.fechas')
                </div>
                <div class="col-md-11 mt-4 displayRowCC">
                    @include('layouts.dash.frases')
                </div>
            </div>
        </div>
    </div>
@endsection

