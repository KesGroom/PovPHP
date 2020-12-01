<form action="{{ route('sala.aceptar', $sala) }}" method="POST">
    @csrf
    @method('put')
    <button class="btn btn-MC" type="submit">Aceptar</button>
</form>
