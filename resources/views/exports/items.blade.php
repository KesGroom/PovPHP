@switch($needed)
    @case('users')
    <tr>
        <td>{{ $item->tipo_documento }}</td>
        <td>{{ $item->id }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->apellido }}</td>
        <td>{{ $item->email }}</td>
        <td>{{ $item->fecha_nacimiento }}</td>
        <td>{{ $item->direccion }}</td>
        <td>{{ $item->celular }}</td>
        <td>{{ $item->telefono_fijo }}</td>
        <td>{{ $item->genero }}</td>
        <td>{{ $item->roles->nombre_rol }}</td>
    </tr>
    @break
    @case('news')
    <tr>
        <td>{{ $item->titulo }}</td>
        <td>{{ $item->subtitulo }}</td>
        <td>{{ $item->informacion }}</td>
        <td>{{ $item->posted->name }}</td>
        <td>{{ $item->created_at }}</td>
    </tr>
    @break

@endswitch
