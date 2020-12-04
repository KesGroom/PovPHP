<form action="{{ route('zonas.unblock', $zona) }}" method="POST">
    @csrf
    @method('put')
    <button type="submit" class="falselink" title="{{ __('pov.txtUnblock')}}"><div class="fas fa-lock-open"></div></button>
</form>