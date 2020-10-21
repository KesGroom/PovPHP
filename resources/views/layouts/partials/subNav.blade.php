<div class="enlaces">
    <a href="#Quienes">
        <ion-icon name="people"></ion-icon> {{ __('pov.txtQuienes') }}
    </a>
    <a href="#Galeria">
        <ion-icon name="images"></ion-icon> {{ __('pov.txtGaleria') }}
    </a>
    <a href="#Contacto">
        <ion-icon name="mail"></ion-icon> {{ __('pov.txtContactenos') }}
    </a>
    @guest

    @else
        <a href="">
            <ion-icon name="desktop"></ion-icon> {{ __('pov.txtDash') }}
        </a>
    @endguest
</div>
