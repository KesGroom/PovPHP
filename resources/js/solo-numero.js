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
