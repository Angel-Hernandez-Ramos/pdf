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
            $("#visorPdf").attr("src",`data:application/pdf;base64,${response.data}`)
        }
    });
});