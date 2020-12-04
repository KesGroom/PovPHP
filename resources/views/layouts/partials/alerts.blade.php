<script>
    function AlertaPopUp(title, text, icon) {
        Swal.fire({
            title: title,
            text: text,
            icon: icon,
            showConfirmButton: false,
            timer: 6500,
            timerProgressBar: true
        });
    };

    function AlertaPopUpBtn(title, text, icon, btnText) {
        Swal.fire({
            title: title,
            text: text,
            icon: icon,
            confirmButtonText: btnText
        });
    };

    function AlertaToast(title, icon) {
        Swal.fire({
            title: title,
            icon: icon,
            toast: true,
            showConfirmButton: false,
            timer: 7000,
            timerProgressBar: true,
            position: 'center-end',
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
    };

</script>
@switch($option)
    @case('SwalUpdate')
    @if (session('lang') == 'es')
        <script>
            AlertaToast('La actualización ha sido exitosa', 'success');

        </script>
    @else
        <script>
            AlertaToast('The upgrade has been successful', 'success');

        </script>
    @endif
    @break
    @case('SwalDelete')
    @if (session('lang') == 'es')
        <script>
            AlertaToast('Se ha eliminado correctamente', 'success');

        </script>
    @else
        <script>
            AlertaToast('Correctly removed', 'success');

        </script>
    @endif
    @break
    @case('SwalBlock')
    @if (session('lang') == 'es')
        <script>
            AlertaToast('Se ha bloqueado correctamente', 'success');

        </script>
    @else
        <script>
            AlertaToast('It has been correctly blocked', 'success');

        </script>
    @endif
    @break
    @case('SwalUnblock')
    @if (session('lang') == 'es')
        <script>
            AlertaToast('Se ha desbloqueado correctamente', 'success');

        </script>
    @else
        <script>
            AlertaToast('It has been correctly unlocked', 'success');

        </script>
    @endif
    @break
    @case('SwalCreate')
    @if (session('lang') == 'es')
        <script>
            AlertaToast('Se ha registrado con éxito', 'success');

        </script>
    @else
        <script>
            AlertaToast('Successfully registered', 'success');

        </script>
    @endif
    @break
    @case('SwalRestore')
    @if (session('lang') == 'es')
        <script>
            AlertaToast('Restauración completada satisfactoriamente', 'success');

        </script>
    @else
        <script>
            AlertaToast('Restoration successfully completed', 'success');

        </script>
    @endif
    @break
    @case('SwalPostulation')
    @if (session('lang') == 'es')
        <script>
            AlertaToast('Se ha postulado satisfactoriamente', 'success');

        </script>
    @else
        <script>
            AlertaToast('You have successfully applied', 'success');

        </script>
    @endif
    @break
    @case('SwalRejected')
    @if (session('lang') == 'es')
        <script>
            AlertaToast('El estudiante ha sido rechazado', 'success');

        </script>
    @else
        <script>
            AlertaToast('Student has been rejected', 'success');

        </script>
    @endif
    @break
    @case('SwalAccept')
    @if (session('lang') == 'es')
        <script>
            AlertaToast('El estudiante ha sido aceptado', 'success');

        </script>
    @else
        <script>
            AlertaToast('Student has been accepted', 'success');

        </script>
    @endif
    @break
    @default
    @if (session('lang') == 'es')
        <script>
            AlertaToast('No se ha seleccionado una opción', 'success');

        </script>
    @else
        <script>
            AlertaToast('No option selected', 'success');

        </script>
    @endif
    @break
@endswitch
