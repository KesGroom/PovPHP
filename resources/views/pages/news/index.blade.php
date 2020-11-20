<style>
    /*-----*/
    .containerMain .card-header {
        border: none !important;
    }

</style>
@extends('layouts.app')
@section('content')
@section('nav')
@include('layouts.partials.dashNav')
@endsection
    <div class="container containerMain">
        @include('layouts.partials.optionsTable',[
        'tituloPC'=> __('pov.newsReg'),
        'addElement'=> __('pov.addNew'),
        'importExcel' => route('news.import'),
        'exportExcel' => route('news.export'),
        'templateExcel' => route('news.template') ,
        'restore' => route('news.recovery') ,
        'add' => route('news.create'),
        ])
    </div>
    <div class="container" id="resultado">
    </div>
    @include('pages/news/newsList')
    <script>
        var clase = 'news';
    </script>
@endsection
