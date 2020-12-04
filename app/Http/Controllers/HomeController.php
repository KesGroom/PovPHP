<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Permiso;
use App\Models\Rol_has_permiso;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public static function index()
    {
        $rhp = RolHasPermisoController::rhp();
        if(session('lang')=='es'){
            $frase = HomeController::mensajesEspanol();
        }else{
            $frase = HomeController::mensajesIngles();
        }
        return view('home', compact('rhp', 'frase'));
    }
    public static function mensajesEspanol()
    {
        $mensajes = [
            "“El mejor momento para plantar un árbol fue hace 20 años. El segundo mejor momento es AHORA.”",
            "Mi mujer y yo fuimos felices durante 20 años. Luego, nos conocimos",
            "“Cada día es una nueva oportunidad para cambiar tu vida.”",
            "“El momento que da más miedo es siempre justo antes de empezar.”",
            "“El éxito en la vida no se mide por lo que logras sino por los obstáculos que superas.”",
            "«Mañana es una excusa maravillosa, ¿No crees?»",
            "«Esperar ser otra persona es una pérdida de tiempo.»",
            "«Debes hacer las cosas que crees que no puedes hacer.»",
            "«Tu mejor profesor es tu mayor error.»",
            "“Las cosas buenas llegan a los que saben esperar.”",
            "Seguramente existen muchas razones para los divorcios, pero la principal es y será la boda",
            "“No busques el momento perfecto, solo busca el momento y hazlo perfecto.”",
            "“No importa lo que pase, siempre tendrás una historia que contar.”",
            "Tener la conciencia limpia es señal de mala memoria",
            "“Queda terminantemente prohibido levantarse sin ilusiones.”",
            "“Levántate, suspira, sonríe, y sigue adelante.”",
            "Me gustaría tomarte en serio pero hacerlo sería ofender tu inteligencia",
            "“Ojalá vivas todos los días de tu vida.”",
            "Sólo hay dos cosas infinitas: el universo y la estupidez humana. Y no estoy tan seguro de la primera",
            "“Una persona que nunca se equivocó nunca intentó nada nuevo.”",
            "Nunca olvido una cara, pero en su caso estaré encantado de hacer una excepción",
            "“Aquél que lo piensa mucho antes de dar un paso, se pasará toda su vida en un solo pie.”",
            "“Lo único imposible es aquello que no intentas.”",
            "“La disciplina es el puente entre tus metas y tus logros.”",
            "«Los retos son lo que hacen la vida interesante, y superarlos es lo que hace que la vida tenga un significado.»",
            "La edad es algo que no importa, a menos que sea usted un queso",
            "“Si la montaña que subes parece cada vez más imponente es que la cima está cada vez más cerca.”",
            "“Vive. El dinero se recupera, el tiempo no.”",
            "Me gustan los largos paseos, especialmente cuando los toman gente molesta",
            "“Mientras más fuertes sean tus pruebas, más grandes serán tus victorias.”",
            "Claro que lo entiendo. Incluso un niño de cinco años podría entenderlo. Traigan un niño de cinco años!",
            "No te tomes la vida demasiado en serio. No saldrás de ella con vida",
            "”Si buscas resultados distintos, no hagas siempre lo mismo.”",
            "«Ser positiva en una situación negativa no es ser inocente, es ser líder.»",
            "“¿Quieres renunciar? Pues entonces es el momento de insistir más.”",
            "Todo es divertido, con tal de que le suceda a otra persona",
            "“Ningún mar en calma hizo experto a un marinero.”",
            "“Si el plan no funciona, cambia el plan, pero no cambies la meta.”",
            "“Las dificultades no existen para hacerte renunciar sino para hacerte más fuerte.”",
            "«Si te cansas, aprende a descansar, no a renunciar»",
            "Un experto es alguien que te explica algo sencillo de forma confusa de tal manera que te hace pensar que la confusión sea culpa tuya",
            "Fuera del perro, un libro es probablemente el mejor amigo del homnre, y dentro del perro probablemente está demasiado oscuro para leer",
            "Si pudieras patear en el trasero al responsable de casi todos tus problemas, no podrías sentarte por un mes",
            "Suelo cocinar con vino, a veces incluso se lo agrego a la comida",
            "La vida es dura. Después de todo, te mata",
            "“Si te sientes perdido en el mundo es porque todavía no has salido a buscarte.”",
            "Esas personas que creen que lo saben todo son una verdadera molestia para aquellos que de verdad lo sabemos todo",
            "Cuando la vida te da limones, arrójaselos a alguien a los ojos",
            "El sexo es como el mus: sí no tienes buena pareja... más te vale tener una buena mano",
            "“Trabaja en silencio, haz que el éxito haga todo el ruido.”",
            "“Rara vez nos damos cuenta que estamos rodeados por lo extraordinario.”",
            "Nunca dejes para mañana lo que puedes hacer pasado mañana",
            "Ríe y el mundo reirá contigo, ronca y dormirás solo",
            "Encuentro la telvisión muy educativa. Cada vez que alguien la enciende, me retiro a otra habitación y leo un libro",
            "Hago ejercicio a menudo. Mira, precisamente ayer tomé el desayuno en la cama",
            "Mi idea de una persona agradable es una persona que está de acuerdo conmigo",
            "“Trabajar duro te llevará a la cima, disfrutar el camino te llevará más lejos.”",
            "El amor nunca muere de hambre; con frecuencia, de indigestión",
            "Santa Claus tenía la idea correcta: visita a la gente una vez al año",
            "Para volver a ser joven yo haría cualquier cosa en el mundo excepto ejercicio, levantarme temprano o ser respetable",
            "Mis plantas de plástico murieron porque no aparenté regarlas",
            "Me puse a dieta, juré que no volvería a beber ni a comer con exceso y en catorce días había perdido dos semanas",
            "¡Odio las tareas del hogar! Haces las camas, limpias los platos y seis meses después tienes que empezar de nuevo",
        ];
        $numero_aleatorio = rand(0, 62);
        return $mensajes[$numero_aleatorio];
    }

    public static function mensajesIngles()
    {
        $mensajes = [

            "“The best time to plant a tree was 20 years ago. The second best time is NOW.”",
            "My wife and I were happy for 20 years. Then we met",
            "“Every day is a new opportunity to change your life.”",
            "“The scariest moment is always right before we start.”",
            "“Success in life is not measured by what you achieve but by the obstacles you overcome.”",
            "«Tomorrow is a wonderful excuse, don't you think?»",
            "«Waiting to be someone else is a waste of time.»",
            "«You should do the things you think you cannot do.»",
            "«Your best teacher is your biggest mistake.»",
            "“Good things come to those who know how to wait.”",
            "There are surely many reasons for divorces, but the main one is and will be the wedding",
            "“Don't look for the perfect moment, just find the moment and make it perfect.”",
            "“No matter what happens, you always have a story to tell.”",
            "Having a clear conscience is a sign of bad memory",
            "“It is strictly forbidden to get up without illusions.”",
            "“Get up, sigh, smile, and move on.”",
            "I would like to take you seriously but to do so would be to offend your intelligence",
            "“I hope you live all the days of your life.”",
            "There are only two infinite things: the universe and human stupidity. And I'm not so sure about the first one",
            "“A person who was never wrong never tried anything new.”",
            "I never forget a face, but in your case I will be happy to make an exception",
            "“He who thinks long before taking a step will spend his whole life on one foot.”",
            "“The only thing impossible is what you don't try.”",
            "“Discipline is the bridge between your goals and your achievements.”",
            "«Challenges are what make life interesting, and overcoming them is what makes life meaningful.»",
            "Age is something that doesn't matter, unless you are a cheese",
            "“If the mountain you are climbing seems more and more imposing, it is because the top is getting closer. ”",
            "“Live. Money recovers, time does not.”",
            "I like long walks, especially when annoying people take them",
            "“The stronger your trials, the greater your victories.”",
            "Of course I understand. Even a five year old could understand it. Bring a five year old!",
            "Don't take life too seriously. You won't get out of it alive",
            "“If you are looking for different results, don't always do the same.”",
            "«Being positive in a negative situation is not being innocent, it is being a leader.»",
            "“Do you want to resign? Well then it is time to insist more.”",
            "Everything is fun, as long as it happens to someone else",
            "“No calm sea made a sailor expert.”",
            "“If the plan doesn't work, change the plan, but don't change the goal.”",
            "“Difficulties do not exist to make you quit but to make you stronger.”",
            "«If you get tired, learn to rest, not to give up»",
            "An expert is someone who explains something simple in a confusing way in such a way that makes you think that the confusion is your fault",
            "Outside the dog, a book is probably man's best friend, and inside the dog it's probably too dark to read",
            "If you could kick the person responsible for almost all your problems in the butt, you couldn't sit for a month",
            "I usually cook with wine, sometimes I even add it to food",
            "Life is hard. After all, it kills you",
            "“If you feel lost in the world it is because you have not yet come looking for you.”",
            "Those people who think they know everything are a real nuisance to those who really know everything",
            "When life gives you lemons, throw someone in the eyes",
            "Sex is like mus: if you don't have a good partner ... you better have a good hand",
            "“Work in silence, make success make all the noise.”",
            "“We seldom realize that we are surrounded by the extraordinary.”",
            "Never put off until tomorrow what you can do day after tomorrow",
            "Laugh and the world will laugh with you, snore and you will sleep alone",
            "I find television very educational. Every time someone turns it on, I retire to another room and read a book",
            "I exercise often. Look, I just had breakfast in bed yesterday",
            "My idea of ​​a nice person is a person who agrees with me",
            "“Working hard will take you to the top, enjoying the journey will take you further.”",
            "Love never starves; often indigestion",
            "Santa Claus had the right idea: he visits people once a year",
            "To get back to being young I wouald do anything in the world except exercise, getting up early or being respectable",
            "My plastic plants died because I didn't seem to water them",
            "I went on a diet, I swore I would never drink or overeat again and in fourteen days I had lost two weeks",
            "I hate household chores! You make the beds, clean the dishes and six months later you have to start again",
        ];
        $numero_aleatorio = rand(0, 62);
        return $mensajes[$numero_aleatorio];
    }
}
