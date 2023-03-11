<?php
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader; 
class Generador{
    public function GenerarPdf($data){
        // var_dump("here");
        $vari = 1;
        $pdf = new FPDF('L','', array(215,279));
        
        $pdf->AddPage('L',array(215,279));
       
        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Helvetica','',11);
        $pdf->setXY(10,30);
        foreach ($data["info"] as $key => $value) {
            $rows = [];
            foreach ($value as $index => $val) {
                $num = sizeof($rows)+1;
                $rows[] = $pdf->MultiCell(50, 7,"$val {$num}",1,'C',0);
            }
            // var_dump($rows);
            $pdf->setY($pdf->GetY() - $rows[sizeof($rows)-1]*7);
            $pdf->setX($pdf->GetX() + (50*(sizeof($rows))));
            $rengMax = max($rows);
        }
        $pdf->Close();
        $encode64 = base64_encode($pdf->Output('S'));
        return ["estatus"=>"ok","data"=>$encode64];
        // $pdf->Output('I');
    } 
}
?>