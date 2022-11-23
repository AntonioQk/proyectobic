@extends('principal')


@section('Links')
    <ul class="navbar-nav mx-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('lista.index') }}">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('lista.equipo') }}">Ver equipo</a>
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
    <a href="{{ route('equipo.create') }}" class="ml-5 pl-5"><button type="button"
            class="btn btn-info ml-5 mt-5 boton_redondo"><b>+</b> Agregar
            Equipo</button></a>
    <div class="container row mt-5 mb-5 mx-auto">
        <?php $modal2 = 0; ?>
        @forelse ($Equipos as $item)
            <?php
            $estado_bici = $item->estado;
            $estado = '';
            if ($estado_bici == 1) {
                $estado = 'Disponible';
            } elseif ($estado_bici == 2) {
                $estado = 'Ocupado';
            } elseif ($estado_bici == 3) {
                $estado = 'Fuera de servicio';
            }

            ?>
            <div class="col-12 col-md-6 col-lg-4 mb-3">
                <div class="card tarjeta">
                    <img src={{ asset($item->img_equipo) }} class="card-img-top img-card" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nombre }}</h5>
                        <p class="card-text">{{ $item->descripcion }}</p>
                        <p class="card-text"><small class="text-muted"><?php echo $estado; ?></small></p>

                        <div class="container-modal-btn">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning boton_redondo" data-toggle="modal"
                                data-target="#modal<?php echo $modal2; ?>">
                                Editar Equipo
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modal<?php echo $modal2; ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{ $item->nombre }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{ route('equipo.update', $item->id) }}"
                                                class="container mt-5 pt-5 mb-5 pb-5">
                                                @csrf
                                                @method('put')
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label for="customControlValidation1_1">Nombre del equipo</label>
                                                        <input type="text" class="form-control"
                                                            id="customControlValidation1_1" placeholder="Nombre del equipo"
                                                            required name="nombre_update" value="{{ $item->nombre }}"
                                                            maxlength="35" minlength="5"
                                                            onkeyup="this.value=NumText(this.value)">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="validationTextarea">Descripción</label>
                                                    <textarea class="form-control" id="validationTextarea2" placeholder="Descripcion del equipo" name="desc_update" required
                                                        minlength="5" onkeyup="this.value=NumText(this.value)">{{ $item->descripcion }}</textarea>
                                                </div>
                                                <div class="container_botones_cards">
                                                    <a href="#"><img src="{{ asset('/img/Basura.png') }}"
                                                            class="img_basura"></a>
                                                </div>
                                                <input type="submit" class="btn btn-success" value="Guardar">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <?php $modal2 = $modal2 + 1; ?>


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
