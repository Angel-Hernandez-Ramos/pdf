<?php
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

class Generador{
    public function GenerarPdf($data){
        // var_dump($data);
        $pdf = new FPDF('P','mm', 'A4');
        
        $pdf->AddPage('P',array(215,279));
        $pdf->Image("https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl={$data["infoQR"]}", 0, 25, 30, 0, 'PNG');
        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Helvetica','B',11);
        $pdf->Image('../images/logobioscan.png', 10, 5, 35, 20);
        $pdf->SetFillColor(255);
       
        $alignx = 30;
        $ancho = 100;
        $fill = 1;
        $pdf->setXY($alignx,27);
        $pdf->MultiCell($ancho, 5,"PACIENTE: {$data["nombrep"]}",$fill,'L',0);
        $pdf->SetFont('Helvetica','B',8);
        $pdf->setX($alignx);
        $pdf->MultiCell($ancho, 4,"DOCTOR: {$data["Doctor"]}",$fill,'L',0);
        $pdf->setX($alignx);
        $pdf->MultiCell($ancho, 4,"Direccion: ",$fill,'L',0);
        $pdf->setX($alignx);
        $pdf->MultiCell($ancho, 3,"Tel: {$data["TelefonoP"]} \t\t\t Sexo: {$data["sexoP"]} \t\t\t Edad: {$data["edadP"]}",$fill,'J',0);
        $pdf->setX($alignx);
        $pdf->MultiCell($ancho, 4,"Email Paciente: {$data["EmailP"]}",$fill,'L',0);
        $pdf->setX($alignx);
        $pdf->MultiCell($ancho, 4,"Email Doctor: {$data["EmailD"]}",$fill,'L',0);
        $pdf->setX($alignx);
        $pdf->MultiCell($ancho, 4,"Origen: {$data["OrigenD"]} \t\t\t\t COD INT: {$data["CodInt"]} ",$fill,'J',0);

        $alignx =130;
        $ancho=40;
        $pdf->setXY($alignx,27);
        $pdf->SetFont('Helvetica','B',5);
        $pdf->MultiCell($ancho, 2,"BIOSCAN PUEBLA",$fill,'C',0);
        $pdf->setX($alignx);
        $pdf->SetFont('Helvetica','',5);
        $pdf->MultiCell($ancho, 2,"VIA ATLIXCAYOTL NO 3248-111A",$fill,'C',0);
        $pdf->setX($alignx);
        $pdf->MultiCell($ancho, 2,"SAN MARTINITO SAN ANDRES CHOLULA",$fill,'C',0);
        $pdf->setX($alignx);
        $pdf->MultiCell($ancho, 2,"TEL: 01 (222) 2104011",$fill,'C',0);
        $pdf->setX($alignx);
        $pdf->MultiCell($ancho, 2,"bioscan.puebla@bioscan.com.mx",$fill,'C',0);
        $pdf->setX($alignx);
        $pdf->MultiCell($ancho, 2,"RFC: ILM090130E98",$fill,'C',0);
        
        $pdf->Ln(6);
        $alignx=135;

        $pdf->SetFont('Helvetica','B',10);
        $pdf->setX($alignx);
        $pdf->MultiCell($ancho, 4,"RECIBO:",$fill,'L',0);
        $pdf->setX($alignx);
        $pdf->SetFont('Helvetica','',5);
        $pdf->MultiCell($ancho, 2,"CAPTURA:",$fill,'L',0);
        $pdf->setX($alignx);
        $pdf->MultiCell($ancho, 2,"REALIZO:",$fill,'L',0);
        $pdf->setX($alignx);
        $pdf->MultiCell($ancho, 2,"METODO DE PAGO:",$fill,'L',0);

        $alignx=175;
        $ancho=35;
        $fecha = date("Y-m-d    ");
        $pdf->setXY($alignx,27);
        $pdf->SetFont('Helvetica','B',8);
        $pdf->setX($alignx);
        $pdf->MultiCell($ancho, 4,"{$fecha}",$fill,'C',0);
        

        $pdf->Ln(14);
        $pdf->setX($alignx);
        $pdf->MultiCell($ancho, 4,"HORARIOS:",$fill,'C',0);
        $pdf->setX($alignx);
        $pdf->SetFont('Helvetica','B',6.5);
        $pdf->MultiCell($ancho, 2,"Lun-Vie 7:00 a 21:00:",$fill,'C',0);
        $pdf->setX($alignx);
        $pdf->MultiCell($ancho, 2,"Sab 7:30 a 16:00:",$fill,'C',0);
        $pdf->setX($alignx);
        $pdf->MultiCell($ancho, 2,"Dom 7:30 a 16:00:",$fill,'C',0);

       

        // Metodo para generar Tabla
        $alt = $pdf->GetY();
        $pdf->setXY(10,$alt+10);
        $pdf->SetFont('Helvetica','',7);
        $tamcolumns = [10,40,105,20,20];
        $tamfil=3.4;
        foreach ($data["info"] as $key => $value) {
            
            $rows = [];
            $spacex = [];
            foreach ($value as $index => $val) {
                $spacex[] = $tamcolumns[$index];
                $rows[] = $pdf->MultiCell($tamcolumns[$index], $tamfil,"$val",1,'J',0);
                $pdf->setY($pdf->GetY() - $rows[sizeof($rows)-1]*$tamfil);
                $pdf->setX($pdf->GetX() + (array_sum($spacex)));
            }
            $rengMax[] = max($rows);
            $pdf->setXY(10,$alt+10);
            // var_dump(array_sum($rengMax));
            $pdf->Ln(array_sum($rengMax)*$tamfil);
        }
        
        $pdf->RoundedRect(8, $alt+3, 200, 60, 3.5, 'D');
        $pdf->Close();
        $encode64 = base64_encode($pdf->Output('S'));
        return ["estatus"=>"ok","data"=>$encode64];
        // $pdf->Output('I');
    } 
}
?>