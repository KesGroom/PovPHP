<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Poppins" rel="stylesheet">
    <title>María Cano Informa</title>
    <style>
        .body {
            font-family: 'Poppins', sans-serif;
        }

        .contenedor {
            width: 65%;
            height: 80%;
            border: 1px solid rgb(136, 133, 133);
            margin: auto;
            border-radius: 8px;
            overflow: hidden !important;
        }

        .titulo {
            font-size: 1.5em;
            margin-top: 0.1rem;
            color: #ffffff;
        }

        .subtitulo {
            font-size: 1.2em;
            margin-top: 0.3rem;
            color: #000000;
        }

        .text {
            text-align: justify;
        }

        .opcional {
            font-size: 2.3em;
            color: rgb(219, 54, 54);
            text-transform: uppercase;
        }

        .contenedor-titulo {
            width: 100%;
            padding: 1rem 1.3rem;
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: center;
            border-bottom: 1px solid rgb(136, 133, 133);
            background-color: #b71c1c
        }

        .contenedor-info {
            width: 100%;
            padding: 1rem 1.3rem;
            background-color: #ffffff;
            color: #000000;
            border-bottom: 1px solid rgb(136, 133, 133);
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }

        .info {
            width: 60%;
        }

        .contenedor-titulo img {
            width: 55px;
            height: 30px;
            margin-right: 1rem;
        }

        .footer {
            width: 100%;
            padding: 0.3rem;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
            background-color: rgb(241, 233, 233);
        }

        .contacto {
            width: 33%;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
        }

        .contacto img {
            width: 1rem;
            height: 1rem;
            margin-right: 0.3rem;
            margin-left: 0.5rem;
            margin-top: 0.55rem;
        }

        .contacto p {
            font-size: 0.7em;
            color: black;
        }

        .icon img {
            width: 120px;
            height: 120px;
            margin-top: 25%;
            margin-left: 25%;
        }

        .icon {
            width: 40%;
        }

    </style>
</head>

<body class="body">
    <div class="contenedor">
        <div class="contenedor-titulo">
            <img src="http://imgfz.com/i/u23EMQq.png" alt="Escudo María Cano IED">
            <div class="titulo">{{ $data['title'] }}</div>
        </div>
        <div class="contenedor-info">
            <div class="info">
                <div class="subtitulo">
                    <p>{{ $data['subtitle'] }}</p>
                </div>
                <div class="opcional">
                    <p>{{ $data['optionalText'] }}</p>
                </div>
                <div class="text">
                    <p>{{ $data['text'] }}</p>
                    @if ($data['list'] == 'yes')
                        <ul>
                            <li>{{ $data['item1'] }}</li>
                            <li>{{ $data['item2'] }}</li>
                            <li>{{ $data['item3'] }}</li>
                            <li>{{ $data['item4'] }}</li>
                        </ul>
                        <p>{{ $data['final'] }}</p>
                    @endif
                </div>
            </div>
            <div class="icon">
                <img src="{{ $data['icon'] }}" alt="Postulación María Cano IED">
            </div>
        </div>
        <div class="footer">
            <div class="contacto">
                <img src="http://imgfz.com/i/rIQ0vwo.png" alt="">
                <p>colmariacano@educacionbogota.edu.co</p>
            </div>
            <div class="contacto">
                <img src="http://imgfz.com/i/6N9TrgW.png" alt="">
                <p>324 1000 (Línea 195) - 310 221 0513</p>
            </div>
            <div class="contacto">
                <img src="http://imgfz.com/i/IbyHhYw.png" alt="">
                <p>Transversal 5 U $48 J 30 SUR</p>
            </div>
        </div>
    </div>
</body>

</html>
