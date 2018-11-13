<?php 
	session_start();
	require_once('./conexion.php');
	require('../fpdf/fpdf.php');
	class PDF extends FPDF
{

function Header()
{
    
    $this->Image('../images/logo.png',10,8,33);
    $this->SetFont('Arial','B',15);
    $this->Cell(80);
    $this->Cell(60,10,'Agroservicio El Ranchito S.A de C.V',20,0,'C');
    $this->Ln(8);
    $this->SetFont('Arial','B',10);
    $this->Cell(220,10,utf8_decode('"Ofreciendote siempre lo mejor Para ti y para tus cultivos"'),20,0,'C');
    $this->Ln(20);
    $this->SetFont('Arial','B',11);
    $this->Cell(20,10,utf8_decode('Dirección:'),20,0);
    $this->Ln(4);
    $this->SetFont('Arial','I',9);
    $this->Cell(0,10,utf8_decode('Calle principal, 10° avenida sur, Barrio el centro, Aguilares, San Salvador'),0,0);
    $this->Ln(5);
    $this->SetFont('Arial','I',9);
    $this->Cell(0,10,'Telefono: 2456-2789',0,0);

     
}

function Footer()
{
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF('P','mm',array(300,225));
$pdf->AliasNbPages();
$pdf->AddPage();
if(count($_SESSION['productos'])>0){
$pdf->Ln(15);
$pdf->SetFont('Times','B',12);
$pdf->Cell(145,6,'Cliente:'.' '.utf8_decode($_SESSION['usuario']),1,0);
$pdf->Cell(60,6,'Fecha:'."  ".date('d-m-y'),1,0);
$pdf->Ln(6);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(205,6,utf8_decode('Detalle de Cotización Realizada'),1,0,'C');
$pdf->Ln(6);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(52,6,'Producto:',1,0,'C');
$pdf->Cell(88,6,utf8_decode('Descripción:'),1,0,'C');
$pdf->Cell(20,6,'Cantidad:',1,0,'C');
$pdf->Cell(20,6,'Precio:',1,0,'C');
$pdf->Cell(25,6,'Sub-Total:',1,0,'C');
$total=0;
for ($i=0; $i < count($_SESSION['productos']) ; $i++) { 
	$pdf->Ln(6);
	$pdf->SetFont('Times','',12);
	$pdf->Cell(52,6,utf8_decode($_SESSION['productos'][$i][6]),1,0);
	$pdf->Cell(88,6,utf8_decode($_SESSION['productos'][$i][5]),1,0);
	$pdf->Cell(20,6,$_SESSION['productos'][$i][1],1,0,'C');
	$pdf->Cell(20,6,'$'.$_SESSION['productos'][$i][3],1,0,'C');
	$pdf->Cell(25,6,'$'.$_SESSION['productos'][$i][4],1,0,'C');

	$total += number_format($_SESSION['productos'][$i][4],2,'.',' ');
   	}
	$pdf->Ln(6);
	$pdf->SetFont('Times','B',12);
  	$pdf->Cell(180,6,utf8_decode('Total de Cotización: '),1,0);
  	$pdf->Cell(25,6,'$'.$total,1,0,'C');	
  	
  	}else{ 

  		utf8_decode('Ocurrio un error al procesar cotización, Reintente Nuevamente');
	}   

$pdf->Output(utf8_decode('Reporte_Cotización.pdf'),'D');

?>