<?php
session_start();

if ($_POST) {

    $mensaje = 'Usuario o Contraseña Incorrecto';

    if ($_POST['usuario'] == 'reokun' && $_POST['password'] == '1234') {

        $_SESSION['usuario'] = $_POST['usuario'];

        header('Location: secciones/index.php');
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #4AD2DB;
        }

        .hero {
            background-image: url(src/Banner.jpg.jpeg);
            background-repeat: no-repeat;
            background-size: cover;
            height: 400px;
            position: relative;
            margin-bottom: 2rem;
        }

        .contenido-hero {
            position: absolute;
            background-color: rgba(0, 0, 0, .7);
            background-color: 0 0 0 / 70%;
            width: 100%;
            height: 100%;

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .contenido-hero h2,
        .contenido-hero p {
            color: white;
        }

        .contenido-hero .ubicacion {
            display: flex;
            align-items: flex-end;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .card {
            width: 100%;
        }

        .card-header {
            background-color: #007bff;
            color: #ffffff;
        }

        .card-body {
            padding: 20px;
        }

        label {
            font-weight: bold;
        }

        button {
            width: 100%;
        }
    </style>
</head>

<body>

    <section class="hero">
        <div class="contenido-hero">
            <h2>Sacame de Dudas<span></span></h2>


            <p>Guadalajara, Mexico</p>



        </div> <!--contenido-hero-->
    </section>
    <div class="container">
        <div class="col-md-4">
            <br>
            <form action="" method="post">
                <div class="card">
                    <div class="card-header">
                        Inicio de sesion
                    </div>
                    <div class="card-body">

                        <?php if (isset($mensaje)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <strong><?php echo $mensaje; ?></strong>
                            </div>
                        <?php } ?>

                        <div class="mb-3">
                            <label for="" class="form-label">Usuario</label>
                            <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="usuario">

                            <small id="helpId" class="form-text text-muted">Escriba su usuario</small>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" name="password" id="contrasenia" aria-describedby="helpId" placeholder="password">
                            <small id="helpId" class="form-text text-muted">Escriba su contraseña</small>
                        </div>

                        <button type="submit" class="btn btn-primary">Iniciar sesion</button>
                    </div>
            </form>
        </div>
    </div>
    </div>


    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2023 Sacame de Dudas. Todos los derechos reservados.</p>
    </footer>

    <!-- Agregamos los scripts de Bootstrap al final del cuerpo para mejorar el rendimiento -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>