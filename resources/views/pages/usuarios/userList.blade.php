   @forelse ($usuarios as $usuario)
       <div class="card card-img-table">
           @if ($usuario->foto_perfil == 'icon.png')
           <img src="{{ asset('img/icon.png') }}" class=" card-img-MC"
               alt="FotoPerfilMariaCano">
           @else
           <img src="{{ asset('storage/imgPerfil/' . $usuario->foto_perfil . '') }}" class=" card-img-MC"
               alt="FotoPerfilMariaCano">
           @endif
           <div class="actions">
               @if ($usuario->estado == 'Inactivo')
                   @include('layouts.forms.restore',[
                       'class' => 'usuarios',
                       'icono' => 'fa-user-clock',
                       'retorno' => $usuario,
                   ])
               @else
                   @include('pages.usuarios.resetPhoto')
                   <a href="{{ route('usuarios.edit', $usuario) }}" title="{{ __('pov.edit') }}"><i
                           class="fas fa-user-edit"></i></a>
                   @include('layouts.forms.delete',[
                       'class' => 'usuarios',
                       'icono' => 'fa-user-times',
                       'retorno' => $usuario,
                   ])
               @endif
           </div>
           <div class="card-header">
               {{ $usuario->name }} {{ $usuario->apellido }} <br>
               @if ($usuario->roles->nombre_rol == 'Coordinador' && $usuario->genero == 'Masculino')
                   <a href="{{ route('usuarios.indexRol', $usuario) }}" class="txtRol">
                       {{ __('pov.rolCoorM') }}
                   @elseif($usuario->roles->nombre_rol == 'Coordinador' && $usuario->genero == 'Femenino')
                       <a href="{{ route('usuarios.indexRol', $usuario) }}" class="txtRol">
                           {{ __('pov.rolCoorF') }}
                       @elseif($usuario->roles->nombre_rol == 'Docente')
                           <a href="{{ route('usuarios.indexRol', $usuario) }}" class="txtDoc">
                               {{ __('pov.rolDoc') }}
                           @elseif($usuario->roles->nombre_rol == 'Estudiante')
                               <a href="{{ route('usuarios.indexRol', $usuario) }}" class="txtEst">
                                   {{ __('pov.rolEst') }}
                               @elseif($usuario->roles->nombre_rol == 'Acudiente')
                                   <a href="{{ route('usuarios.indexRol', $usuario) }}" class="txtAcu">
                                       {{ __('pov.rolAcu') }}
                                   @else
                                       <a href="{{ route('usuarios.indexRol', $usuario) }}" class="txtOther">
                                           {{ $usuario->roles->nombre_rol }}

               @endif


               @if ($usuario->genero == 'Masculino')
                   <ion-icon name="male-outline"></ion-icon>
               @else
                   <ion-icon name="female-outline"></ion-icon>
               @endif
               </a>
           </div>
           <ul class="list-group list-group-flush">
               @if ($usuario->tipo_documento == 'Cedula de ciudadania')
                   <li class="list-group-item">{{ __('pov.TDCedula') }}<br> {{ $usuario->id }}</li>
               @elseif($usuario->tipo_documento == 'Tarjeta de identidad')
                   <li class="list-group-item">{{ __('pov.TDTarjeta') }}<br> {{ $usuario->id }}</li>
               @else
                   <li class="list-group-item">{{ __('pov.TDCedulaEx') }}<br> {{ $usuario->id }}</li>
               @endif
               <li class="list-group-item">{{ $usuario->email }}</li>
               <li class="list-group-item">{{ $usuario->celular }} - {{ $usuario->telefono_fijo }}</li>
               <li class="list-group-item">{{ date('d-m-Y', strtotime($usuario->fecha_nacimiento)) }} -
                   {{ $usuario->direccion }}
               </li>
           </ul>
       </div>
   @empty
       <div class="card" style="width: 100%;">
           <div class="card-body displayRowCC">
               <h5 class="card-title displayRowCC">
                   <ion-icon style="font-size: 1.5em; color: rgb(230, 175, 57);" name="alert-circle-outline" class="mr-2">
                   </ion-icon>{{ __('pov.noExist') }}
               </h5>
           </div>
       </div>
   @endforelse
   <div class="cont-links displayRowCC">
       {{ $usuarios->links() }}
   </div>
