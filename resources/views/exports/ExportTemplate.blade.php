<table>
    <thead>
        <tr>
            @forelse ($headers as $header)
            <th>{{ $header }}</th>
            @empty

            @endforelse
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
            </tr>
        @empty
            <tr>
                <td>No hay datos</td>
            </tr>
        @endforelse
    </tbody>
</table>
