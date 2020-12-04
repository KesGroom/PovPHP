<form action="{{ route('zonas.block', $zona) }}" method="POST">
    @csrf
    @method('put')
    <button type="submit" class="falselink" title="{{ __('pov.txtBlock')}}"><div class="fas fa-lock"></div></button>
</form>