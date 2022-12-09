@extends('principal')
@section('Links')
    <ul class="navbar-nav links_navbar_">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('listaCliente.index') }}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('listaCliente.equipo') }}">ver equipo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('contacto') }}">contacto</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('sobreNosotros') }}">sobre nosotros</a>
        </li>
    </ul>
@endsection
@section('contenidoPrincipal')
    <style>
        .jumbotrons {
            background: #D5DBDB;
        }
    </style>
    <div class="jumbotrons mb-0 py-5">

        <div class="container text-center">
            <h1>Nuestra Misión</h1>
            <img src="https://crislugo.opennemas.com/media/crislugo/images/2021/02/11/2021021121502429318.png"
                alt="mision" class="img_about1">


            <p class="lead text-justify">Dedicados a cuidar las bicicletas y las personas. Estamos comprometidos con
                nuestros clientes
                para que
                disfruten al máximo de la enriquecedora experiencia de ver el mundo sobre dos ruedas.
            </p>
        </div>

        <div class="container text-center">
            <h1 class="mt-5 mb-4">Sobre nosotros</h1>

            <p class="lead text-justify">Comprometidos con nuestros clientes desde antes de ser clientes.
                Para nosotros la transparencia y honestidad son clave y se reflejan en todas y cada una de las acciones que
                llevamos a cabo, desde la descripción de los productos, el pricing, hasta la atención post compra.

                Buscamos establecer un trato cercano y cordial con nuestros clientes. Lo más importante para nosotros es
                conocer su problema, buscar y ofrecer las mejores soluciones que estén a nuestro alcance.

                Tenemos un fuerte compromiso con la sostenibilidad, apoyamos firmemente el uso de la bicicleta como medio de
                transporte limpio. Por eso queremos ofrecer nuestra ayuda para que las bicis siempre estén en las mejores
                condiciones posibles. Además, estamos continuamente mejorando e innovando para que la mayoría de nuestros
                productos sean biodegradables, ya que no nos conformamos únicamente con apoyar el uso de la bici, nosotros
                también aportamos nuestro granito de arena en el día a día.
            </p>
            <img src="http://www.wes.com.tr/en/wp-content/uploads/2017/12/about.png" alt="about" class="img_about2">
        </div>
        <div class="container text-center">
            <h1 class="mt-4">Visión</h1>

            <p class="lead text-justify">Pedalear hacia una comunidad de personas preocupadas y amantes de los detalles, del
                deporte,
                del medio ambiente y de disfrutar la vida.
            </p>
        </div>
    </div>
@endsection
