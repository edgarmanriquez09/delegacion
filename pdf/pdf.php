<?php

require('fpdf/fpdf.php');
require('conexion.php');
class PDF extends FPDF
{



function Header()
{

	$this->SetFont('Arial','',10);
	$this->Text(20,14,'Formato de Membrecias',0,'C', 0);
	$this->Ln(30);
}



function Footer()
{
	$this->SetY(-15);
	$this->SetFont('Arial','B',8);
	$this->Cell(100,10,'Para mayores informes favor de contactarnos al correo electronico:  delega1@ucol.mx ',0,0,'L');

}

}

	$id_corres= $_GET['correspondencia'];

	$con = new DB;
	$pacientes = $con->conectar();	

	/*SELECT * FROM tabla1 INNER JOIN tabla2 WHERE tabla1.columna1 = tabla2.columna1*/
	
	$strConsulta = "SELECT * from corres 
	inner join usuarios on usuarios.no_trabajador = corres.no_trabajador
	left join status on status.id_status = corres.status
	left join planteles on planteles.id_plantel = corres.id_plantel

	left join entregas on entregas.id_correspondencia = corres.id_corres
where id_corres =  '$id_corres'";

	$strConsulta2= "SELECT * from corres 
	inner join planteles on planteles.id_plantel = corres.id_plantel_origen

	where id_corres =  '$id_corres'";
	

	$id_miembros2 = mysql_query($strConsulta2);
	$fila2 = mysql_fetch_array($id_miembros2);

	
	$id_miembros = mysql_query($strConsulta);
	$fila = mysql_fetch_array($id_miembros);

	$pdf=new PDF();/*Definir Tamaño de la Hoja*/
	$pdf->Open();
	$pdf->AddPage();


	//Texto Explicativo

	

	$pdf->Ln(10);

    $pdf->SetFont('Arial','',12);


    $pdf->Cell(100,20,$pdf->Image('image/encabezado.jpg',10,5,240),0,0,'C');

/*
	$pdf->Cell(10,12,"Fecha: ". date('d/m/Y'));
	$pdf->Ln(10);
*/

/*ID*/
$pdf->SetFont('Arial','',13);
$pdf->SetXY(20,50);
$pdf->Cell(10, 8, utf8_decode('No.correspondencia:  '.$fila['id_corres']), 0, 'L');
/*Fin ID*/


/*ID*/
$pdf->SetFont('Arial','',13);
$pdf->SetXY(120,50);
$pdf->Cell(10, 8, utf8_decode('STATUS DE ENTREGA:  '.$fila['status']), 0, 'L');
/*Fin ID*/




/*Credencial*/
$pdf->SetFont('Arial','',13);
$pdf->SetXY(20,60);
$pdf->Cell(10, 8, utf8_decode('Emitido:  '.$fila['nombre_empleado']), 0, 'L');
/*Fin Credencial*/
   
/*Nombre*/
$pdf->SetFont('Arial','',13);
$pdf->SetXY(20,70);
$pdf->Cell(10, 8, utf8_decode('Fecha/Hora emitida:  '.$fila['fecha']), 0, 'L');
/*Fin Nombre*/




/*Dirijido*/
$pdf->SetFont('Arial','',13);
$pdf->SetXY(20,90);
$pdf->Cell(10, 8, utf8_decode('Para:' .$fila['nombre']  ), 0, 'L');
/*Fin Dirijido*/



$pdf->SetFont('Arial','',13);
$pdf->SetXY(20,100);
$pdf->Cell(10, 8, utf8_decode('Plantel de Origen:  ' .$fila2['plantel']  ), 0, 'L');

$pdf->SetFont('Arial','',13);
$pdf->SetXY(20,110);
$pdf->Cell(10, 8, utf8_decode('Plantel de Destino:  ' .$fila['plantel']  ), 0, 'L');


/*EDAD*/
$pdf->SetFont('Arial','',13);
$pdf->SetXY(20,120);
$pdf->Cell(10, 8, utf8_decode('Asunto:'), 0, 'L');
/*Fin EDAD*/


$pdf->SetFont('Arial','',13);
$pdf->SetXY(20,130);
$pdf->Cell(10, 8, utf8_decode($fila['asunto']), 0, 'L');




$pdf->SetFont('Arial','',13);
$pdf->SetXY(20,150);
$pdf->Cell(10, 8, utf8_decode('Entregado a:'. $fila['nom_completo']), 0, 'L');

$pdf->SetFont('Arial','',13);
$pdf->SetXY(20,160);
$pdf->Cell(10, 8, utf8_decode('No empleado:'. $fila['no_trabajador']), 0, 'L');

$pdf->SetFont('Arial','',13);
$pdf->SetXY(20,170);
$pdf->Cell(10, 8, utf8_decode('Fecha/Hora de entrega:'. $fila['fecha_recogio']), 0, 'L');












$pdf->Output();
?>