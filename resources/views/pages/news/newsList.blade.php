<div class="container">
    @forelse ($noticias as $noticia)
        <div class="card mb-4" style="width: 100%;">
            <div class="card-header displayRowSbC">
                {{ $noticia->titulo }}
                <div class="actions" style="width: 10%;">
                    @if ($noticia->estado == 'Inactivo')
                        @include('layouts.forms.restore', [
                            'class' => 'news',
                            'icono' => 'fa-history',
                            'retorno' => $noticia
                        ])
                    @else
                        <a href="{{ route('news.edit', $noticia) }}" title="{{ __('pov.edit') }}"><i
                                class="far fa-edit"></i></a>
                        @include('layouts.forms.delete', [
                            'class' => 'news',
                            'icono' => 'fa-trash-alt',
                            'retorno' => $noticia
                        ])
                    @endif
                </div>
            </div>
            <div class="card-body">
                <h6 class="card-text"><b>{{ $noticia->subtitulo }}</b></h6>
                <p class="card-text">{{ $noticia->informacion }}</p>
            </div>
            <div class="card-footer displayRowSbC">
                <b class="displayRowCC" style="font-size: 0.8em;">
                    @if (session('lang') == 'es')
                        <ion-icon name="time-outline" class="mr-2"></ion-icon>
                        {{ date('d/m/Y H:i:s', strtotime($noticia->created_at)) }}
                    @else
                        <ion-icon name="time-outline" class="mr-2"></ion-icon>
                        {{ date('Y-m-d H:i:s', strtotime($noticia->created_at)) }}
                    @endif
                </b>
                <b class="displayRowCC" style="font-size: 0.8em;">
                    <ion-icon name="person-circle-outline" class="mr-2"></ion-icon>{{ $noticia->posted->name }}
                    {{ $noticia->posted->apellido }}
                </b>
            </div>
        </div>
    @empty
        <li>No hay resultados</li>
    @endforelse
</div>
