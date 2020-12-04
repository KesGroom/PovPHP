<div class="row mb-4 justify-content-center">
    <div class="col-md-4">
        <div class="row">
            @if ($salas)
                <div class="col-md-12 mb-2">
                    <div class="card">
                        <div class="card-body displayRowSbC">
                            <div class="card-text displayRowCC"><i class="fas fa-people-carry mr-2"></i>
                                {{ $salas->zonaSS->nombre_zona }}
                            </div>
                            <div class="card-text displayRowCC"><i class="fas fa-hourglass-half mr-2"></i>
                                {{ $salas->tiempo_servicio }} / {{ $salas->zonaSS->tiempo_servicio }}
                                {{ __('pov.txtHours') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-text">{{ __('pov.txtEstadoServ') }}: {{ $estu->estado_servicio_social }}</div>
                    </div>
                    <div class="card-body">
                        <canvas id="timeService" width="400" height="400"></canvas>
                        <div class="card-text mt-2 displayRowCC">{{ __('pov.txtTiempoPrestado') }}:
                            {{ $horas[0] }} / 120
                            {{ __('pov.txtHours') }}
                        </div>
                    </div>
                    @if ($estu->estado_servicio_social == 'Completado')
                        <div class="mt-2">
                            <a href="{{ route('bitacora.certificado', Auth::user()) }}" class="btn btn-MC btn-footer">
                                Ver certificado
                            </a>
                        </div>
                    @else
                        <div class="card-footer displayRowCC">
                            {{ __('pov.txtAnimation') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-2">
                    <div class="card-header">{{ __('pov.txtHistoryServ') }}</div>
                </div>
                @forelse ($bit as $bitacora)
                    <div class="card mb-2">
                        <div class="card-header displayRowSbC">
                            <div class="card-text">{{ __('pov.txtZonaServicio') }}: {{ $bitacora->nombre_zona }}</div>
                            <div class="card-text">{{ __('pov.txtFechaRegistro') }}:
                                {{ date('d/m/Y', strtotime($bitacora->created_at)) }}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-text">{{ __('pov.txtLaboresRealizadas') }}: {{ $bitacora->labores }}</div>
                            @if ($bitacora->observaciones)
                                <div class="card-text">{{ __('pov.txtObservaciones') }}: {{ $bitacora->observaciones }}
                                </div>
                            @endif
                        </div>
                        <div class="card-footer displayRowSbC">
                            <div class="card-text">{{ __('pov.txtRegistra') }}: {{ $bitacora->name }}
                                {{ $bitacora->apellido }}
                            </div>
                            <div class="card-text">{{ __('pov.txtTiempoPrestado') }}: {{ $bitacora->tiempo_prestado }}
                                {{ __('pov.txtHours') }}
                            </div>
                        </div>
                    </div>
                @empty

                @endforelse

            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>

@if (session('lang') == 'es')
    <script>
        var Prestado = 'Prestado',
            Restante = 'Restante';

    </script>
@else
    <script>
        var Prestado = 'Provided',
            Restante = 'Remaining';

    </script>
@endif
<script>
    var data = @json($horas, JSON_PRETTY_PRINT);
    var ctx = document.getElementById('timeService').getContext('2d');
    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: data,
                backgroundColor: [
                    'rgba(0, 255, 0, 0.3)',
                    'rgba(255, 5, 5, 0.3)'
                ]
            }],

            labels: [
                Prestado,
                Restante
            ],

        }
    });

</script>
