<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Iconografía - FontAwesome(Principal) --}}
    <script src="https://kit.fontawesome.com/11c72a119e.js" crossorigin="anonymous"></script>

    <title>María Cano IED</title>
    <style>
        .contenedor {
            width: 70%;
            height: 70vh;
            margin: auto;
            margin-top: 5%;
            padding: 2rem 1.5rem;
            position: relative;
            border: 1px solid black;
            transition: all linear 400ms;
        }

        .contenedor .tituloMail {
            position: absolute;
            background-color: #ffffff;
            font-size: 2em;
            padding: 0.2rem 0.4rem;
            top: -1.8rem;
            text-transform: uppercase;
            transition: all linear 400ms;
        }

        .contenedorInfo {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            transition: all linear 400ms;
        }

        .contenedorInfo .left-cont {
            width: 65%;
            height: 80%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: flex-start;
            transition: all linear 400ms;
        }

        .left-cont .subtituloMail {
            font-size: 1.3em;
            transition: all linear 400ms;
        }

        .left-cont .infoMail {
            font-size: 1em;
            padding: 1rem 1rem 1rem 0rem;
            transition: all linear 400ms;
        }

        .left-cont .optionalText {
            font-size: 2.5em;
            text-transform: uppercase;
            color: #b71c1c;
            padding: 0 0.2rem;
            border-bottom: 1px solid #b71c1c;
            width: fit-content;
            transition: all linear 400ms;
        }

        .right-cont .icon {
            background-color: #F0E583;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            padding: 3rem;
            width: 260px;
            height: 260px;
            font-size: 10em;
            color: white;
            position: absolute;
            top: 15%;
            right: -3%;
            transition: all linear 400ms;
        }

        .contenedor .footer-mail {
            position: absolute;
            width: 102%;
            height: 130px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            background-color: #F2EBEB;
            border: 3px solid #b71c1c;
            border-radius: 0px 70px 0px 70px;
            overflow: hidden;
            left: -0.5rem;
            bottom: -3.5rem;
            transition: all linear 400ms;
        }

        .footer-mail img {
            width: 15%;
            height: 100%;
            transition: all linear 400ms;
        }

        .footer-mail .container-algo {
            width: 85%;
            padding: 1rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: flex-start;
            transition: all linear 400ms;
        }

        .container-algo .info-MC {
            width: 95%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            transition: all linear 400ms;
        }

        .info-MC .name-MC {
            font-size: 1.1em;
            font-weight: bold;
            text-transform: uppercase;
            transition: all linear 400ms;
        }

        .info-MC .Pei-MC {
            font-size: 0.8em;
            border-bottom: 1px solid #767171;
            transition: all linear 400ms;
        }

        .container-algo .contact-MC {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            transition: all linear 400ms;
        }

        .contact-MC .contact-item {
            width: 33.33%;
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: center;
            transition: all linear 400ms;

        }

        .contact-item .icono {
            width: 1rem;
            height: 1rem;
            background-color: #ED9A8E;
            border-radius: 50%;
            color: #ffffff;
            padding: 0.3rem;
            position: absolute;
            left: 0;
            top: 0;
            transition: all linear 400ms;
        }

        .contact-item .info {
            background-color: #fcfcfc;
            border-radius: 15px;
            position: relative;
            color: #000;
            padding: 0.5rem 0.5rem 0.3rem 1.8rem;
            font-size: 0.6em;
            transition: all linear 400ms;
        }

        @media only screen and (max-width: 900px) {
            .contenedor {
                width: 90%;
                height: 70vh;
                margin: auto;
                margin-top: 10%;
                padding: 2rem 1.5rem;
                position: relative;
                border: 1px solid black;
                transition: all linear 400ms;
            }

            .contenedor .footer-mail {
                width: 102%;
                height: 130px;
                left: -0.5rem;
                bottom: -3.5rem;
            }

            .right-cont .icon {
                display: none;
            }

            .contenedorInfo .left-cont {
                width: 100%;
            }

            .footer-mail img {
                width: 25%;
            }

            .footer-mail .container-algo {
                width: 75%;
                padding: 1rem;
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }

            .container-algo .contact-MC {
                width: 55%;
                flex-direction: column;
                padding: 0.5rem;
                margin-top: 1rem;
                margin-left: 1rem;
            }

            .container-algo .info-MC {
                width: 45%;
                flex-direction: column;
            }

            .info-MC .name-MC {
                font-size: 0.8em;

            }

            .info-MC .Pei-MC {
                font-size: 0.6em;
                border-bottom: none;
                text-align: center;
            }

            .contact-MC .contact-item {
                width: 100%;
            }
        }

        @media only screen and (max-width: 650px) {
            .contenedor {
                width: 90%;
                height: 80vh;
                margin: auto;
                margin-top: 10%;
                padding: 2rem 1.5rem;
                position: relative;
                border: 1px solid black;
                transition: all linear 400ms;
            }

            .contenedor .footer-mail {
                width: 103%;
                height: 130px;
                left: -0.5rem;
                bottom: -3.5rem;
            }

            .right-cont .icon {
                display: none;
            }

            .contenedorInfo .left-cont {
                width: 100%;
            }

            .footer-mail img {
                width: 25%;
            }

            .footer-mail .container-algo {
                width: 75%;
                padding: 1rem;
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }

            .container-algo .contact-MC {
                width: 55%;
                flex-direction: column;
                padding: 0.5rem;
                margin-top: 1rem;
                margin-left: 1rem;
                display: none;
            }

            .container-algo .info-MC {
                width: 100%;
                flex-direction: column;
            }

            .info-MC .name-MC {
                font-size: 1.4em;

            }

            .info-MC .Pei-MC {
                font-size: 0.6em;
                border-bottom: 1px solid #767171;
                text-align: center;
            }

            .contact-MC .contact-item {
                width: 100%;
            }
        }

        @media only screen and (max-width: 450px) {
            .contenedor .footer-mail {
                width: 105%;
                height: 100px;
                left: -0.5rem;
                bottom: -4rem;
                border-radius: 0px 50px 0px 50px;
            }

            .contenedor {
                padding: 0rem 1.5rem;
            }

            .container-algo .info-MC {
                width: 100%;
                flex-direction: column;
            }

            .info-MC .name-MC {
                font-size: 0.8em;

            }

            .info-MC .Pei-MC {
                font-size: 0.4em;
                border-bottom: 1px solid #767171;
                text-align: center;
            }
        }

    </style>
