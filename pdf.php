<?php
$pdf = new FPDF();
// add a page
$pdf->AddPage();

$txt = 'You can set the transparency of PDF objects using the setAlpha() method.';
$pdf->Write(0, $txt, '', 0, '', true, 0, false, false, 0);

/*
 * setAlpha() gives transparency support. You can set the
 * alpha channel from 0 (fully transparent) to 1 (fully
 * opaque). It applies to all elements (text, drawings,
 * images).
 */

$pdf->SetLineWidth(2);

// draw opaque red square
$pdf->SetFillColor(255, 0, 0);
$pdf->SetDrawColor(127, 0, 0);
$pdf->Rect(30, 40, 60, 60, 'DF');

// set alpha to semi-transparency
$pdf->SetAlpha(0.5);

// draw green square
$pdf->SetFillColor(0, 255, 0);
$pdf->SetDrawColor(0, 127, 0);
$pdf->Rect(50, 60, 60, 60, 'DF');

// draw blue square
$pdf->SetFillColor(0, 0, 255);
$pdf->SetDrawColor(0, 0, 127);
$pdf->Rect(70, 80, 60, 60, 'DF');

// draw jpeg image
$pdf->Image('images/image_demo.jpg', 90, 100, 60, 60, '', 'http://www.tcpdf.org', '', true, 72);

// restore full opacity
$pdf->SetAlpha(1);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_025.pdf', 'I');
?>