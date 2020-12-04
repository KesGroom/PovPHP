
(function () {
    var actualizarHora = function () {
        var fecha = new Date(),
                horas = fecha.getHours(),
                ampm,
                minutos = fecha.getMinutes(),
                segundos = fecha.getSeconds(),
                diaSemana = fecha.getDay(),
                dia = fecha.getDate(),
                mes = fecha.getMonth(),
                year = fecha.getFullYear();


        var pHoras = document.getElementsByClassName('horas'),
                pAMPM = document.getElementsByClassName('ampm'),
                pMinutos = document.getElementsByClassName('minutos'),
                pSegundos = document.getElementsByClassName('segundos'),
                pDiaSemana = document.getElementsByClassName('diaSemana'),
                pDaySem = document.getElementsByClassName('diaSem'),
                pDia = document.getElementsByClassName('dia'),
                pMes = document.getElementsByClassName('mes'),
                pMonth = document.getElementsByClassName('month'),
                pYear = document.getElementsByClassName('year');

        var semana = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
        pDiaSemana.textContent = semana[diaSemana];

        var semanaEn = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        pDaySem.textContent = semanaEn[diaSemana];

        pDia.textContent = dia;

        var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

        pMes.textContent = meses[mes];

        var mesesEn = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        pMonth.textContent = mesesEn[mes];

        pYear.textContent = year;

        if (horas >= 12) {
            horas = horas - 12;
            ampm = 'PM';
        } else {
            ampm = 'AM';
        }

        if (horas === 0) {
            horas = 12;
        }
        ;

        pHoras.textContent = horas;
        pAMPM.textContent = ampm;

        if (minutos < 10) {
            minutos = "0" + minutos;
        }
        ;
        if (segundos < 10) {
            segundos = "0" + segundos;
        }
        ;
        pMinutos.textContent = minutos;
        pSegundos.textContent = segundos;

    };
    actualizarHora();
    var intervalo = setInterval(actualizarHora, 1000);
}());







