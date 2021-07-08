<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-sm table-responsive">
            <thead>
               
            </thead>
            <thead>
                <tr>
                    <th>
                        Compareciente
                    </th>
                    <th>
                        Rol
                    </th>
                    <th>
                        CURP
                    </th>
                    <th>
                        RFC
                    </th>
                    <th>
                        Acto
                    </th>
                    <th>
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>                   
                        <?php
                        try{
                        $query = "SELECT * FROM comparecientesRin E LEFT JOIN actosrin D ON E.Acto = D.id LEFT JOIN rolesdeactos R ON E.Tipo = R.id WHERE E.Expediente = '$getExp'"; //consulta
                        $result = mysqli_query($conn, $query); // conexion
                        while ($row = mysqli_fetch_array($result)) { //ciclo
                        ?>                     
                <tr>
                    <td><?php echo $row['NombreCompareciente']; ?></td>
                    <td><small><?php echo utf8_encode($row['role']); ?></small></td>
                    <td><?php echo $row['CURP']; ?></td>
                    <td><?php echo $row['RFC']; ?></td>
                    <td><small><?php echo utf8_encode($row['label']); ?></small></td>                 
                    <td>
                        <a href="editReg.php?Expediente=<?php echo $row['Expediente'] ?>" class="btn btn-primary">Abrir <i class="fas fa-address-card"></i></a>
                    </td>
                </tr>
                </form>
            <?php }} catch(TypeError $e){              
            }           
            ?> 
            </tbody>
        </table>
       
    </div>
</div>