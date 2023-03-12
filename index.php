<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador PDF</title>
    <!-- <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css"> -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row text-center mt-3">
            <div class="col-md-12">
                <h3>Generador de PDF</h3>
            </div>
            <form id="infoPdf">
                <div class="col-md-12">
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="Doctor">Doctor</label>
                            <input type="text" name="Doctor" id="Doctor" class="form-control">
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="nombrep">Nombre del Paciente</label>
                            <input type="text" name="nombrep" id="nombrep" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="">Edad</label>
                            <input maxlenght="3" type="number" name="edadP" id="edadP" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="">Sexo</label>
                            <input type="text" name="sexoP" id="sexoP" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="">Telefono</label>
                            <input maxlenght="15" type="number" name="TelefonoP" id="TelefonoP" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="EmailP">Email Paciente</label>
                            <input type="text" name="EmailP" id="EmailP" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="EmailD">Email Doctor</label>
                            <input type="text" name="EmailD" id="EmailP" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="OrigenD">Origen</label>
                            <input type="text" name="OrigenD" id="OrigenD" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="CodInt">Codigo Interno</label>
                            <input type="text" name="CodInt" id="CodInt" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="Recibo">Recibo</label>
                            <input type="text" name="Recibo" id="Recibo" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="RealizoP">Realizo:</label> 
                            <input type="text" name="RealizoP" id="RealizoP" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="MetodoP">Metodo de Pago</label>
                            <input type="text" name="MetodoP" id="MetodoP" class="form-control">
                        </div>
                        <div class="col-md-4"> 
                            <label for="RealizoP">Cantidad en Moneda:</label> 
                            <input type="text" name="RealizoP" id="RealizoP" class="form-control">
                        </div>
                        <div class="col-md-4"> 
                            <label for="infoQR">InfoQr:</label> 
                            <input maxlenght = "5" type="number" name="infoQR" id="infoQR" class="form-control">
                        </div>
                    </div>
                </div>
                
                <button id="addElement" class="btn btn-info mt-3" type = "button">Añadir elemento</button>
                <button id="GenerarPdf" class="btn btn-primary mt-3" type = "submit" data-toggle="modal" data-target="#ModalVisualizar">Generar PDF</button>
            </form>
        </div>
    </div>

    <div class="modal fade" id="ModalVisualizar" tabindex="-1" role="dialog" aria-labelledby="ModalVisualizar" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Visualizar</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <h4>Pdf generado</h4>
                    <div class="embed-responsive embed-responsive-21by9">
                        <iframe id="visorPdf" class="embed-responsive-item" src=""></iframe>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <!-- <button type="button" class="btn btn-primary">Save</button> -->
                </div>
            </div>
        </div>
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="assets/js/pdfscript.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</body>
</html>