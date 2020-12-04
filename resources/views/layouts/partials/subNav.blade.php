<style>

</style>
<div class="enlaces">
    <a href="#Biografía María Cano">
        <ion-icon name="people"></ion-icon> {{ __('pov.txtQuienes') }}
    </a>
    <a href="#Mision">
        <ion-icon name="document-text"></ion-icon> {{ __('pov.txtGaleria') }}
    </a>
    <a href="#Símbolos institucionales">
        <ion-icon name="school"></ion-icon> {{ __('pov.txtSimbolos') }}
    </a>
    <a href="#Contacto">
        <ion-icon name="mail"></ion-icon> {{ __('pov.txtContactenos') }}
    </a>
    @guest

    @else
        <a href="{{ route('home') }}">
            <ion-icon name="desktop"></ion-icon> {{ __('pov.txtDash') }}
        </a>
    @endguest
</div>
