<form action="{{ route($class . '.delete', $retorno) }}" method="POST">
    @csrf
    @method('put')
    <button class="falseLink" type="submit" title="{{ __('pov.delete') }}"><i class="fas {{$icono}}"></i></button>
</form>
