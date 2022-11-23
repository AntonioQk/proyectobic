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
            <a class="nav-link">Agregar administrador</a>
        </li>
    </ul>
@endsection

@section('contenidoPrincipal')
    <a href="{{ route('bicicleta.create') }}" class="ml-5 pl-5"><button type="button"
            class="btn btn-info ml-5 mt-5 boton_redondo"><b>+</b> Agregar
            Bicicleta</button></a>
    <div class="container row mt-5 mb-5 mx-auto">
        <?php $modal = 0; ?>
        @forelse ($Bicicletas as $item)
            <?php
            $estado_bici = $item->estado_bici;
            $estado = '';
            $estado2 = '';
            if ($estado_bici == 1) {
                $estado = 'Disponible';
                $estado2 = 'Ocupado';
            } elseif ($estado_bici == 2) {
                $estado = 'Ocupado';
                $estado2 = 'Disponible';
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

                                            <form method="post" action="{{ route('bicicleta.update', $item->id) }}"
                                                class="container mt-5 mb-5 pb-5">
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
                                                <div class="col-6">
                                                    <label for="estado">Estado de la bicicleta</label>
                                                    <select name="estado_update" id="estado" class="form-control"
                                                        required>
                                                        <option value="1" selected><?php echo $estado; ?></option>
                                                        <option value="2"><?php echo $estado2; ?></option>
                                                    </select>
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
            <li>No hay proyectos para mostrar</li>
        @endforelse
    </div>

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
