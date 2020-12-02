<form action="{{ route('sala.rechazar', $sala) }}" method="POST">
    @csrf
    @method('put')
    <button class="btn btn-MC" type="submit">Rechazar</button>
</form>
