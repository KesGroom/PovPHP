<table>
    <thead>
    <tr>
        <th>Tipo de documento</th>
        <th>Número de documento</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo electrónico</th>
        <th>Fecha de nacimiento</th>
        <th>Dirección</th>
        <th>Celular</th>
        <th>Telefono fijo</th>
        <th>Genero</th>
        <th>Rol</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->tipo_documento }}</td>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->apellido }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->fecha_nacimiento }}</td>
            <td>{{ $user->direccion }}</td>
            <td>{{ $user->celular }}</td>
            <td>{{ $user->telefono_fijo }}</td>
            <td>{{ $user->genero }}</td>
            <td>{{ $user->roles->nombre_rol }}</td>
        </tr>
    @endforeach
    </tbody>
</table>