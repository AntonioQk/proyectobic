@extends('principal')


@section('Links')
    <ul class="navbar-nav mx-auto">
        <li class="nav-item active">
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
    <div class="container">
        <a href="{{ route('bicicleta.create') }}" class=""><button type="button"
                class="btn btn-info ml-3 mt-5 boton_redondo"><b>+</b> Agregar
                Bicicleta</button></a>
    </div>
    <div class="container pl-5 mt-3">
        <label class="mr-2">Filtar por:</label>
        <a href="{{ route('lista.index_dispo') }}"><button class="btn btn-success" type="button">Disponibles</button></a>
        <a href="{{ route('lista.index_ocu') }}"><button class="btn btn-info" type="button">Ocupados</button></a>
        <a href="{{ route('lista.index_fuera') }}"><button class="btn btn-danger" type="button">Fuera de
                servicio</button></a>
        <a href="{{ route('lista.index') }}"><button class="btn btn-secondary" type="button">Sin filtro</button></a>
    </div>
    <div class="container row mt-3 mb-5 mx-auto">
        <?php $modal = 0; ?>
        @forelse ($Bicicletas as $item)
            <?php
            $estado_bici = $item->estado_bici;
            $estado = '';
            $estado2 = '';
            $valor1 = 0;
            $valor2 = 0;

            if ($estado_bici == 1) {
                $estado = 'Disponible';
                $estado2 = 'Ocupado';
                $valor1 = 1;
                $valor2 = 2;
            } elseif ($estado_bici == 2) {
                $estado = 'Ocupado';
                $estado2 = 'Disponible';
                $valor1 = 2;
                $valor2 = 1;
            } elseif ($estado_bici == 3) {
                $estado = 'Fuera de servicio';
            }
            ?>

            <div class="col-12 col-md-6 col-lg-4 mb-3">
                <div class="card tarjeta">
                    <img src={{ asset($item->img_bici) }} class="card-img-top img-card" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Marca: <i>{{ $item->marca }}</i></h5>
                        <h5 class="card-subtitle">Bicicleta de tipo: <i>{{ $item->tipo }}</i> </h5>
                        <p class="card-text">{{ $item->descripcion }}</p>
                        <p class="card-text"><small class="text-muted"><?php echo $estado; ?></small></p>
                        <div class="container-modal-btn">
                            <button type="button" class="btn btn-warning boton_redondo" data-toggle="modal"
                                data-target="#modal<?php echo $modal; ?>">
                                Editar bicicleta
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modal<?php echo $modal; ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{ $item->marca }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src={{ asset($item->img_bici) }} class="img_bici_actualizar"
                                                alt="...">

                                            <form method="post" action="{{ route('bicicleta.update', $item->id) }}"
                                                class="container mt-5 mb-5 pb-5" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label for="marca">Marca</label>
                                                        <input type="text" class="form-control" id="marca" required
                                                            name="marca_update" placeholder="Marca"
                                                            value="{{ $item->marca }}"
                                                            onkeyup="this.value=NumText(this.value)">
                                                    </div>
                                                    <div class="col">
                                                        <label for="tipo">Tipo de bicicleta</label>
                                                        <select name="tipo_update" id="tipo" class="form-control"
                                                            required>
                                                            <option value="Montaña">Bicicleta de
                                                                {{ $item->tipo }}</option>
                                                            <option value="Montaña">Bicicleta de Montaña</option>
                                                            <option value="Infantil">Bicicleta Infantil</option>
                                                            <option value="Grabel">Bicicleta de Grabel</option>
                                                            <option value="Ruta">Bicicleta de Ruta</option>
                                                            <option value="Doble">Bicicleta Doble</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="descripcion">Descripción</label>
                                                    <textarea class="form-control" id="descripcion" placeholder="Descripcion de la bicicleta" name="descripcion_update"
                                                        required onkeyup="this.value=NumText(this.value)">{{ $item->descripcion }}</textarea>
                                                </div>
                                                <div>
                                                    <label for="estado">Estado de la bicicleta</label>
                                                    <select name="estado_update" id="estado" class="form-control col-6"
                                                        required>
                                                        <option value=<?php echo $valor1; ?> selected><?php echo $estado; ?>
                                                        </option>
                                                        <option value=<?php echo $valor2; ?>><?php echo $estado2; ?></option>
                                                    </select>
                                                </div>
                                                <div class="mt-3">
                                                    <label for="seleccionArchivos2">Seleccionar nueva imagen</label>
                                                    <input type="file" name="img_bici_update" class="input_img mb-3">

                                                </div>
                                                <div class="container_botones_cards">
                                                    <a href="#"><img src="{{ asset('/img/Basura.png') }}"
                                                            class="img_basura"></a>
                                                </div>
                                                <input type="submit" class="btn btn-success" value="Guardar">

                                            </form>
                                        </div>

                                        {{-- <div class="modal-footer d-flex justify-content-center">
                                            <button type="button" class="btn btn-success">Guardar cambios</button>
                                        </div> --}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php $modal = $modal + 1; ?>



        @empty
            <li>No hay bicicletas para mostrar</li>
        @endforelse
    </div>

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
    </script>
@endsection
