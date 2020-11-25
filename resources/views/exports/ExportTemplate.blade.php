<table>
    <thead>
        <tr>
            @forelse ($headers as $header)
                <th>{{ $header}}</th>
            @empty

            @endforelse
        </tr>
    </thead>
    <tbody>
        <tr>
            @forelse ($data as $item)
                <td>{{ $item->id }}</td>
            @empty
            <td>No hay datos</td>
            @endforelse
        </tr>
    </tbody>
</table>
