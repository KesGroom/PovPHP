<style>
    .PC-secundario .PC-button {
        width: 100% !important;
    }

</style>
<div class="panel-control displayColIniC">
    <div class="PC-principal displayRowSbC">
        <h2 class="mt-4 mb-4">{{ $tituloPC }}</h2>
        <div class="buscador">
            <input type="text" placeholder="{{ __('pov.search') }}" class="input-buscador" id="buscador">
            <label class="icon-buscador">
                <a href="">
                    <ion-icon name="search-circle"></ion-icon>
                </a>
            </label>
        </div>
        <a href="{{ $add }}" class="add-icon displayRowCC">
            <ion-icon name="add-circle"></ion-icon>
            {{ $addElement }}
        </a>
    </div>

    <div class="PC-secundario displayRowSbC">
        @if ($optionalBtn == 'true')
            <a href="{{ $optionalRoute }}" class="PC-button filter displayRowCC">
                <ion-icon name="{{ $optionalIcon }}"></ion-icon>
                {{ $optionalText }}
            </a>
        @endif
        <a href="" class="PC-button graphic displayRowCC">
            <ion-icon name="pie-chart"></ion-icon>
            {{ __('pov.graphic') }}
        </a>
        <a href="{{ $restore }}" class="PC-button restore displayRowCC">
            <ion-icon name="sync"></ion-icon>
            {{ __('pov.restore') }}
        </a>
        <a href="" data-toggle="modal" data-target="#exampleModal" class="PC-button importExcel displayRowCC">
            <i class="fas fa-file-upload"></i>
            {{ __('pov.impoExcel') }}
        </a>
        <a href="{{ $templateExcel }}" class="PC-button templateExcel displayRowCC">
            <i class="fas fa-file-download"></i>
            {{ __('pov.templateExcel') }}
        </a>
        <a href="{{ $exportExcel }}" class="PC-button excel displayRowCC">
            <i class="fas fa-file-excel"></i>
            {{ __('pov.excel') }}
        </a>
    </div>
</div>

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
            <form action="{{ $importExcel }}" method="post" enctype="multipart/form-data">
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
