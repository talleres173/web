<?php 
include 'conexion.php';
require('fpdf/fpdf.php');

class PDF extends FPDF
{
	//creando una cabecera//
	function Header()
	{
		$this->Image("fotosperfil/gisel.jpg",10,10,30);
		//establecer fuente de letra
		$this->SetFont('Arial','B',12);
		$this->Text(45,20,utf8_decode('colegio nacional de educacion profesional tecnica'));
		$this->Text(70,24,'Formato de cita');
	}//funcion
}//de la clase

//crear el objeto para llamar el metodo

$pdf= new PDF();
$pdf->AddPage();//agregar pagina
$pdf->SetFont('Arial','B','10');
$pdf->Text(90,27,"prueba del archivo");
$pdf->Rect(10,50,180,30,'D');
$pdf->Rect(10,82,180,30,'D');
$pdf->Line(15,122,15,150);
ob_end_clean();
//mandar al navegador el archivo
$pdf->Output("formato1.pdf",'I');//D=descargar, I=Enlinea
//cerrar el php
?>