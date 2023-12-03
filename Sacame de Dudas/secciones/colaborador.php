<?php


include_once '../configuraciones/bd.php';
$conexionBD = BD::crearInstancia();

$id = isset($_POST['id']) ? $_POST['id'] : '';
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';

$cursos = isset($_POST['cursos']) ? $_POST['cursos'] : '';
$accion = isset($_POST['accion']) ? $_POST['accion'] : '';



if ($accion != "") {
    switch ($accion) {
        case 'agregar':
            $sql = "INSERT INTO colaborador (id, nombre, apellidos) VALUES (NULL,:nombre,:apellidos)";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':apellidos', $apellidos);
            $consulta->execute();

            $idColaborador = $conexionBD->lastInsertId();

            foreach ($cursos as $curso) {
                $sql = "INSERT INTO colaborador_cursos (id, idcolaborador, idcurso) VALUES (NULL,:idcolaborador,:idcurso)";
                $consulta = $conexionBD->prepare($sql);
                $consulta->bindParam(':idcolaborador', $idColaborador);
                $consulta->bindParam(':idcurso', $curso);
                $consulta->execute();
            }

            break;

        case 'Seleccionar':

            $sql = "SELECT * FROM colaborador WHERE id=:id";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            $colaborador = $consulta->fetch(PDO::FETCH_ASSOC);

            $nombre = $colaborador['nombre'];
            $apellidos = $colaborador['apellidos'];

            $sql = "SELECT cursos.id FROM colaborador_cursos
                INNER JOIN cursos ON cursos.id=colaborador_cursos.idcurso 
                WHERE colaborador_cursos.idcolaborador=:idcolaborador";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':idcolaborador', $id);
            $consulta->execute();
            $cursosColaborador = $consulta->fetchAll(PDO::FETCH_ASSOC);


            foreach ($cursosColaborador as $curso) {
                $arregloCursos[] = $curso['id'];
            }

            break;
        case "borrar":
            $sql = "DELETE FROM colaborador WHERE id=:id";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            break;

        case "editar";
            $sql = "UPDATE colaborador SET nombre=:nombre, apellidos=:apellidos
                    WHERE id=:id";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':apellidos', $apellidos);
            $consulta->bindParam(':id', $id);
            $consulta->execute();

            if (isset($cursos)) {

                $sql = "DELETE FROM colaborador_cursos WHERE idcolaborador=:idcolaborador";
                $consulta = $conexionBD->prepare($sql);
                $consulta->bindParam(':idcolaborador', $id);
                $consulta->execute();

                foreach ($cursos as $curso) {

                    $sql = "INSERT INTO colaborador_cursos (id, idcolaborador, idcurso)
                            VALUES (NULL,:idcolaborador,:idcurso)";
                    $consulta = $conexionBD->prepare($sql);
                    $consulta->bindParam(':idcolaborador', $id);
                    $consulta->bindParam(':idcurso', $curso);
                    $consulta->execute();
                }
                $arregloCursos = $cursos;
            }
    }
}


$sql = "SELECT * FROM colaborador";
$listaColaborador = $conexionBD->query($sql);
$colaboradores = $listaColaborador->fetchAll();

foreach ($colaboradores as $clave => $colaborador) {
    $sql = "SELECT * FROM cursos
    WHERE id IN (SELECT idcurso FROM colaborador_cursos WHERE idcolaborador=:idcolaborador)";

    $consulta = $conexionBD->prepare($sql);
    $consulta->bindParam(':idcolaborador', $colaborador['id']);
    $consulta->execute();
    $cursosColaborador = $consulta->fetchAll();
    $colaboradores[$clave]['cursos'] = $cursosColaborador;
}

$sql = "SELECT * FROM cursos";
$listaCursos = $conexionBD->query($sql);
$cursos = $listaCursos->fetchAll();
