$(document).ready(function () {
    $('.solo-numero').numeric();
});

$('input[type=file]').change(function () {
    var filename = $(this).val().split('\\').pop();
    var idname = $(this).attr('id');
    console.log($(this));
    console.log(filename);
    console.log(idname);
    $('span.' + idname).next().find('span').html(filename);
});

window.addEventListener('load', function () {
    document.getElementById('buscador').addEventListener('keyup', function () {
        if ((document.getElementById("buscador").value.length) >= 1)
            fetch(`/` + clase + `/buscador?texto=${document.getElementById("buscador").value}`, {
                method: 'get'
            })
                .then(response => response.text())
                .then(html => {
                    document.getElementById('resultado').innerHTML = html
                })
        else
            document.getElementById("resultado").innerHTML = ""
    })

});
