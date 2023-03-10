<?php
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader; 
class Generador{
    public function GenerarPdf($data){
        // var_dump("here");
        $vari = 1;
        $pdf = new FPDF('L','mm', array(279,215));
        
        $pdf->AddPage('L',array(279,215));
       
        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Helvetica','B',20);
        $pdf->setXY(45,84);
        $pdf->MultiCell(200, 7,"Oscar chico ardillo",0,'C',0);
        $pdf->Close();
        $encode64 = base64_encode($pdf->Output('S'));
        return ["estatus"=>"ok","data"=>$encode64];
        // $pdf->Output('I');
    } 
}
?>