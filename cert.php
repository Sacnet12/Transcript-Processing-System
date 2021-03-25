<?php

	require("fpdf.php");
	$pdf=new FPDF();
	$pdf->AddPage();
	$pdf->Image("certificate.jpeg", 0, 0, 250, 300);
	$pdf->Output("test.pdf","f")
?>