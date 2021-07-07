<?php

include_once('fpdf/fpdf.php');

class myPDF extends FPDF{
    function myCell($w,$h,$x,$t){
        $height = $h/3;
        $first = $height+2;
        $second = $height+$height+$height+3;
        $len = strlen($t);
        if($len>15){
            $txt = str_split($t,15);
            $this->SetX($x);
            $this->myCell($w,$first,$txt[0],'','','');

            $this->SetX($x);
            $this->myCell($w,$second,$txt[1],'','','');
            $this->SetX($x);
            $this->myCell($w,$h,'','LTRB',0,'L',0);

        }else{
            $this->Setx($x);
            $this->myCell($w,$h,$t,'LTRB',0,'L',0);
        }
    }
}



$conn = mysqli_connect('localhost','root','');
$db = mysqli_select_db($conn,'hrdc1');
$sql = "select * from batchwise_nomination";
$data = mysqli_query($conn,$sql);

if(isset($_POST['btn_pdf']))
{
    $pdf = new FPDF('p','mm','a4');
    $pdf->SetFont('arial','b','14');
    $pdf->AddPage();

    $w = 45;
    $h = 16;

    $x = $pdf->GetX();
    $pdf->myCell($w,$h,$x,'Name of participant');
    $x = $pdf->GetX();
    $pdf->myCell($w,$h,$x,'Department');
    $x = $pdf->GetX();
    $pdf->myCell($w,$h,$x,'Event Name');
    $x = $pdf->GetX();
    $pdf->myCell($w,$h,$x,'Subevent Name');
    $x = $pdf->GetX();
    $pdf->myCell($w,$h,$x,'Employee ID');
    $x = $pdf->GetX();
    $pdf->myCell($w,$h,$x,'Mobile Number');
    $x = $pdf->GetX();
    $pdf->myCell($w,$h,$x,'Email Id');
    $x = $pdf->GetX();
    $pdf->myCell($w,$h,$x,'Batch');
    $x = $pdf->GetX();
    $pdf->myCell($w,$h,$x,'slot');
    $x = $pdf->GetX();
    $pdf->myCell($w,$h,$x,'Authority');
    $pdf->Ln();
    
    $pdf->SetFont('arial','','12');
    while($row = mysqli_fetch_assoc($data))
    {
    $pdf->myCell($w,$h,$x,$row['Name of Participant']);
    $pdf->myCell($w,$h,$x,$row['Functional Department']);
    $pdf->myCell($w,$h,$x,$row['Event Name']);
    $pdf->myCell($w,$h,$x,$row['Subevent Name']);
    $pdf->myCell($w,$h,$x,$row['Employee ID']);
    $pdf->myCell($w,$h,$x,$row['Mobile Number']);
    $pdf->myCell($w,$h,$x,$row['Email Id']);
    $pdf->myCell($w,$h,$x,$row['Select Batch']);
    $pdf->myCell($w,$h,$x,$row['Select slot']);
    $pdf->myCell($w,$h,$x,$row['Report Authority']);
    $pdf->Ln();
    }

    $pdf->Output();
}

?>