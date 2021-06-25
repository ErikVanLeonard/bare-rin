<?php include "includes/db.php" ?>
<?php

if (isset($_GET['Expediente'])) {
    $getExp = $_GET['Expediente'];

    $query = "SELECT * from expedientes WHERE Expediente = '$getExp'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);

        $obtenerExp = $row['Expediente'];
        $getEscritura = $row['Escritura'];
        $getOperacion = $row['Des_Operacion'];
        $getVolumen = $row['Volumen'];
        $getFolioIni = $row['Folio_Ini'];
        $getFolioFin = $row['Folio_Fin'];
        $foliosUsados = (($getFolioFin - $getFolioIni) + 1);



        /*  $queryOtorgantes = "SELECT * from otorgantes WHERE Expediente = '$getExp'";
        $resultOtorgantes = mysqli_query($conn,$queryOtorgantes); */
    }
}


?>

<?php include "includes/header.php" ?>

<!-- Page content-->
<div class="container">


    <div class="text-center mt-5">


        <div class="container-fluid" style="margin-bottom: 30px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Agregar compareciente <i class="fas fa-address-card"></i>
                            </button>
                            <button type="button" class="btn btn-info btn-block">
                                Agregar Inmueble <i class="fas fa-house-user"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <form>
                        <div class="form-group row" style="margin-bottom: 10px;">
                            <label for="TxtExpediente" class="col-4 col-form-label" style="background-color: grey; color: white;">No. Escritura</label>
                            <div class="col-8">
                                <input id="TxtExpediente" name="TxtExpediente" type="text" value="<?php echo $obtenerExp ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom: 10px;">
                            <label for="TxtEscritura" class="col-4 col-form-label" style="background-color: grey; color: white;">No. Escritura</label>
                            <div class="col-8">
                                <input id="TxtEscritura" name="TxtEscritura" type="text" value="<?php echo $getEscritura ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom: 10px;">
                            <label for="TxtOperacion" class="col-4 col-form-label" style="background-color: grey; color: white;">Operación</label>
                            <div class="col-8">
                                <input id="TxtOperacion" name="TxtOperacion" type="text" value="<?php echo $getOperacion ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom: 10px;">
                            <label for="TxtVolumen" class="col-4 col-form-label" style="background-color: grey; color: white;">Volumen</label>
                            <div class="col-8">
                                <input id="TxtVolumen" name="TxtVolumen" type="text" value="<?php echo $getVolumen ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom: 10px;">
                            <label for="TxtFolioIni" class="col-4 col-form-label" style="background-color: grey; color: white;">Folio Inicial</label>
                            <div class="col-8">
                                <input id="TxtFolioIni" name="TxtFolioIni" type="text" value="<?php echo $getFolioIni ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom: 10px;">
                            <label for="TxtFolioFin" class="col-4 col-form-label" style="background-color: grey; color: white;">Folio Final</label>
                            <div class="col-8">
                                <input id="TxtFolioFin" name="TxtFolioFin" type="text" value="<?php echo $getFolioFin ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom: 10px;">
                            <label for="text" class="col-4 col-form-label" style="background-color: grey; color: white;">Folios Utilizados</label>
                            <div class="col-8">
                                <input id="txtFoliosUsados" name="txtFoliosUsados" type="text" value="<?php echo $foliosUsados ?>" class="form-control" readonly>
                            </div>
                        </div>


                        
                                <div class="col-md-12" style="background-color: grey;">
                                    <h3 class="text-center" style="color: #fff;">
                                        h3. Lorem ipsum dolor sit amet.
                                    </h3>
                                </div>
                         

                        <div class="form-group row" style="margin-bottom: 10px;">
                            <div class="d-grid gap-2">
                                <button name="submit" type="submit" class="btn btn-success btn-block">EnviarXD</button>
                            </div>
                        </div>



                    </form>
                </div>


            </div>
        </div>






    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>



<?php include "includes/footer.php" ?>