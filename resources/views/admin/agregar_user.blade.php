@extends('principal')


@section('Links')
    <ul class="navbar-nav links_navbar_">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('lista.index') }}">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link"href="{{ route('lista.equipo') }}">Ver equipo</a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('bicicleta.create') }}">Agregar bicicleta</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('equipo.create') }}">Agregar equipo</a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link active">Agregar administrador</a>
        </li>
    </ul>
@endsection

@section('contenidoPrincipal')
    <div class="container_registro mx-auto mt-4 mb-3">
        <h3>Agregar nuevo usuario de tipo Administrador</h3>
        <form method="POST" action="{{ route('usuario.store') }}">
            @csrf
            <input type="text" name="rol" value=1 class="input_escondido">
            <div class="form-group text-left">
                <label for="exampleFormControlInput1" class="mt-1">Nombre completo</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tus Nombres"
                    onkeyup="this.value=NumText(this.value)" name="nombre" required>
            </div>
            <div class="form-group text-left">
                <label for="exampleFormControlInput2" class="mt-1">Apellidos</label>
                <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Apellidos"
                    onkeyup="this.value=NumText(this.value)" name="apellido" required>
            </div>
            <div class="form-group text-left">
                <label for="exampleFormControlInput3" class="mt-1">Correo Electronico</label>
                <input type="email" class="form-control" id="exampleFormControlInput3" placeholder="name@example.com"
                    onkeyup="this.value=NumText(this.value)" name="correo" required>
            </div>

            <div class="form-group text-left">
                <label for="exampleFormControlInput4" class="mt-1">Contraseña</label>
                <input type="password" class="form-control" id="exampleFormControlInput4" name="contra" required>
            </div>
            <div>

                <input type="submit" class="btn mt-2 btn-login2" value="Crear cuenta">
                <a href="{{ route('login') }}" class="btn mt-2 btn-login1">Cancelar</a>

            </div>
        </form>

    </div>
@endsection
