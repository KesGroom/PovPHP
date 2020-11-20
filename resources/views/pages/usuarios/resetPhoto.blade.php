<form action="{{ route('usuarios.photoReset', $usuario) }}" method="POST">
    @csrf
    @method('put')
    <button class="falseLink" type="submit" title="{{ __('pov.deletePhoto') }}"><i
            class="fas fa-user-shield"></i></button>
</form>