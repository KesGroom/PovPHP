@extends('layouts.app')
@section('content')
    <form action="{{ route('mail.postular') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-MC">Enviar</button>
    </form>
    @include('mail.rees')
@endsection
