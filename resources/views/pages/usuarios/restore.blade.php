<form action="{{ route('usuarios.restore', $usuario) }}" method="POST">
    @csrf
    @method('put')
    <button class="falseLink" type="submit" title="{{ __('pov.restore') }}"><i
            class="fas fa-user-clock"></i></button>
</form>