<?php include('../templates/cabecera.php'); ?>
<?php include('../secciones/colaborador.php'); ?>
<br />
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
            <div class="col-md-5">
                <form action="" method="post">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            Colaboradores
                        </div>
                        <div class="card-body">

                            <div class="form-group d-none">
                                <label for="" class="form-label">ID</label>
                                <input type="text" class="form-control" name="id" value="<?php echo $id; ?>" id="id" aria-describedby="helpId" placeholder="ID">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>" id="nombre" aria-describedby="helpId" placeholder="Escriba el nombre">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" value="<?php echo $apellidos; ?>" id="apellidos" aria-describedby="helpId" placeholder="Escriba los apellidos">
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Cursos del colaborador:</label>
                                <select multiple class="form-select form-select-lg" name="cursos[]" id="listCursos">


                                    <?php foreach ($cursos as $curso) { ?>
                                        <option <?php
                                                if (!empty($arregloCursos)) :
                                                    if (in_array($curso['id'], $arregloCursos)) :
                                                        echo 'selected';
                                                    endif;
                                                endif;
                                                ?> value="<?php echo $curso['id']; ?>">
                                            <?php echo $curso['id']; ?> - <?php echo $curso['nombre_curso']; ?>
                                        </option>

                                    <?php } ?>

                                </select>

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

                        <?php foreach ($colaboradores as $colaborador) : ?>
                            <tr>
                                <td><?php echo $colaborador['id']; ?></td>

                                <td>
                                    <?php echo $colaborador['nombre']; ?> <?php echo $colaborador['apellidos']; ?>
                                    <br />
                                    <?php foreach ($colaborador["cursos"] as $curso) { ?>
                                        - <a href="certificado.php?idcurso=<?php echo $curso['id']; ?>&idcolaborador=<?php echo $colaborador["id"]; ?>">
                                            <i class="bi bi-filetype-pdf text-danger"></i> <?php echo $curso['nombre_curso']; ?> </a><br />


                                    <?php } ?>

                                </td>


                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="id" value="<?php echo $colaborador['id']; ?>" />
                                        <input type="submit" value="Seleccionar" name="accion" class="btn btn-info">
                                    </form>


                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

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


<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

<script>
    new TomSelect('#listCursos');
</script>

<?php include('../templates/pie.php'); ?>