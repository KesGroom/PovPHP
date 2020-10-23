<div class="col-sm-12 col-md-12 invMt-6">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">{{ __('pov.cambioPass') }}</h5>
        </div>
        <form method="POST" action="{{ route('userPages.updatePass', $usuario) }}">
            @csrf
            @method('put')
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="form-group row">
                        <label for="oldPass"
                            class="col-md-4 col-form-label text-md-right">{{ __('pov.passActual') }}</label>

                        <div class="col-md-6">
                            <input id="oldPass" type="text" minlength="8"
                                class="form-control @error('oldPass') is-invalid @enderror"
                                name="oldPass" value="" required
                                autocomplete="oldPass">

                            @error('oldPass')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-group row">
                        <label for="newPass"
                            class="col-md-4 col-form-label text-md-right">{{ __('pov.passwordNew') }}</label>

                        <div class="col-md-6">
                            <input id="newPass" type="text" minlength="8"
                                class="form-control @error('newPass') is-invalid @enderror"
                                name="newPass" value="" required
                                autocomplete="newPass">

                            @error('newPass')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-group row">
                        <label for="confirmPass"
                            class="col-md-4 col-form-label text-md-right">{{ __('pov.confirmPass') }}</label>

                        <div class="col-md-6">
                            <input id="confirmPass" type="text" minlength="8"
                                class="form-control @error('confirmPass') is-invalid @enderror"
                                name="confirmPass" value="" required
                                autocomplete="confirmPass">

                            @error('confirmPass')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </li>
            </ul>
            <button type="submit" class="btn btn-MC btn-block btn-footer">
                {{ __('pov.change') }}
            </button>
        </form>
    </div>
</div>
</div>