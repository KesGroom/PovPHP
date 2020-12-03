<table>
    <thead>
        <tr>
            @for ($i = 0; $i < sizeof($headers); $i++)
                <th>
                    {{ $headers[$i] }}
                </th>
            @endfor
        </tr>
    </thead>
    @if ($template == 'false')
        <tbody>
            @forelse ($data as $item)
                @include('exports.items', [
                'needed'=> $items,
                ])
            @empty
                <tr>
                    <td>No hay datos</td>
                </tr>
    @endforelse
    </tbody>
    @endif
</table>
