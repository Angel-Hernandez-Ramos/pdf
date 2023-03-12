<?php
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

class Generador{
    public function GenerarPdf($data){
        // var_dump("here");
        $vari = 1;
        $pdf = new FPDF('P','mm', 'A4');
        // $pdf->Image("https://chart.googleapis.com/chart?chs=150x150&amp;cht=qr&amp;chl=https://puerto53.com&amp;choe=UTF-8", 10, 10, -300);
        
        $pdf->AddPage('P',array(215,279));
        $pdf->Image("https://chart.googleapis.com/chart?chs=50x50&cht=qr&chl=hola", -5, 18, 45, 0, 'PNG');
        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Helvetica','',7);
        $pdf->Image('../images/logobioscan.png', 10, 5, 35, 20);
        $pdf->setXY(10,60);
        $tamcolumns = [10,40,105,20,20];
        $tamfil=5;
        foreach ($data["info"] as $key => $value) {
            
            $rows = [];
            $spacex = [];
            foreach ($value as $index => $val) {
                $spacex[] = $tamcolumns[$index];
                $num = sizeof($rows)+1;
                $rows[] = $pdf->MultiCell($tamcolumns[$index], $tamfil,"$val",1,'J',0);
                $pdf->setY($pdf->GetY() - $rows[sizeof($rows)-1]*$tamfil);
                $pdf->setX($pdf->GetX() + (array_sum($spacex)));
            }
            $rengMax[] = max($rows);
            $pdf->setXY(10,60);
            // var_dump(array_sum($rengMax));
            $pdf->Ln(array_sum($rengMax)*$tamfil);
        }
        $pdf->Close();
        $encode64 = base64_encode($pdf->Output('S'));
        return ["estatus"=>"ok","data"=>$encode64];
        // $pdf->Output('I');
    } 
}
?>