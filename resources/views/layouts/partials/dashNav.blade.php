<div class="enlaces">
    @foreach ($rhp as $permiso)
    <a href="">     
        <ion-icon name=""></ion-icon> {{$permiso->permiso->name}}
    </a>
    @endforeach
</div>