<div class="contenedor">
   
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            @if (session('lang') == 'es')
                <p  id="diaSemana" class="diaSemana mr-4 text-center"  style="font-size: 1.8em; margin-top: -0.6rem; margin-left: 2rem"></p>
            @else
                <p id="diaSemana" class="diaSemana Oculto text-center"  style="font-size: 1.8em; margin-top: -0.6rem; margin-left: 2rem"></p>
            @endif
            @if (session('lang') == 'en')
                <p id="diaSem" class="diaSemana mr-2 text-center" style="font-size: 1.8em; margin-top: -0.6rem; margin-left: 2rem"></p>
            @else
                <p id="diaSem" class="diaSemana Oculto text-center" style="font-size: 1.8em; margin-top: -0.6rem; margin-left: 2rem"></p>
            @endif
     
            <div class="widget mt-4" style="font-size: 1.3em;">
                <div class="fecha displayRowCC">
        
                    <p id="dia" class="dia ml-1 displayRowCC" style="background: #b71c1c; border-radius: 100%; color: white; font-size: 38px; position: absolute; width: 70px; height: 70px; left: 10px; top: -15px;"></p>
                    @if (session('lang') == 'es')
              
                        <p id="mes" class="mes ml-1"></p>
                    @else
               
                        <p id="mes" class="mes Oculto ml-1"></p>
                    @endif
                    @if (session('lang') == 'en')
                        <p id="month" class="mes ml-1"></p>
                        <p class="ml-1">on</p>
                        @else
                        <p id="month" class="mes Oculto ml-1"></p>
                        <p class="ml-1">del</p>
                    @endif
                    <p id="year" class="anio ml-1"></p>
                </div>
            </div>
        </div>
        </div>
      </div>
    
