<form action="{{ route($class.'.restore', $retorno) }}" method="POST">
    @csrf
    @method('put')
    <button class="falseLink" type="submit" title="{{ __('pov.restoreBtn') }}"><i
            class="fas {{$icono}}"></i></button>
</form>