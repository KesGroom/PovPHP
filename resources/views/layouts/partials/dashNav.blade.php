<style>
    a.dropdown-item {
        color: black;
    }

</style>
<div class="enlaces">
    @foreach ($rhp as $permiso)
        @if ($permiso->permisos->permiso_padre == null)
            @if (session('lang') == 'es')
                <div class="dropdown">
                    <a href="" class="dropdown-toggle" role="button" id="{{ $permiso->permisos->nombre }}"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <ion-icon name="{{ $permiso->permisos->icon }}"></ion-icon> {{ $permiso->permisos->nombre }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="{{ $permiso->permisos->nombre }}">
                        @foreach ($rhp as $hijo)
                            @if ($hijo->permisos->permiso_padre == $permiso->permiso)
                                <a href="{{ $hijo->permisos->url }}" class="dropdown-item">
                                    {{ $hijo->permisos->nombre }}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            @else
                <div class="dropdown">
                    <a href="" class="dropdown-toggle" role="button" id="{{ $permiso->permisos->name }}"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <ion-icon name="{{ $permiso->permisos->icon }}"></ion-icon> {{ $permiso->permisos->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="{{ $permiso->permisos->name }}">
                        @foreach ($rhp as $hijo)
                            @if ($hijo->permisos->permiso_padre == $permiso->permiso)
                                <a href="{{ $hijo->permisos->url }}" class="dropdown-item">
                                    {{ $hijo->permisos->name }}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
        @endif
    @endforeach

</div>
