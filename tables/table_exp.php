<?php



$query = "SELECT * FROM expedientes order by Expediente ASC;"; //consulta
$result = mysqli_query($conn, $query); // conexion
while ($row = mysqli_fetch_array($result)) { //ciclo
?>
<form method="POST" action="createInstrument.php">
    <tr>
       
            <td><?php echo $row['Expediente']; ?></td>
            <td><?php echo $row['Escritura']; ?></td>
            <td><?php echo $row['Operacion']; ?></td>
            <td><?php echo $row['Libro']; ?></td>
            <td><?php echo $row['Volumen']; ?></td>
            <td><?php echo $row['Folio_Ini']; ?></td>
            <td><?php echo $row['Folio_Fin']; ?></td>
            <td><?php echo (($row['Folio_Fin'] - $row['Folio_Ini']) + 1); ?></td>
            <td>
            <input type="hidden" name="No_Expediente" value="<?php echo $row['Expediente'] ?>">
            <input type="hidden" name="No_Escritura" value="<?php echo $row['Escritura'] ?>">
            <input type="hidden" name="No_Volumen" value="<?php echo $row['Volumen'] ?>">
            <input type="hidden" name="No_FolioIni" value="<?php echo $row['Folio_Ini'] ?>">
            <input type="hidden" name="No_FoliosUsados" value="<?php echo (($row['Folio_Fin'] - $row['Folio_Ini']) + 1) ?>">
            <button type="submit" class="btn btn-success">Success</button>
                <!--<button type="button" class="btn btn-primary"><small>Abrir </small></button>-->
        
        <a href="editReg.php?Expediente=<?php echo $row['Expediente'] ?>" class="btn btn-primary">Abrir <i class="fas fa-address-card"></i></a>
        </td>
        
    </tr>
    </form>
<?php } ?>