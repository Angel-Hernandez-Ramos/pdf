var numDatos = 0; 
$(document).ready(function () {
    console.log("Carga Completa");
});

$("#addElement").on("click",function(e){
    $("#infoPdf").append(`
        <div class="row mt-3">
            <div class="col-md-1">
                <label for="">#</label>
                <input type="text" name="info[${numDatos}][0]" class="form-control mt-3">
            </div>
            <div class="col-md-3">
                <label for="">Nombre</label>
                <input type="text" name="info[${numDatos}][1]" class="form-control mt-3">
            </div>
            <div class="col-md-4">
                <label for="">Descripción</label>
                <input type="text" name="info[${numDatos}][2]" class="form-control mt-3">
            </div>
            <div class="col-md-2">
                <label for="">Precio</label>
                <input type="text" name="info[${numDatos}][3]" class="form-control mt-3">
            </div>
            <div class="col-md-2">
                <label for="">Total</label>
                <input type="text" name="info[${numDatos}][4]" class="form-control mt-3">
            </div>
        </div>
    `);
    numDatos++;
});

$("#infoPdf").on("submit",function(e){
    e.preventDefault()
    let fdata =  new FormData(this);
    fdata.append("action","GenerarPdf");
    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "assets/Controller/pdfControl.php",
        data: fdata,
        contentType: false,
        processData: false,
        success: function (response) {
            $("#visorPdf").attr("src",`data:application/pdf;base64,${response.data}`)
        }
    });
});