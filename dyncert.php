<?php
//============================================================+
// File name   : example_051.php
// Begin       : 2009-04-16
// Last Update : 2013-05-14
//
// Description : Example 051 for TCPDF class
//               Full page background
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Full page background
 * @author Nicola Asuni
 * @since 2009-04-16
 */

// Include the main TCPDF library (search for installation path).
require_once('TCPDF-main/tcpdf.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
    //Page header
    public function Header() {
        // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set bacground image
        $img_file = K_PATH_IMAGES.'certificate.jpeg';
        $this->Image($img_file, 0, 0, 210, 297, '', 'jpeg', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
        $this->Ln(7);
        $this->SetFont('helvetica', 'B', 18);

        $this->Cell(189, 5, 'OBAFEMI AWOLOWO UNIVERSITY', 0, 3, 'C');
        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(189, 5, 'ILE-IFE, NIGERIA', 0, 1, 'C');

         $this->SetFont('helvetica', 'B', 12);
        $this->Cell(189, 5, 'OFFICE OF THE REGISTRAR', 0, 1, 'C');
        $this->SetFont('helvetica', 'B', 12);
        $this->Cell(189, 5, 'Student Records and Academic Transcript', 0, 1, 'C');

        $this->Ln(5);
        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(189, 5, 'ACADEMIC RECORDS OF: OYEBADE ADEDOYIN', 0, 1, 'L');



    }
    public function Footer(){
        $this->SetY(-40);
        $this->Ln(5);
        $this->SetFont('times', 'B', 12);
        $this->Cell(20, 1, '_____________________', 0, 1);
        $this->Cell(20,5, 'Name');
        $this->Ln(5);
        $this->Cell(20, 5, 'Principal Assistant Registrar', 0, 0);
    }
}

// create new PDF document
$pdf = new MYPDF('p', 'mm', PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Oyebade Adedoyin');
$pdf->SetTitle('Transcript');
$pdf->SetSubject('Transcript');
$pdf->SetKeywords('Transcript, PDF, example, test, guide');



// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 48);

// add a page
$pdf->AddPage();

// Print a text


// add a page
$pdf->AddPage();

// Print a text

// --- example with background set on page ---

// remove default header
// -- set new background ---

// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image

// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();


// Print a text

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_051.pdf', 'I');

//============================================================+
// END OF FILE
