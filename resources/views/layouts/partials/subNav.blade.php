<style>
    .enlaces{
        position: sticky;
        top: 75px;
        z-index: 1000;
    }
</style>
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
            <ion-icon name="newspaper"></ion-icon> {{ __('pov.txtNoticias') }}
        </a>
        <a href="{{ route('home') }}">
            <ion-icon name="desktop"></ion-icon> {{ __('pov.txtDash') }}
        </a>
    @endguest
</div>
