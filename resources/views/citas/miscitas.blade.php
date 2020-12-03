@extends('layouts.app')

@section('content')
<table class="table">
    <thead>
<th>Asuntos</th>
    </thead>
    <tbody>
        @foreach ($citas as $item)
            <tr>
                <td>{{$item->asunto}}xd</td>
            </tr>
        @endforeach

    </tbody>
</table>
@endsection

