@extends('layouts.app')

@section('content')
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Todos los pqrs</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Preguntas</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Queja</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#reclamo" role="tab" aria-controls="contact" aria-selected="false">Reclamo</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Sugerencia" role="tab" aria-controls="contact" aria-selected="false">Sugerencia</a>
              </li>
          </ul>
    
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <table class="table">
                    <thead>
                <th>Categoria</th>
                <th>Asunto</th>
                <th>Respuesta</th>
                <th>Nombre</th>
                <th>Acciones</th>
                    </thead>
                    <tbody>
                        @foreach ($pqrs as $pqrss)
                        <tr>
                            <td>{{$pqrss->categoria}}</td>
                            <td>{{$pqrss->asunto}}</td>
                            <td>{{$pqrss->respuesta}}</td>
                            <td>{{$pqrss->acudientes->id}}</td>
                            <td><a href="{{route('pqrs.responder',$pqrss)}}">Responder</a>
                              
                             </td>
                        </tr>
                        
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <table class="table">
                    <thead>
                <th>Categoria</th>
                <th>Asunto</th>
                <th>Respuesta</th>
                <th>Nombre</th>
                <th>Acciones</th>
                    </thead>
                    <tbody>
                        @foreach ($Pregunta as $pqrss)
                        <tr>
                            <td>{{$pqrss->categoria}}</td>
                            <td>{{$pqrss->asunto}}</td>
                            <td>{{$pqrss->respuesta}}</td>
                            <td>{{$pqrss->acudientes->id}}</td>
                            <td><a href="{{route('pqrs.responder',$pqrss)}}">Responder</a>
                              
                             </td>
                        </tr>
                        
                    @endforeach
                    </tbody>
                </table>

            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <table class="table">
                    <thead>
                <th>Categoria</th>
                <th>Asunto</th>
                <th>Respuesta</th>
                <th>Nombre</th>
                <th>Acciones</th>
                    </thead>
                    <tbody>
                        @foreach ($Queja as $pqrss)
                        <tr>
                            <td>{{$pqrss->categoria}}</td>
                            <td>{{$pqrss->asunto}}</td>
                            <td>{{$pqrss->respuesta}}</td>
                            <td>{{$pqrss->acudientes->id}}</td>
                            <td><a href="{{route('pqrs.responder',$pqrss)}}">Responder</a>
                              
                             </td>
                        </tr>
                        
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="reclamo" role="tabpanel" aria-labelledby="contact-tab">
                <table class="table">
                    <thead>
                <th>Categoria</th>
                <th>Asunto</th>
                <th>Respuesta</th>
                <th>Nombre</th>
                <th>Acciones</th>
                    </thead>
                    <tbody>
                        @foreach ($Reclamo as $pqrss)
                        <tr>
                            <td>{{$pqrss->categoria}}</td>
                            <td>{{$pqrss->asunto}}</td>
                            <td>{{$pqrss->respuesta}}</td>
                            <td>{{$pqrss->acudientes->id}}</td>
                            <td><a href="{{route('pqrs.responder',$pqrss)}}">Responder</a>
                              
                             </td>
                        </tr>
                        
                    @endforeach
                    </tbody>
                </table>

            </div>
            <div class="tab-pane fade" id="Sugerencia" role="tabpanel" aria-labelledby="contact-tab">
                <table class="table">
                    <thead>
                <th>Categoria</th>
                <th>Asunto</th>
                <th>Respuesta</th>
                <th>Nombre</th>
                <th>Acciones</th>
                    </thead>
                    <tbody>
                        @foreach ($Sugerencia as $pqrss)
                        <tr>
                            <td>{{$pqrss->categoria}}</td>
                            <td>{{$pqrss->asunto}}</td>
                            <td>{{$pqrss->respuesta}}</td>
                            <td>{{$pqrss->acudientes->id}}</td>
                            <td><a href="{{route('pqrs.responder',$pqrss)}}">Responder</a>
                              
                             </td>
                        </tr>
                        
                    @endforeach
                    </tbody>
                </table>

            </div>

          </div>
        
@endsection
