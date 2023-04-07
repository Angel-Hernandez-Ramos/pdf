var numDatos = 0; 
$(document).ready(function () {
    console.log("Carga Completa");
});

$("#addElement").on("click",function(e){
    $("#infoPdf").append(`
        <div class="row mt-3">
            <div class="col-md-1">
                <input type="number" maxlenght="5" placeholder="#" name="info[${numDatos}][0]" class="form-control mt-3">
            </div>
            <div class="col-md-3">
                <input type="text" placeholder="Nombre" name="info[${numDatos}][1]" class="form-control mt-3">
            </div>
            <div class="col-md-4">
                <input type="text" placeholder="Descripción" name="info[${numDatos}][2]" class="form-control mt-3">
            </div>
            <div class="col-md-2">
                
                <input type="number" maxlenght="10" placeholder="Precio" name="info[${numDatos}][3]" class="form-control mt-3">
            </div>
            <div class="col-md-2">
                <input type="number" maxlenght="10" placeholder="Total" name="info[${numDatos}][4]" class="form-control mt-3">
            </div>
        </div>
    `);
    numDatos++;
});

$("#infoPdf").on("submit",function(e){
    e.preventDefault()
    let fdata =  new FormData(this);
    $.each(fdata.values, function (indexInArray, valueOfElement) { 
         console.log(valueOfElement);
    });
    // console.log(this);
    var doc = new jsPDF();
    doc.setFontSize(18);

    doc.text(`Paciente: ${$("#nombrep").val()}`, 14, 22);
    doc.text(`Doctor: ${$("#Doctor").val()}`, 14, 32);
    doc.text(`Telefono Paciente: ${$("#TelefonoP").val()}`, 14, 42);
    doc.text(`Genero: ${$("#sexoP").val()}`, 14, 52);
    doc.text(`Edad: ${$("#edadP").val()}`, 14, 62);
    doc.text(`Email: ${$("#EmailP").val()}`, 14, 72);
    doc.text(`Origen: ${$("#OrigenD").val()}`, 14, 82);
    doc.text(`Proximo QR: ${$("#CodInt").val()}`, 14, 92);    
  
    $("#visorPdf").attr("src",`${doc.output('datauristring')}`);

    // return doc;
    // fdata.append("action","GenerarPdf");
    // $.ajax({
    //     type: "POST",
    //     dataType: "JSON",
    //     url: "assets/Controller/pdfControl.php",
    //     data: fdata,
    //     contentType: false,
    //     processData: false,
    //     success: function (response) {
    //         $("#visorPdf").attr("src",`data:application/pdf;base64,${response.data}`)
    //     }
    // });
});