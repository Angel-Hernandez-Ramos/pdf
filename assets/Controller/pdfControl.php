<?php
if (isset($_POST["action"])) {
    require_once '../Model/pdfModel.php';
    $pdf =  new Generador();
    switch ($_POST["action"]) {
        case 'GenerarPdf':
            unset($_POST["action"]);
            $print = $pdf->GenerarPdf($_POST);
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