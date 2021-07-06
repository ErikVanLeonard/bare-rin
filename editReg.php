<?php include "includes/db.php" ?>
<?php

$obtenerExp = "SIN";

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


$pasar = $obtenerExp;

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
                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2" class="btn btn-info btn-block">
                                Agregar Acto <i class="fas fa-house-user"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="container-fluid">
            <div class="row">


                <div class="col-md-12" style="background-color: grey; margin-bottom: 30px;">
                    <h3 class="text-center" style="color: #fff;">
                        Datos del expediente
                    </h3>
                </div>

                <div class="col-md-12">
                    <form>
                        <div class="form-group row" style="margin-bottom: 10px;">
                            <label for="TxtExpediente" class="col-4 col-form-label" style="background-color: grey; color: white;">No. Expediente</label>
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
                                Comparecientes por acto
                            </h3>
                        </div>


                        <!--tabla aqui-->
                        <?php include "tables/tablacomxact.php"; ?>



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
                <h5 class="modal-title" id="exampleModalLabel">Cargar Compareciente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="guardarRegistro.php">


                    <div class="mb-3">
                        <label for="txtActoComp">Acto</label>
                        <div>
                            <select id="txtActoComp" class="form-control" name="txtActoComp">
                                <option selected value disabled="">Seleccione un acto:</option>
                                <?php
                                $query = $conn->query("SELECT * FROM actosDelRin E LEFT JOIN actosRin D ON E.Acto = D.id WHERE E.Expediente = '$obtenerExp'");
                                while ($valores = mysqli_fetch_array($query)) {
                                    echo utf8_encode('<option value="' . $valores['Acto'] . '">' . $valores['label'] . '</option>');
                                }
                                ?>
                            </select>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="txtComparenciente">Compareciente</label>
                        <div>
                            <select id="txtComparenciente" class="form-control" name="txtComparenciente">
                                <option selected value disabled="">Seleccione un compareciente:</option>
                                <?php
                                $query = $conn->query("SELECT * FROM otorgantes WHERE Expediente = '$obtenerExp'");
                                while ($valores = mysqli_fetch_array($query)) {
                                    echo utf8_encode('<option value="' . $valores['Nombre'] . '">' . $valores['Nombre'] . '</option>');
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="txtTipo">Rol</label>
                        <div>
                            <select id="txtTipo" class="form-control" name="txtTipo" class="form-control">
                                <option selected value disabled="">Seleccione un rol:</option>
                                <?php
                                $query = $conn->query("SELECT * FROM rolesDeActos");
                                while ($valores = mysqli_fetch_array($query)) {
                                    echo utf8_encode('<option value="' . $valores['id'] . '">' . $valores['role'] . '</option>');
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">CURP</label>
                        <input type="text" class="form-control" maxlength="18" name="txtCURP" placeholder="AAAA000000AAAAAAA0">
                        <pre id="resultado"></pre>
                    </div>
                    <div class="mb-3">
                        <label for="txtRFC" class="form-label">RFC</label>
                        <input type="text" class="form-control" maxlength="13" id="txtRFC" name="txtRFC" placeholder="AAAA000000AA0">
                    </div>
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="pasarExpediente" name="pasarExpediente" value="<?php echo $pasar?>">
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="btnGuardarCompareciente" class="btn btn-primary">Save changes</button>

                    </div>

            </div>

            </form>
        </div>
    </div>
</div>



<!-- Modal 2 -->
<div class="modal fade" id="exampleModal2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cargar acto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="guardarRegistro.php" method="POST">

                    <div class="mb-3">
                        <label for="txtGrupoActos">Grupo de actos</label>
                        <div>
                            <select id="txtGrupoActos" class="form-control" name="txtGrupoActos">
                                <option selected value disabled="">Seleccione un grupo de actos:</option>
                                <?php
                                $query = $conn->query("SELECT * FROM gruposActos");
                                while ($valores = mysqli_fetch_array($query)) {
                                    echo utf8_encode('<option value="' . $valores['id'] . '">' . $valores['label'] . '</option>');
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="txtActo">Acto</label>
                        <div>
                            <select id="txtActo" class="form-control" name="txtActo">
                                <?php
                                $query = $conn->query("SELECT * FROM actosRin");
                                while ($valores = mysqli_fetch_array($query)) { ?>
                                    <option value="<?php echo $valores['id'] ?>">
                                        <?php echo utf8_encode($valores['label']) ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" value="<?php echo $pasar ?>" class="form-control" id="escriPost" name="escriPost">
                    </div>


                    <!-- <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="btnGuardarActo" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>



<?php include "includes/footer.php" ?>