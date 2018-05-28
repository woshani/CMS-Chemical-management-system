<?php
include $_SERVER['DOCUMENT_ROOT'] . '/connection/connection.php';

$selectSql = "SELECT 
                c.chemicalid, 
                c.name as chemicalname, 
                c.physicaltype, 
                c.engcontrol, 
                c.ppe, 
                c.class,
                c.ghs, 
                ci.ciid, 
                ci.type, 
                ci.datein, 
                ci.expireddate, 
                ci.status, 
                ci.quantity, 
                u.fname, 
                u.lname, 
				u.identifyid,
                (SELECT 
                    us.identifyid 
                FROM user us, chemicalin cis 
                WHERE cis.register_by = us.userid AND cis.ciid = ci.ciid) as registerName, 
                l.name 
            FROM chemicalin ci, chemical c, lab l, user u 
            WHERE ci.labid = l.labid 
                AND ci.userid = u.userid 
                AND c.chemicalid = ci.chemicalid 
            ORDER BY l.name, ci.expireddate, ci.status";
				$selectResult = mysqli_query($conn,$selectSql);
// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf.php');
date_default_timezone_set("Asia/Kuala_Lumpur");
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('ZeroWaste Developer');
$pdf->SetTitle('ZeroWaste HOD Report');
$pdf->SetSubject('ZeroWaste');
$pdf->SetKeywords('ZeroWaste, PDF, ZeroWaste, ZeroWaste, ZeroWaste');

// set default header data
$pdf->SetHeaderData('zerowaste.jpg', PDF_HEADER_LOGO_WIDTH, 'Zerowaste', 'Fakulti Kejuruteraan Pembuatan, Universiti Teknikal Malaysia Melaka');


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

// set font
$pdf->SetFont('helvetica', '', 9);

// add a page
$pdf->AddPage();

// create some HTML content
$html = '
<h1>Report Waste of Chemical In Lab</h1>';

$i = 0;
	$html2= '</br></br>';
$htmlcontent = '<html>
				  <body>
					<table width="100%" border="1" cellpadding ="5px" >
';
		

$htmlcontent .=  '<tr>
        		    <th><b>Chemical Name</b></th>
		  	    	<th><b>Physical Type</b></th>
					<th><b>Type</b></th>
		  	    	<th><b>Date In</b></th>
					<th><b>Expired Date</b></th>
		  	    	<th><b>Status Of Chemical</b></th>
					<th><b>Latest Quantity</b></th>
		  	    	<th><b>Owner Of Chemical</b></th>
					<th><b>Register By</b></th>
					<th><b>Lab Name</b></th>
      			  </tr>';
	
while($row = mysqli_fetch_array($selectResult))
					{
$htmlcontent .=  '<tr>
					<td>'.$row['chemicalname'].'</td>
					<td>'.$row['physicaltype'].'</td>
					<td>'.$row['type'].'</td>
					<td>'.$row['datein'].'</td>
					<td>'.$row['expireddate'].'</td>
					<td>'.$row['status'].'</td>
					<td>'.$row['quantity'].'</td>
					<td>'.$row['identifyid'].' '.$row['fname'].' '.$row['lname'].'</td>
					<td>'.$row['registerName'].'</td>
					<td>'.$row['name'].'</td>
				  </tr>';
}

$htmlcontent .= "</table></body></html>";

// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);
$pdf->writeHTML($html2, true, 0, true, 0);
$pdf->writeHTML($htmlcontent, true, 0, true, 0);

//$pdf->writeHTML($inlinecss, true, 0, true, 0);





// output the HTML content
//$pdf->writeHTML($html, true, 0, true, 0);
//$pdf->writeHTML($html2, true, 0, true, 0);

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('zerowaste.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+