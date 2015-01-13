<?php
require('fpdf/fpdf.php');
require('conexion.php');

class PDF extends FPDF
{

function Header()
{

	$this->SetFont('Arial','',11);
	$this->Text(20,14,'Manzanillo Colima ',0,'C', 0);
	$this->Text(20,19, 'Boulevard Miguel de la Madrid, Playa Azul #1165-A',0,'C', 0);
	$this->Text(20,24,'28869 Manzanillo',0,'C', 0);
	$this->Text (20,29, 'Teléfono 14.17069 y 314.10.94008',0,'C', 0);
	$this->Text(20,34, 'fco.colunga.fco@gmail.com',0,'C', 0);
	$this->Text(20,39,"Fecha: ". date('d/m/Y'));
	


	$this->Ln(5);
}

function Footer()
{
	$this->SetY(-15);
	$this->SetFont('Arial','B',8);
	$this->Cell(100,10,'Manzanillo Colima Historial de usuario activos',0,0,'L');


}

}


	$con = new DB;
	$pacientes = $con->conectar();	
	
	
	

	$pdf=new PDF();
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(15,20,20);
	$pdf->Ln(15);
    $pdf->Cell(110,20,$pdf->Image('image/logo.jpg',130,12,60),0,0,'L');
	$pdf->Ln(20);

 $x = $_POST['tiempo'];
 $hoy = date("Y-m-d"); 
 $nuevafecha = strtotime ( '+1 month' , strtotime ( $hoy ) ) ;
 $nuevafecha = date ( "Y-m-d" , $nuevafecha );



  $nuevafecha1 = strtotime ( '1 month' , strtotime ( $hoy ) ) ;
 $nuevafecha1 = date ( "Y-m-d" , $nuevafecha1 );

	
