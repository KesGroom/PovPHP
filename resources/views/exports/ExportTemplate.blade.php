<table>
    <thead>
        <tr>
            @for ($i = 0; $i < Str::length($headers); $i++)
                <th>
                    {{$headers[$i]}}
                </th>
            @endfor
        </tr>
    </thead>
    {{-- <tbody>
        @forelse ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
            </tr>
        @empty
            <tr>
                <td>No hay datos</td>
            </tr>
        @endforelse
    </tbody> --}}
</table>
