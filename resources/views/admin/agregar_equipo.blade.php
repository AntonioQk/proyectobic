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
            <a class="nav-link" href="{{ route('usuario.create') }}">Agregar administrador</a>
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
                @error('nombre')
                    <p class="msj">*{{ $message }}</p>
                @enderror
            </div>
        </div>
        <label for="cantidad" class="mt-2">Cantidad</label>
        <input class="form-control col-2" type="number" id="cantidad" name="cantidad_equipo" min="1">
        @error('cantidad_equipo')
            <p class="msj">*{{ $message }}</p>
        @enderror
        <div class="mb-3 mt-2">
            <label for="validationTextarea2">Descripción</label>
            <textarea class="form-control" id="validationTextarea2" placeholder="Descripcion del equipo" name="descripcion" required
                onkeyup="this.value=NumText(this.value)"></textarea>
            @error('descripcion')
                <p class="msj">*{{ $message }}</p>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input type="file" name="img_equipo" id="seleccionArchivos" accept="image/*" class="input_img" required>
            <br><br>
            <!-- La imagen que vamos a usar para previsualizar lo que el usuario selecciona -->
            <img id="imagenPrevisualizacion" class="img_bici_tamaño">
        </div>
        <button type="submit" class="btn btn-success">Guardar equipo</button>
    </form>

    <script>
        function NumText(string) { //solo letras y numeros
            var out = '';
            //Se añaden las letras validas
            var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890, '; //Caracteres validos

            for (var i = 0; i < string.length; i++)
                if (filtro.indexOf(string.charAt(i)) != -1)
                    out += string.charAt(i);
            return out;
        }

        // Obtener referencia al input y a la imagen

        const $seleccionArchivos = document.querySelector("#seleccionArchivos"),
            $imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion");

        // Escuchar cuando cambie
        $seleccionArchivos.addEventListener("change", () => {
            // Los archivos seleccionados, pueden ser muchos o uno
            const archivos = $seleccionArchivos.files;
            // Si no hay archivos salimos de la función y quitamos la imagen
            if (!archivos || !archivos.length) {
                $imagenPrevisualizacion.src = "";
                return;
            }
            // Ahora tomamos el primer archivo, el cual vamos a previsualizar
            const primerArchivo = archivos[0];
            // Lo convertimos a un objeto de tipo objectURL
            const objectURL = URL.createObjectURL(primerArchivo);
            // Y a la fuente de la imagen le ponemos el objectURL
            $imagenPrevisualizacion.src = objectURL;
        });
    </script>
@endsection
