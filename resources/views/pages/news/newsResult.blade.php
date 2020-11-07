<div class="displayRowSbC" style="width: 100%; margin-bottom: 2rem;">
    <h5 class="displayRowCC">
        <ion-icon name="time-outline" class="mr-1"></ion-icon> {{ __('pov.preResult') }} {{ $count }}
        {{ __('pov.posResult') }} {{ $texto }}
    </h5>
    <div style="height: 0.3rem; width: 60%; background: rgb(59, 59, 59); border-radius: 10px;"></div>
</div>
<div class="container">
    @forelse ($noticias as $noticia)
        <div class="card mb-4" style="width: 100%;">
            <div class="card-header displayRowSbC">
                {{ $noticia->titulo }}
                <div>
                    <a href="{{route('news.edit', $noticia)}}" title="{{ __('pov.edit') }}"><i class="far fa-edit"></i></a>
                    @include('pages.news.delete')
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
        <div class="card" style="width: 100%;">
            <div class="card-body displayRowCC">
                <h5 class="card-title displayRowCC">
                    <ion-icon class="mr-2" style="font-size: 1.5em; color: rgb(230, 175, 57);" name="alert-circle-outline">
                    </ion-icon> {{ __('pov.noResult') }} <b class="ml-2">{{ $texto }}</b>
                </h5>
            </div>
        </div>
    @endforelse
</div>
<hr style="width: 100%; height: 3px; background: rgb(59, 59, 59); border-radius: 5px;">
