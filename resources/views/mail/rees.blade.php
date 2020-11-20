<form action="{{ route('mail.rees', Auth::user()) }}" method="post">
    @csrf
    <button type="submit" class="btn btn-MC">Reestablecer</button>
</form>