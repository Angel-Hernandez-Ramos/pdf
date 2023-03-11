<?php
if (isset($_POST["action"])) {
    require_once '../Model/pdfModel.php';
    require_once '../libs/fpdf183/fpdf.php';
    require_once '../libs/fpdf183/autoload.php';
    require_once('../libs/phpqrcode/qrlib.php');
    $pdf =  new Generador();
    switch ($_POST["action"]) {
        case 'GenerarPdf':
            unset($_POST["action"]);
            // var_dump($_POST);
            $print = $pdf->GenerarPdf($_POST);
            // var_dump($print);
            echo json_encode($print);
            break;
        
        default:
            echo json_encode(["estatus"=>"error","data"=>"No_action"]);
            break;
    }
}else{
    echo json_encode(["estatus"=>"error","data"=>"No_action_submit"]);
}
?>