if( $x == 1 ){

$consulta="SELECT  miembros.credencial,miembros.nombre,miembros.ap,miembros.am,miembros.fecha_termino,membrecia.membrecia
from miembros 
inner join membrecia on miembros.membrecia=membrecia.id_membrecia where DATE(fecha_termino) >= DATE(NOW()) ";
	
$r=mysql_query($consulta);
$i=mysql_num_rows($r);
if ($i>0){
	$pdf->setFillColor(12, 183, 242);

	$pdf->Cell(0,18,'LISTADO DE MIEMBROS ACTIVOS',0,1,'C');


	$pdf->SetFont('Times','B',11);
	$pdf->Cell(30,12,'No.credencial',0,0,'C',true);
	$pdf->Cell(30,12,'Nombre',0,0,'C',true);
	$pdf->Cell(30,12,'A.Paterno',0,0,'C',true);
	$pdf->Cell(30,12,'A.Materno',0,0,'C',true);
	$pdf->Cell(30,12,'Membresia',0,0,'C',true);
	$pdf->Cell(30,12,'Vigencia',0,1,'C',true);
	


	$k=1;
	while($registro=mysql_fetch_row($r)){
	
		$pdf->Cell(30,12,$registro[0],0,0,'C');
		$pdf->Cell(30,12,$registro[1],0,0,'C');
		$pdf->Cell(30,12,$registro[2],0,0,'C');
		$pdf->Cell(30,12,$registro[3],0,0,'C');
		$pdf->Cell(30,12,$registro[5],0,0,'C');
		$pdf->Cell(30,12,$registro[4],0,1,'C');
		

		if ($k==16){
			$pdf->AddPage('P','Letter');
			$pdf->SetFont('Times','B',16);
			$pdf->Cell(0,18,'LISTADO DE MIEMBROS ACTIVOS',0,1,'C');

	$pdf->Ln();
	$pdf->SetFont('Times','B',11);

	$pdf->SetFont('Times','B',11);
	$pdf->Cell(30,12,'No.credencial',0,0,'C',true);
	$pdf->Cell(30,12,'Nombre',0,0,'C',true);
	$pdf->Cell(30,12,'A.Paterno',0,0,'C',true);
	$pdf->Cell(30,12,'A.Materno',0,0,'C',true);
	$pdf->Cell(30,12,'Membresia',0,0,'C',true);
	$pdf->Cell(30,12,'Vigencia',0,1,'C',true);

			$k=0;

		}
		$k=$k+1;

	}

	$pdf->Output();
}
mysql_close();

}elseif ($x == 2){

$consulta="SELECT  miembros.credencial,miembros.nombre,miembros.ap,miembros.am,miembros.fecha_termino,membrecia.membrecia
from miembros 
inner join membrecia on miembros.membrecia=membrecia.id_membrecia where DATE(fecha_termino) < DATE(NOW()) ";
	
$r=mysql_query($consulta);
$i=mysql_num_rows($r);
if ($i>0){

	$pdf->setFillColor(12, 183, 242);
	$pdf->Cell(0,18,'LISTADO DE MIEMBROS INACTIVOS',0,1,'C');
	//Pintar de color la celda
	

	$pdf->SetFont('Times','B',11);
	$pdf->Cell(30,12,'No.credencial',0,0,'C',true);
	$pdf->Cell(30,12,'Nombre',0,0,'C',true);
	$pdf->Cell(30,12,'A.Paterno',0,0,'C',true);
	$pdf->Cell(30,12,'A.Materno',0,0,'C',true);
	$pdf->Cell(30,12,'Membresia',0,0,'C',true);
	$pdf->Cell(30,12,'Vigencia',0,1,'C',true);
	


	$k=1;
	while($registro=mysql_fetch_row($r)){
	
		$pdf->Cell(30,12,$registro[0],0,0,'C');
		$pdf->Cell(30,12,$registro[1],0,0,'C');
		$pdf->Cell(30,12,$registro[2],0,0,'C');
		$pdf->Cell(30,12,$registro[3],0,0,'C');
		$pdf->Cell(30,12,$registro[5],0,0,'C');
		$pdf->Cell(30,12,$registro[4],0,1,'C');
		

		if ($k==16){
			$pdf->AddPage('P','Letter');
			$pdf->SetFont('Times','B',16);
			$pdf->Cell(0,18,'LISTADO DE MIEMBROS INACTIVOS',0,1,'C');

	$pdf->Ln();
	
	$pdf->SetFont('Times','B',11);
	$pdf->Cell(30,12,'No.credencial',0,0,'C',true);
	$pdf->Cell(30,12,'Nombre',0,0,'C',true);
	$pdf->Cell(30,12,'A.Paterno',0,0,'C',true);
	$pdf->Cell(30,12,'A.Materno',0,0,'C',true);
	$pdf->Cell(30,12,'Membresia',0,0,'C',true);
	$pdf->Cell(30,12,'Vigencia',0,1,'C',true);
	

			$k=0;

		}
		$k=$k+1;

	}

	$pdf->Output();
}
mysql_close();


}elseif($x == 3){

$consulta="SELECT  miembros.credencial,miembros.nombre,miembros.ap,miembros.am,miembros.fecha_termino,membrecia.membrecia
from miembros 
inner join membrecia on miembros.membrecia=membrecia.id_membrecia where YEAR(miembros.fecha_termino) = YEAR('$hoy')  and month(fecha_termino) = month('$nuevafecha') || YEAR(miembros.fecha_termino) = YEAR('$hoy') and   month(fecha_termino) = month('$hoy')  and day(fecha_termino) >= day('$hoy') ";
	
$r=mysql_query($consulta);
$i=mysql_num_rows($r);
if ($i>0){

	$pdf->setFillColor(12, 183, 242);
	$pdf->Cell(0,18,'LISTADO DE MIEMBROS PROPENSOS',0,1,'C');
	//Pintar de color la celda
	

	$pdf->SetFont('Times','B',11);
	$pdf->Cell(30,12,'No.credencial',0,0,'C',true);
	$pdf->Cell(30,12,'Nombre',0,0,'C',true);
	$pdf->Cell(30,12,'A.Paterno',0,0,'C',true);
	$pdf->Cell(30,12,'A.Materno',0,0,'C',true);
	$pdf->Cell(30,12,'Membresia',0,0,'C',true);
	$pdf->Cell(30,12,'Vigencia',0,1,'C',true);
	


	$k=1;
	while($registro=mysql_fetch_row($r)){
	
		$pdf->Cell(30,12,$registro[0],0,0,'C');
		$pdf->Cell(30,12,$registro[1],0,0,'C');
		$pdf->Cell(30,12,$registro[2],0,0,'C');
		$pdf->Cell(30,12,$registro[3],0,0,'C');
		$pdf->Cell(30,12,$registro[5],0,0,'C');
		$pdf->Cell(30,12,$registro[4],0,1,'C');
		

		if ($k==16){
			$pdf->AddPage('P','Letter');
			$pdf->SetFont('Times','B',16);
			$pdf->Cell(0,18,'LISTADO DE MIEMBROS PROPENSOS',0,1,'C');

	$pdf->Ln();
	
	$pdf->SetFont('Times','B',11);
	$pdf->Cell(30,12,'No.credencial',0,0,'C',true);
	$pdf->Cell(30,12,'Nombre',0,0,'C',true);
	$pdf->Cell(30,12,'A.Paterno',0,0,'C',true);
	$pdf->Cell(30,12,'A.Materno',0,0,'C',true);
	$pdf->Cell(30,12,'Membresia',0,0,'C',true);
	$pdf->Cell(30,12,'Vigencia',0,1,'C',true);
	

			$k=0;

		}
		$k=$k+1;

	}

	$pdf->Output();
}
mysql_close();











}else{

	echo "Selecciona un Tiempo";
}
?>