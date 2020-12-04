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
<div class="container">
    @if (Auth::user()->rol == 3)
        @include('pages.bitacora.estView')
    @else
        @include('pages.bitacora.coorView')
    @endif
</div>
@endsection
