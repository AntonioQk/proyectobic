@extends('principal')


@section('Links')
    <ul class="navbar-nav mx-auto">
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
            <a class="nav-link">Agregar administrador</a>
        </li>
    </ul>
@endsection


@section('contenidoPrincipal')
    <h1 class="subtitle text-center pt-5">Agrega un nuevo equipo</h1>
    <form method="POST" action="{{ route('equipo.store') }}" class="container mt-5 pt-5 mb-5 pb-5"
        enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="col">
                <label for="customControlValidation1_1">Nombre del equipo</label>
                <input type="text" class="form-control" id="customControlValidation1_1" placeholder="Nombre del equipo"
                    required name="nombre" onkeyup="this.value=NumText(this.value)">
            </div>
        </div>
        <div class="mb-3">
            <label for="validationTextarea2">Descripción</label>
            <textarea class="form-control" id="validationTextarea2" placeholder="Descripcion del equipo" name="descripcion" required
                onkeyup="this.value=NumText(this.value)"></textarea>
        </div>
        <div class="input-group mb-3">
            <input type="file" name="img_equipo" class="input_img" id="img_equipo">
        </div>
        <button type="submit" class="btn btn-success">Guardar equipo</button>
    </form>

    <script>
        function NumText(string) { //solo letras y numeros
            var out = '';
            //Se añaden las letras validas
            var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890 '; //Caracteres validos

            for (var i = 0; i < string.length; i++)
                if (filtro.indexOf(string.charAt(i)) != -1)
                    out += string.charAt(i);
            return out;
        }
    </script>
@endsection
