<?php
//============================================================+
// File name   : CDC_WashRunForm2.php
// Begin       : 2019-11-28
// Last Update : 2019-11-28
//
// Description : Example 014 for TCPDF class
//               Javascript Form and user rights (only works on Adobe Acrobat)
//
// Author: Michael Cotherman
//
// (c) Copyright:
//               Michael Cotherman
//               Cotherman Distilling Co., LLC
//               www.cothermandistilling.com
//               michael@cothermandistilling.com
//============================================================+

/**
 * Creates a PDF using TCPDF
 */


// Include the main TCPDF library (search for installation path).
require_once('/usr/share/php/tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Michael Cotherman');
$pdf->SetTitle('CDC Wash Run Form');
$pdf->SetSubject('CDC Forms');
$pdf->SetKeywords('Wash');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// IMPORTANT: disable font subsetting to allow users editing the document
$pdf->setFontSubsetting(false);

// set font
$pdf->SetFont('helvetica', '', 10, '', false);

// add a page
$pdf->AddPage();

/*
It is possible to create text fields, combo boxes, check boxes and buttons.
Fields are created at the current position and are given a name.
This name allows to manipulate them via JavaScript in order to perform some validation for instance.
*/

// set default form properties
$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'solid', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));

$pdf->SetFont('helvetica', 'BI', 18);
$pdf->Cell(0, 5, 'CDC Wash Run Form', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('helvetica', '', 12);

// DateTimeCode
$pdf->Cell(35, 5, 'DateTimeCode:');
$pdf->TextField('DateTimeCode', 50, 5);
$pdf->Ln(6);

// BatchNum
$pdf->Cell(35, 5, 'BatchNum:');
$pdf->TextField('BatchNum', 50, 5);
$pdf->Ln(6);

// WashName
$pdf->Cell(35, 5, 'WashName:');
$pdf->ComboBox('WashName', 30, 5, array(array('', '-'), array('M', 'Male'), array('F', 'Female')));
$pdf->Ln(6);

// DestinationProduct
$pdf->Cell(35, 5, 'DestinationProduct:');
//$pdf->RadioButton('DestinationProduct', 5, array('readonly' => 'true'), array(), 'Rum');
$pdf->RadioButton('DestinationProduct', 5, array(), array(), 'Rum');
$pdf->Cell(35, 5, 'Rum');
$pdf->Ln(6);
$pdf->Cell(35, 5, '');
$pdf->RadioButton('DestinationProduct', 5, array(), array(), 'Gin', true);
$pdf->Cell(35, 5, 'Gin');
$pdf->Ln(6);
$pdf->Cell(35, 5, '');
$pdf->RadioButton('DestinationProduct', 5, array(), array(), 'Whisky -160');
$pdf->Cell(35, 5, 'Whisky -160');
$pdf->Ln(6);
$pdf->Cell(35, 5, '');
$pdf->RadioButton('DestinationProduct', 5, array(), array(), 'Vodka');
$pdf->Cell(35, 5, 'Vodka');
$pdf->Ln(10);

// CheckBox1
$pdf->Cell(35, 5, 'CheckBox1:');
$pdf->CheckBox('CheckBox1', 5, true, array(), array(), 'OK');

$pdf->Ln(10);
// Address
$pdf->Cell(35, 5, 'Address:');
$pdf->TextField('address', 60, 18, array('multiline'=>true, 'lineWidth'=>0, 'borderStyle'=>'none'), array('v'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'dv'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'));
$pdf->Ln(19);

// Listbox
$pdf->Cell(35, 5, 'List:');
$pdf->ListBox('listbox', 60, 15, array('', 'item1', 'item2', 'item3', 'item4', 'item5', 'item6', 'item7'), array('multipleSelection'=>'true'));
$pdf->Ln(20);

// E-mail
$pdf->Cell(35, 5, 'E-mail:');
$pdf->TextField('email', 50, 5);
$pdf->Ln(6);

// Date of the day
$pdf->Cell(35, 5, 'Date:');
$pdf->TextField('date', 30, 5, array(), array('v'=>date('Y-m-d'), 'dv'=>date('Y-m-d')));
$pdf->Ln(10);

$pdf->SetX(50);

// Button to validate and print
$pdf->Button('print', 30, 10, 'Print', 'Print()', array('lineWidth'=>2, 'borderStyle'=>'beveled', 'fillColor'=>array(128, 196, 255), 'strokeColor'=>array(64, 64, 64)));

// Reset Button
$pdf->Button('reset', 30, 10, 'Reset', array('S'=>'ResetForm'), array('lineWidth'=>2, 'borderStyle'=>'beveled', 'fillColor'=>array(128, 196, 255), 'strokeColor'=>array(64, 64, 64)));

// Submit Button
$pdf->Button('submit', 30, 10, 'Submit', array('S'=>'SubmitForm', 'F'=>'http://localhost/printvars.php', 'Flags'=>array('ExportFormat')), array('lineWidth'=>2, 'borderStyle'=>'beveled', 'fillColor'=>array(128, 196, 255), 'strokeColor'=>array(64, 64, 64)));

// Form validation functions
$js = <<<EOD
function CheckField(name,message) {
    var f = getField(name);
    if(f.value == '') {
        app.alert(message);
        f.setFocus();
        return false;
    }
    return true;
}
function Print() {
    if(!CheckField('DateTimeCode','DateTimeCode is mandatory')) {return;}
    if(!CheckField('BatchNum','Batch Number name is mandatory')) {return;}
    if(!CheckField('WashName','Wash Name is mandatory')) {return;}
    if(!CheckField('address','Address is mandatory')) {return;}
    print();
}
EOD;

// Add Javascript code
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_014.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