</head>

<body>


    <div class="contenedor">
        <div class="tituloMail">{{ $data['title'] }}</div>
        <div class="contenedorInfo">
            <div class="left-cont">
                <div class="subtituloMail">{{ $data['subtitle'] }}</div>
                <div class="optionalText">{{ $data['optionalText'] }}</div>
                <div class="infoMail">
                    <p>{{ $data['text'] }}</p>
                </div>
            </div>
            <div class="right-cont">
                <div class="icon">
                    <i class="fas fa-hourglass"></i>
                </div>
            </div>
        </div>
        <div class="footer-mail">
            <img src="http://imgfz.com/i/OizNQLX.jpeg" alt="POV - Maria Cano IED">
            <div class="container-algo">
                <div class="info-MC">
                    <p class="name-MC">María Cano IED</p>
                    <p class="Pei-MC">"Formación integral para la Comunicación, el Arte y Proyecto de vida"</p>
                </div>
                <div class="contact-MC">
                    <div class="contact-item">
                        <p class="info">
                            <ion-icon class="icono" name="at-outline"></ion-icon>colmariacano@educacionbogota.edu.co
                        </p>
                    </div>
                    <div class="contact-item">
                        <p class="info">
                            <ion-icon class="icono" name="call-outline"></ion-icon>324 1000 (Línea 195) - 310 221 0513
                        </p>
                    </div>
                    <div class="contact-item">
                        <p class="info">
                            <ion-icon class="icono" name="business-outline"></ion-icon>Transversal 5 U $48 J 30 SUR
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Iconografía - Ion Icons(Secundario) --}}
    <script type="module" src="https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.js"></script>
</body>

</html>
