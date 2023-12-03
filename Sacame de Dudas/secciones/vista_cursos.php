<?php include('../templates/cabecera.php'); ?>
<?php include('../secciones/cursos.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4">Listado de Cursos</h2>
                <div class="row">
                    <div class="col-md-5">
                        <form action="" method="post">
                            <div class="card">
                                <div class="card-header bg-primary text-white">Cursos</div>
                                <div class="card-body">
                                    <div class="form-group d-none">
                                        <label for="id" class="form-label">ID</label>
                                        <input type="text" class="form-control" name="id" id="id" value="<?php echo $id; ?>" aria-describedby="helpId" placeholder="ID">
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre_curso" class="form-label">Nombre del Curso</label>
                                        <input type="text" class="form-control" name="nombre_curso" id="nombre_curso" value="<?php echo $nombre_curso; ?>" aria-describedby="helpId" placeholder="Nombre del curso">
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Button group name">
                                        <button type="submit" name="accion" value="agregar" class="btn btn-success">Agregar</button>
                                        <button type="submit" name="accion" value="editar" class="btn btn-warning">Editar</button>
                                        <button type="submit" name="accion" value="borrar" class="btn btn-danger">Borrar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-7">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($listaCursos as $curso) { ?>
                                    <tr>
                                        <td><?php echo $curso['id']; ?></td>
                                        <td><?php echo $curso['nombre_curso']; ?></td>
                                        <td>
                                            <form action="" method="post">
                                                <input type="hidden" name="id" value="<?php echo $curso['id']; ?>" />
                                                <input type="hidden" name="nombre_curso" value="<?php echo $curso['nombre_curso']; ?>" />
                                                <input type="submit" value="seleccionar" name="accion" class="btn btn-info">
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2023 Sacame de Dudas. Todos los derechos reservados.</p>
    </footer>

    <!-- Agregamos los scripts de Bootstrap al final del cuerpo para mejorar el rendimiento -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>



<?php include('../templates/pie.php'); ?>