<div class="col-sm-12 col-md-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">{{ __('pov.cambiarPhoto') }}</h5>
        </div>
        <form method="POST" action="{{ route('userPages.updatePhoto', $usuario) }}"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <ul class="list-group list-group-flush">
                <li class="list-group-item displayRowSbC">
                    @if ($usuario->foto_perfil == 'icon.png')
                    <img src="{{ asset('img/Icon.png') }}" class=""
                        alt="FotoPerfilMariaCano">
                    @else
                    <img src="{{ asset('storage/imgPerfil/' . $usuario->foto_perfil . '') }}" class="card-img-MC"
                        alt="FotoPerfilMariaCano">
                    @endif
                    <div class="form-group">
                        <span class="newFile">
                            <input id="newFile" type="file" accept="image/*"
                                class="@error('newFile') is-invalid @enderror" name="newFile" required
                                autocomplete="newFile">
                        </span>
                        <label for="newFile" class="displayRowCC">
                            <ion-icon name="cloud-upload-outline" class="mr-2"></ion-icon><span>{{__('pov.uploadImg')}}</span>
                        </label>
                        @error('newFile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </li>
            </ul>
            <button type="submit" class="btn btn-MC btn-block btn-footer">
                {{ __('pov.change') }}
            </button>
        </form>
    </div>
</div>