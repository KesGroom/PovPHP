<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-upload">
                        {{ __('pov.importData') }}</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('usuarios.import') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body displayRowCC">
                    <span class="newFile">
                        <input id="newFile" type="file" accept=".xlsx , .xls"
                            class="@error('newFile') is-invalid @enderror" name="newFile" required
                            autocomplete="newFile">
                    </span>
                    <label for="newFile" class="displayRowCC">
                        <ion-icon name="cloud-upload-outline" class="mr-2"></ion-icon>
                        <span>{{ __('pov.uploadFile') }}</span>
                    </label>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-MC btn-block">{{ __('pov.impoExcel') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
