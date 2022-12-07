@extends('principal')
@section('Links')
    <ul class="navbar-nav links_navbar_">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('listaCliente.index') }}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('listaCliente.equipo') }}">ver equipo</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('contacto') }}">contacto</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('sobreNosotros') }}">sobre nosotros</a>
        </li>
    </ul>
@endsection
@section('contenidoPrincipal')
    <div class="container mb-5">
        <section class="row d-flex justify-content-center mt-2">
            <h2 class="mt-5 font-weight-bold">Contactenos</h2>
        </section>
        <!-- - -->
        <section class="row mt-3">
            <!-- col-1 -->
            <section class="col-md-12 col-lg-10">
                <!-- formuario -->
                <form method="POST" action="{{ route('contacto') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName">Nombre</label>
                        <input type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp"
                            name="nombre" placeholder="nombre" required onkeyup="this.value=Text(this.value)">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Correo</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="correo" placeholder="Correo" required onkeyup="this.value=Correo(this.value)">
                    </div>
                    <div>
                        <label for="exampleInputEmail1">Asunto</label>
                        <input type="text" class="form-control" id="exampleInputtext" aria-describedby="textHelp"
                            name="asunto" placeholder="asunto" required onkeyup="this.value=Text(this.value)">
                    </div>
                    <div class="form-group mt-3">
                        <label for="exampleFormControlTextarea1">Mensage</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ingres tu mensage"
                            name="mensage" required onkeyup="this.value=Correo(this.value)"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </section>
            <!-- col-2 -->
            <section class="col-md-12 col-lg-2 text-center mt-4">
                <br>
                <p>Campeche, Campeche, Av. Colosio</p> <br>
                <p>9811160488</p> <br>
                <p>biciRenta@gmail.com</p>
            </section>
        </section>
    </div>
    <script>
        function Text(string) { //solo letras y numeros
            var out = '';
            //Se añaden las letras validas
            var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ, '; //Caracteres validos

            for (var i = 0; i < string.length; i++)
                if (filtro.indexOf(string.charAt(i)) != -1)
                    out += string.charAt(i);
            return out;
        }


        function Correo(string) { //solo letras y numeros
            var out = '';
            //Se añaden las letras validas
            var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890@._ '; //Caracteres validos

            for (var i = 0; i < string.length; i++)
                if (filtro.indexOf(string.charAt(i)) != -1)
                    out += string.charAt(i);
            return out;
        }
    </script>
@endsection
