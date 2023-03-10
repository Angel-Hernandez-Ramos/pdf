$(document).ready(function () {
    console.log("Carga Completa");
});

$("#GenerarPdf").on("click",function(e){
    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "assets/Controller/pdfControl.php",
        data: {action: "GenerarPdf"},
        success: function (response) {
            console.log(response);
        }
    });
});