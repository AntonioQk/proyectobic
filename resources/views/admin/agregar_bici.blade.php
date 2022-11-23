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
    <h1 class="subtitle text-center pt-5">Agrega una bicicleta nueva</h1>

    <form method="POST" action="{{ route('bicicleta.store') }}" class="container mt-5 mb-5 pb-5"
        enctype="multipart/form-data">
        @csrf
        {{-- <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="validatedCustomFile" name="img">
            <label class="custom-file-label" for="validatedCustomFile">Subir imagen</label>
        </div> --}}
        <div class="form-row">
            <div class="col">
                <label for="customControlValidation1">Marca</label>
                <input type="text" class="form-control" id="customControlValidation1" name="marca" placeholder="Marca"
                    maxlength="20" minlength="3" required onkeyup="this.value=NumText(this.value)">
            </div>
            <div class="col">
                <label for="customControlValidation1">Tipo de bicicleta</label>
                <select name="tipo" id="customControlValidatio21" class="form-control" required>
                    <option disabled selected>Selecciona una bicicleta</option>
                    <option value="Montaña">Bicicleta de Montaña</option>
                    <option value="Infantil">Bicicleta Infantil</option>
                    <option value="Grabel">Bicicleta de Grabel</option>
                    <option value="Ruta">Bicicleta de Ruta</option>
                    <option value="Doble">Bicicleta Doble</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="validationTextarea">Descripción</label>
            <textarea class="form-control" id="validationTextarea" placeholder="Descripcion de la bicicleta" name="descrip" required
                minlength="5" onkeyup="this.value=NumText(this.value)"></textarea>
        </div>
        <div class="input-group mb-3">
            {{-- <div class="custom-file ">
                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                        aria-describedby="inputGroupFileAddon01" required name="img_bici">
                    <label class="custom-file-label input_img" for="inputGroupFile01">Subir imagen</label>
                </div> --}}
            <input type="file" name="img_bici" class="input_img" id="img_bici">
        </div>
        <button type="submit" class="btn btn-success">Guardar bicicleta</button>
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
