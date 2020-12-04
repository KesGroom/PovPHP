<form action="{{ route('sala.rechazar', $sala) }}" method="POST">
    @csrf
    @method('put')
    <button class="falseLink btn-SS rechazo" type="submit"><ion-icon name="close-circle"></ion-icon></button>
</form>
