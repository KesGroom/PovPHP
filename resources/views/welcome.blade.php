<style>

</style>
@extends('layouts.app')
@section('content')
    @include('layouts.partials.subNav')
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
                <li>
                    <div class="contenedor">
                        <img class="imgCont" src="{{ asset('storage/colegio/Bodies Into.jpg') }}" alt="">
                        <div class="contenido displayRowCC">
                            <div class="informacion displayColCIni">
                                <p class="tituloC">Lorem, ipsum dolor.</p>
                                <p class="subtituloC">Lorem ipsum dolor sit amet.</p>
                                <p class="texto">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus
                                    mollitia eaque sint odit aliquid ipsam velit fugit maiores ratione iusto quod quis
                                    excepturi, minima modi possimus quos natus magni. Veniam iure molestiae excepturi in.
                                    Doloremque quaerat repellendus laborum quidem ut pariatur cumque error fugiat ipsum aut
                                    doloribus ipsa, dolorem dolor nesciunt vitae quas distinctio dicta sequi commodi nam modi
                                    amet quod quam sit? Autem nostrum cumque illum voluptates quaerat deserunt, ut nesciunt
                                    facilis at sed laudantium quidem quo distinctio in reprehenderit earum, quam sit alias
                                    tempora sequi. Architecto provident, ut fuga doloremque laboriosam delectus, nostrum tenetur
                                    nesciunt enim debitis minima a quae excepturi hic voluptate magnam atque quia laborum
                                    deserunt, temporibus unde molestiae pariatur beatae praesentium! Nisi, asperiores, minima
                                    aspernatur quo qui dicta corrupti suscipit reiciendis sed maxime delectus corporis.
                                    Asperiores cupiditate ab ipsam in necessitatibus cum totam quos quidem?</p>
                                <div class="creditos displayRowSbC">
                                    <p class="displayRowCC">
                                        <ion-icon name="person-circle" class="mr-1"></ion-icon> Publicado por:
                                    </p>
                                    <p>Luisa Fernanda</p>
                                    <p class="displayRowCC">
                                        <ion-icon name="calendar" class="mr-1"></ion-icon> 12-OCT-2020
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="contenedor">
                        <img class="imgCont" src="{{ asset('storage/colegio/Flag Colombia.jpg') }}" alt="">
                        <div class="contenido displayRowCC">
                            <div class="informacion displayColCIni">
                                <p class="tituloC">Lorem, ipsum katsup.</p>
                                <p class="subtituloC">Lorem ipsum dolor sit UwUr.</p>
                                <p class="texto">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus
                                    mollitia eaque sint odit aliquid ipsam velit fugit maiores ratione iusto quod quis
                                    excepturi, minima modi possimus quos natus magni. Veniam iure molestiae excepturi in.
                                    Doloremque quaerat repellendus laborum quidem ut pariatur cumque error fugiat ipsum aut
                                    doloribus ipsa, dolorem dolor nesciunt vitae quas distinctio dicta sequi commodi nam modi
                                    amet quod quam sit? Autem nostrum cumque illum voluptates quaerat deserunt, ut nesciunt
                                    facilis at sed laudantium quidem quo distinctio in reprehenderit earum, quam sit alias
                                    tempora sequi. Architecto provident, ut fuga doloremque laboriosam delectus, nostrum tenetur
                                    nesciunt enim debitis minima a quae excepturi hic voluptate magnam quidem?</p>
                                <div class="creditos displayRowSbC">
                                    <p class="displayRowCC">
                                        <ion-icon name="person-circle" class="mr-1"></ion-icon> Publicado por:
                                    </p>
                                    <p>Juan Sebastián</p>
                                    <p class="displayRowCC">
                                        <ion-icon name="calendar" class="mr-1"></ion-icon> 22-OCT-2020
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="contenedor">
                        <img class="imgCont" src="{{ asset('storage/colegio/Project Computer.jpg') }}" alt="">
                        <div class="contenido displayRowCC">
                            <div class="informacion displayColCIni">
                                <p class="tituloC">Lorem, ipsum katsup.</p>
                                <p class="subtituloC">Lorem ipsum dolor sit UwUr.</p>
                                <p class="texto">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus
                                    mollitia eaque sint odit aliquid ipsam velit fugit maiores ratione iusto quod quis
                                    excepturi, minima modi possimus quos natus magni. Veniam iure molestiae excepturi in.
                                    Doloremque quaerat repellendus laborum quidem ut pariatur cumque error fugiat ipsum aut
                                    doloribus ipsa, dolorem dolor nesciunt vitae quas distinctio dicta sequi commodi nam modi
                                    amet quod quam sit? Autem nostrum cumque illum voluptates quaerat deserunt, ut nesciunt
                                    facilis at sed laudantium quidem quo distinctio in reprehenderit earum, quam sit alias
                                    tempora sequi. Architecto provident, ut fuga doloremque laboriosam delectus, nostrum tenetur
                                    nesciunt enim debitis minima a quae excepturi hic voluptate magnam quidem?</p>
                                <div class="creditos displayRowSbC">
                                    <p class="displayRowCC">
                                        <ion-icon name="person-circle" class="mr-1"></ion-icon> Publicado por:
                                    </p>
                                    <p>Juan Sebastián</p>
                                    <p class="displayRowCC">
                                        <ion-icon name="calendar" class="mr-1"></ion-icon> 22-OCT-2020
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="contenedor">
                        <img class="imgCont" src="{{ asset('storage/colegio/Science people.jpg') }}" alt="">
                        <div class="contenido displayRowCC">
                            <div class="informacion displayColCIni">
                                <p class="tituloC">Lorem, ipsum katsup.</p>
                                <p class="subtituloC">Lorem ipsum dolor sit UwUr.</p>
                                <p class="texto">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus
                                    mollitia eaque sint odit aliquid ipsam velit fugit maiores ratione iusto quod quis
                                    excepturi, minima modi possimus quos natus magni. Veniam iure molestiae excepturi in.
                                    Doloremque quaerat repellendus laborum quidem ut pariatur cumque error fugiat ipsum aut
                                    doloribus ipsa, dolorem dolor nesciunt vitae quas distinctio dicta sequi commodi nam modi
                                    amet quod quam sit? Autem nostrum cumque illum voluptates quaerat deserunt, ut nesciunt
                                    facilis at sed laudantium quidem quo distinctio in reprehenderit earum, quam sit alias
                                    tempora sequi. Architecto provident, ut fuga doloremque laboriosam delectus, nostrum tenetur
                                    nesciunt enim debitis minima a quae excepturi hic voluptate magnam quidem?</p>
                                <div class="creditos displayRowSbC">
                                    <p class="displayRowCC">
                                        <ion-icon name="person-circle" class="mr-1"></ion-icon> Publicado por:
                                    </p>
                                    <p>Juan Sebastián</p>
                                    <p class="displayRowCC">
                                        <ion-icon name="calendar" class="mr-1"></ion-icon> 22-OCT-2020
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
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
        <img src="{{ asset('storage/colegio/maria-cano-1.jpg') }}" alt="" />
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
        <h2 class="tituloSeccionL" >{{ __('pov.txtGaleria') }}</h2>
        <div class="separador"></div>
    </div>

    <div class="galeria">
        <h3 class="text-center mt-4 mb-4">Proximamente</h3>
    </div>

    <div class="seccion" id="Contacto">
        <hr class="separador" />
        <h3 class="tituloSeccionR" >{{ __('pov.txtContactenos') }}</h3>
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
