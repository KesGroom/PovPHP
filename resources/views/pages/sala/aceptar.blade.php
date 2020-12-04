<form action="{{ route('sala.aceptar', $sala) }}" method="POST">
    @csrf
    @method('put')
    <button class="falseLink btn-SS aceptar" type="submit"><ion-icon  name="checkmark-circle"></ion-icon></button>
</form>
