<?php include "includes/header.php" ?>
<?php include "includes/db.php" ?>
<!-- Page content-->
<div class="container">
    <div class="text-center mt-5">

        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <!-- HTML Code: Place this code in the document's body (between the 'body' tags) where the table should appear -->
                    <table id="myTablew" class="table table-hover table-striped table-borderless table-responsive">
                        <thead class="table-dark">
                            <tr>
                                <th>Expediente</th>
                                <th>Escritura</th>
                                <th>Operación</th>
                                <th>Libro</th>
                                <th>Volumen</th>
                                <th>F. Inicial</th>
                                <th>F.Final</th>
                                <th>F.Usados</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include "tables/table_exp.php" ?>
                        </tbody>
                    </table>
                    <!-- Codes by Quackit.com -->



                </div>

            </div>
        </div>

    </div>
</div>

<?php include "includes/footer.php" ?>