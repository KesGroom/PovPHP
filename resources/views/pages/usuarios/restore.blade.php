<form action="{{ route('usuarios.restore', $usuario) }}" method="POST">
    @csrf
    @method('put')
    <button class="falseLink" type="submit" title="{{ __('pov.restoreBtn') }}"><i
            class="fas fa-user-clock"></i></button>
</form>