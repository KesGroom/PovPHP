<style>


</style>
@extends('layouts.app')
@section('content')
@section('nav')
    @include('layouts.partials.subNav')
@endsection
@guest
    <div class="slider">
        <ul>
            <li><img class="sliderGuest" src="{{ asset('storage/colegio/Colegio frontal.jpg') }}" alt=""></li>
            <li><img class="sliderGuest" src="{{ asset('storage/colegio/Colegio ascensor.jpg') }}" alt=""></li>
            <li><img class="sliderGuest" src="{{ asset('storage/colegio/Colegio ajedrez.jpg') }}" alt=""></li>
            <li><img class="sliderGuest" src="{{ asset('storage/colegio/Colegio interior.jpg') }}" alt=""></li>
        </ul>
    </div>
@else
    <div class="slider">
        <ul>
            @foreach ($latestNews as $new)
                <li>
                    <div class="contenedor">
                        <img src="{{ asset('storage/colegio/' . $new->imagen . '') }}" alt="{{ $new->titulo }}"
                            class="imgCont">
                        <div class="contenido displayRowCC">
                            <div class="informacion displayColIniC">
                                <p class="tituloC">{{ $new->titulo }}</p>
                                <p class="subtituloC">{{ $new->subtitulo }}</p>
                                <p class="texto">{{ $new->informacion }}</p>
                                <div class="creditos displayRowSbC">
                                    <p class="displayRowCC">
                                        <ion-icon name="person-circle" class="mr-1"></ion-icon> Publicado por:
                                        {{ $new->posted->name }}
                                    </p>
                                    <p class="displayRowCC">
                                        <ion-icon name="calendar" class="mr-1"></ion-icon>
                                        {{ date('d/m/Y', strtotime($new->created_at)) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endguest

<!-- Quienes somos -->
<div class="seccion" id="Quienes">
    <hr class="separador" />
    <h2 class="tituloSeccionR center-align">{{ __('pov.txtQuienes') }}</h2>
</div>

<h3 class="tituloQuienes mt-4">{{ __('pov.lblMaríaCanoBiography') }}</h3>

<div class="biografia">
    <p>{{ __('pov.lblBiografia') }}
        <br /><br />
        {{ __('pov.lbllegado') }}
    </p>
    <img src="{{ asset('img/maria-cano-1.jpg') }}" alt="" />
</div>

<div class="contenedorMV">
    <div class="mision">
        <h3 class="tituloQuienes">{{ __('pov.titleMisión') }}</h3>
        <p class="center-align">{{ __('pov.txtMission') }}</p>
    </div>
    <div class="vision">
        <h3 class="tituloQuienes">{{ __('pov.Vision') }}</h3>
        <p class="center-align">{{ __('pov.txtVision') }}</p>
    </div>
</div>

<h3 class="tituloQuienes mt-4">{{ __('pov.titleAnthem') }}</h3>
<p class="text-center"><b>{{ __('pov.Lyrics') }} </b> Lic. Silvio Calle Cadavid <br /><b>{{ __('pov.Music') }}</b> Lic.
    Andrés Martínez</p>

<div class="himno mb-4">
    <div class="estrofa">
        <h5 class="tituloEstrofa">{{ __('pov.Chorus') }}</h5>
        <p>{{ __('pov.txtChorusOne') }}<br />
            {{ __('pov.txtChorusTwo') }} <br />
            {{ __('pov.txtChorusTree') }} <br />
            {{ __('pov.txtChorusFour') }}
        </p>
    </div>
    <div class="estrofa">
        <h5 class="tituloEstrofa">{{ __('pov.titleStanzaOne') }}</h5>
        <p> {{ __('pov.txtOneStanzaOne') }}<br />
            {{ __('pov.txtOneStanzaTwo') }}<br />
            {{ __('pov.txtOneStanzaTree') }}<br />
            {{ __('pov.txtOneStanzaFour') }}
        </p>
    </div>
    <div class="estrofa">
        <h5 class="tituloEstrofa">{{ __('pov.titleStanzaTwo') }}</h5>
        <p>{{ __('pov.txtTwoStanzaOne') }}<br />
            {{ __('pov.txtTwoStanzaTwo') }}<br />
            {{ __('pov.txtTwoStanzaTree') }}<br />
            {{ __('pov.txtTwoStanzaFour') }}
        </p>
    </div>
    <div class="estrofa">
        <h5 class="tituloEstrofa">{{ __('pov.titleStanzaTree') }}</h5>
        <p>{{ __('pov.txtTreeStanzaOne') }}<br />
            {{ __('pov.txtTreeStanzaTwo') }}<br />
            {{ __('pov.txtTreeStanzaTree') }}<br />
            {{ __('pov.txtTreeStanzaFour') }}
        </p>
    </div>
    <div class="estrofa">
        <h5 class="tituloEstrofa">{{ __('pov.titleStanzaFour') }}</h5>
        <p>{{ __('pov.txtFourStanzaOne') }}<br />
            {{ __('pov.txtFourStanzaTwo') }}<br />
            {{ __('pov.txtFourStanzaTree') }}<br />
            {{ __('pov.txtFourStanzaFour') }}
        </p>
    </div>
    <div class="estrofa">
        <h5 class="tituloEstrofa">{{ __('pov.titleStanzaFive') }}</h5>
        <p>{{ __('pov.txtFiveStanzaOne') }}<br />
            {{ __('pov.txtFiveStanzaTwo') }}<br />
            {{ __('pov.txtFiveStanzaTree') }}<br />
            {{ __('pov.txtFiveStanzaFour') }}
        </p>
    </div>
</div>

<div class="seccion mt-4" id="Galeria">
    <h2 class="tituloSeccionL">{{ __('pov.txtGaleria') }}</h2>
    <div class="separador"></div>
</div>

<div class="galeria">
    <h3 class="text-center mt-4 mb-4">Proximamente</h3>
</div>

<div class="seccion" id="Contacto">
    <hr class="separador" />
    <h3 class="tituloSeccionR">{{ __('pov.txtContactenos') }}</h3>
</div>

<!-- Contactenos -->
<div class="Contacto">

    <div class="mapa">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3977.1930873292426!2d-74.11531988534838!3d4.559270504113856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f98b04bf6309b%3A0x9607592718e89acd!2sIED%20MARIA%20CANO!5e0!3m2!1ses!2sco!4v1585064762326!5m2!1ses!2sco"
            frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>

    <div class="informacion">
        <p>
            <ion-icon name="call-outline"></ion-icon> {{ __('pov.txtPhone') }}: 372 6691
        </p>
        <p>
            <ion-icon name="mail-outline"></ion-icon> {{ __('pov.txtEmail') }}: colmariacano@educacionbogota.edu.co
        </p>
        <p>
            <ion-icon name="time-outline"></ion-icon> {{ __('pov.txtopeninghours') }}: 6:30 am - 3:00 pm
        </p>
        <p>
            <ion-icon name="business-outline"></ion-icon> {{ __('pov.txtAddress') }}: Tranv. 5U #48j - 30 SUR
        </p>
    </div>
</div>
@endsection
