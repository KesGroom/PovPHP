<table>
    <thead>
    <tr>
        <th>Titulo</th>
        <th>Subtitulo</th>
        <th>Informacion</th>
        <th>Publicado por</th>
        <th>Fecha de publicacion</th>
    </tr>
    </thead>
    <tbody>
    @foreach($news as $new)
        <tr>
            <td>{{ $new->titulo }}</td>
            <td>{{ $new->subtitulo }}</td>
            <td>{{ $new->informacion }}</td>
            <td>{{ $new->posted->name }}</td>
            <td>{{ $new->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>