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
    <div class="jumbotrons mt-5">

        <div class="container">
            <h1>Nuestra Misión</h1>
            <img src="https://crislugo.opennemas.com/media/crislugo/images/2021/02/11/2021021121502429318.png"
                alt="mision" class="img_about1">


            <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti debitis impedit expedita
                illum dolor sapiente aliquid vero ducimus autem ullam placeat, magni ut, quasi vitae eveniet nulla adipisci
                animi accusantium?
                Quia iusto aliquid eveniet, libero reiciendis a? Perspiciatis quis consequuntur porro doloremque, harum
                itaque iste totam nemo cupiditate ratione, voluptatum quas, expedita ut aliquam fuga illo ad maxime tenetur
                laboriosam?
                Voluptatem voluptatum, totam amet non sunt corrupti nihil animi placeat a, vitae doloribus quis repellat ab.
                Qui, ab error maxime quos doloremque quas, incidunt facilis expedita in sint possimus delectus!
                Hic reprehenderit ducimus assumenda vel doloremque facilis architecto, quam pariatur id soluta? In aut
                voluptatibus accusantium atque, expedita tempora maxime omnis voluptas repellendus consequatur alias modi
                est quos possimus facilis.
            </p>
        </div>

        <div class="container">
            <h1>Sobre nosotros</h1>
            <img src="http://www.wes.com.tr/en/wp-content/uploads/2017/12/about.png" alt="about" class="img_about2">


            <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti debitis impedit expedita
                illum dolor sapiente aliquid vero ducimus autem ullam placeat, magni ut, quasi vitae eveniet nulla adipisci
                animi accusantium?
                Quia iusto aliquid eveniet, libero reiciendis a? Perspiciatis quis consequuntur porro doloremque, harum
                itaque iste totam nemo cupiditate ratione, voluptatum quas, expedita ut aliquam fuga illo ad maxime tenetur
                laboriosam?
                Voluptatem voluptatum, totam amet non sunt corrupti nihil animi placeat a, vitae doloribus quis repellat ab.
                Qui, ab error maxime quos doloremque quas, incidunt facilis expedita in sint possimus delectus!
                Hic reprehenderit ducimus assumenda vel doloremque facilis architecto, quam pariatur id soluta? In aut
                voluptatibus accusantium atque, expedita tempora maxime omnis voluptas repellendus consequatur alias modi
                est quos possimus facilis.
            </p>
        </div>
    </div>
@endsection
