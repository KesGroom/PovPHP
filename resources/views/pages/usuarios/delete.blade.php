<form action="{{ route('usuarios.delete', $usuario) }}" method="POST">
    @csrf
    @method('put')
    <button class="falseLink" type="submit" title="{{ __('pov.delete') }}"><i
            class="fas fa-user-times"></i></button>
</form>