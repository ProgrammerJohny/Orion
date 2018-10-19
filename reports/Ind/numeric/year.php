<?php
//PDF USING MULTIPLE PAGES
//CREATED BY: Carlos Vasquez S.
//E-MAIL: cvasquez@cvs.cl
//CVS TECNOLOGIA E INNOVACION
//SANTIAGO, CHILE

require('../../fpdf/fpdf.php');

//Connect to your database
$conn = new PDO('mysql:host=localhost;dbname=aplikacja', 'admin', 'Webmaster2017');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->query("set names utf8");
//$stmt = $conn -> query('SELECT * FROM customersInd');
//Create new pdf file
$pdf=new FPDF();

//Disable automatic page break
$pdf->SetAutoPageBreak(false);

//Add first page
$pdf->AddPage();

//set initial y axis position per page
$y_axis_initial = 25;

//print column titles
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->SetY($y_axis_initial);
$pdf->SetX(25);
$pdf->Cell(30,6,'ID',1,0,'L',1);
$pdf->Cell(100,6,'Imię',1,0,'L',1);
$pdf->Cell(30,6,'Nazwisko',1,0,'R',1);

$y_axis = $y_axis + $row_height;

//Select the Products you want to show in your PDF file
$result=mysql_query('SELECT ID_cus_ind, name_cus_ind,surname_cus_ind FROM customersInd',$link);

//initialize counter
$i = 0;

//Set maximum rows per page
$max = 25;

//Set Row Height
$row_height = 6;

while($row = mysql_fetch_array($result))
{
    //If the current row is the last one, create new page and print column title
    if ($i == $max)
    {
        $pdf->AddPage();

        //print column titles for the current page
        $pdf->SetY($y_axis_initial);
        $pdf->SetX(25);
        $pdf->Cell(30,6,'CODE',1,0,'L',1);
        $pdf->Cell(100,6,'NAME',1,0,'L',1);
        $pdf->Cell(30,6,'PRICE',1,0,'R',1);

        //Go to next row
        $y_axis = $y_axis + $row_height;

        //Set $i variable to 0 (first row)
        $i = 0;
    }

    $code = $row['Code'];
    $price = $row['Price'];
    $name = $row['Code'];

    $pdf->SetY($y_axis);
    $pdf->SetX(25);
    $pdf->Cell(30,6,$code,1,0,'L',1);
    $pdf->Cell(100,6,$name,1,0,'L',1);
    $pdf->Cell(30,6,$price,1,0,'R',1);

    //Go to next row
    $y_axis = $y_axis + $row_height;
    $i = $i + 1;
}

mysql_close($link);

//Send file
$pdf->Output();
?>
