@extends('principal')


@section('Links')
    <ul class="navbar-nav links_navbar_">
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('listaCliente.index') }}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('listaCliente.equipo') }}">ver equipo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('contacto') }}">contacto</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('sobreNosotros') }}">sobre nosotros</a>
        </li>
    </ul>
@endsection

@section('contenidoPrincipal')
    <div class="container row mt-5 mb-5 mx-auto">
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
                <div class="card tarjeta tarjeta2">
                    <img src={{ asset($item->img_bici) }} class="card-img-top img-card" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Marca: <i>{{ $item->marca }}</i></h5>
                        <h5 class="card-subtitle">Bicicleta de tipo: <i>{{ $item->tipo }}</i> </h5>
                        <p class="card-text">{{ $item->descripcion }}</p>
                        <p class="card-text"><small class="text-muted"><?php echo $estado; ?></small></p>
                    </div>
                </div>
            </div>



        @empty
            <li>No hay proyectos para mostrar</li>
        @endforelse
    </div>
@endsection
