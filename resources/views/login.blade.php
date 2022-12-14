<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
    <link rel="shortcut icon" href="{{ asset('/img/logo.png') }}" type="image/x-icon">
</head>

<body class="fondo_login">
    @include('components.flash_alerts')

    <div class="fondo_login2">
        <div class="container_login">
            <div>
                <img src="{{ asset('/img/logo.png') }}" alt="logo" width="90" height="90">
            </div>
            <h3 class="mt-3">INICIO DE SESIÓN</h3>
            <form method="POST" action="{{ route('usuario.login') }}">
                @csrf
                <div class="form-group text-left">
                    <label for="exampleFormControlInput1" class="mt-3">Correo Electronico</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1"
                        placeholder="name@example.com" onkeyup="this.value=NumText(this.value)" name="email">
                </div>

                <div class="form-group text-left">
                    <label for="exampleFormControlInput2" class="mt-2">Contraseña</label>
                    <input type="password" class="form-control" id="exampleFormControlInput2" minlength="8"
                        maxlength="15" onkeyup="this.value=NumText(this.value)" name="password">
                </div>
                <div>

                    <input type="submit" class="btn mt-3 btn-login2" value="Iniciar sesion">
                    <a href="{{ route('registro') }}" class="btn mt-3 btn-login1">Crear Cuenta</a>

                </div>
            </form>

        </div>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script>
        function NumText(string) { //solo letras y numeros
            var out = '';
            //Se añaden las letras validas
            var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890@._ '; //Caracteres validos

            for (var i = 0; i < string.length; i++)
                if (filtro.indexOf(string.charAt(i)) != -1)
                    out += string.charAt(i);
            return out;
        }
    </script>

</body>

</html>
