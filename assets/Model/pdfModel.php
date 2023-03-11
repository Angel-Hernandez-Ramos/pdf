<?php
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader; 
class Generador{
    public function GenerarPdf($data){
        // var_dump("here");
        $vari = 1;
        $pdf = new FPDF('P','mm', 'A4');
        
        $pdf->AddPage('P',array(215,279));
       
        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Helvetica','',7);
        $pdf->Image('../images/logobioscan.png', 10, 5, 35, 20);
        $pdf->setXY(10,60);
        $tamcolumns = [10,40,105,20,20];
        foreach ($data["info"] as $key => $value) {
            
            $rows = [];
            $spacex = [];
            foreach ($value as $index => $val) {
                $spacex[] = $tamcolumns[$index];
                $num = sizeof($rows)+1;
                $rows[] = $pdf->MultiCell($tamcolumns[$index], 5,"$val",1,'J',0);
                $pdf->setY($pdf->GetY() - $rows[sizeof($rows)-1]*5);
                $pdf->setX($pdf->GetX() + (array_sum($spacex)));
            }
            $rengMax = max($rows);
            $pdf->setXY(10,60);
            $pdf->Ln($rengMax*5*($key+1));
        }
        $pdf->Close();
        $encode64 = base64_encode($pdf->Output('S'));
        return ["estatus"=>"ok","data"=>$encode64];
        // $pdf->Output('I');
    } 
}
?>