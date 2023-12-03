<?php
require('../librerias/fpdf/fpdf.php');
include_once("../configuraciones/bd.php");
$conexionBD = BD::crearInstancia();
function agregarTexto($pdf, $texto, $x, $y, $align = 'L', $fuente, $size = 10, $r = 0, $g = 0, $b = 0)
{
    $pdf->SetFont($fuente, "", $size);
    $pdf->SetXY($x, $y);
    $pdf->SetTextColor($r, $g, $b);
    $pdf->Cell(0, 10, $texto, 0, 0, $align);
}
function agregarImagen($pdf, $imagen, $x, $y)
{
    $pdf->Image($imagen, $x, $y, 0);
}

$idcurso = isset($_GET['idcurso']) ? $_GET['idcurso'] : '';
$idcolaborador = isset($_GET['idcolaborador']) ? $_GET['idcolaborador'] : '';

$sql = "SELECT colaborador.nombre, colaborador.apellidos,cursos.nombre_curso 
FROM colaborador, cursos WHERE colaborador.id=:idcolaborador AND cursos.id=:idcurso";
$consulta = $conexionBD->prepare($sql);
$consulta->bindParam(':idcolaborador', $idcolaborador);
$consulta->bindParam(':idcurso', $idcurso);
$consulta->execute();
$colaborador = $consulta->fetch(PDO::FETCH_ASSOC);


$pdf = new FPDF("L", "mm", array(254, 194));
$pdf->AddPage();
$pdf->SetFont("Arial", "B", 16);
agregarImagen($pdf, "../src/certificado_.jpg", 0, 0);
agregarTexto($pdf, ucwords(($colaborador['nombre'] . " " . $colaborador['apellidos'])), 60, 70, 'L', "Helvetica", 30, 0, 84, 135);
agregarTexto($pdf, $colaborador['nombre_curso'], -250, 105, 'C', "Helvetica", 25, 0, 84, 135);
agregarTexto($pdf, date("d/m/Y"), -325, 160, 'C', "Helvetica", 15, 0, 84, 135);
$pdf->Output();
