<?php

include ("includes/db.php");

if(isset($_POST['btnGuardarActo'])){

    $grupoActos =$_POST['txtGrupoActos'];
    $actos = $_POST['txtActo'];
    $escritura = $_POST['escriPost'];
   
    $query = "INSERT INTO  actosDelRin(Acto, GrupoActos, Expediente) VALUES ('$grupoActos','$actos', '$escritura')";
    $result = mysqli_query($conn,$query);

    if(!$result){
        die("Query Failed - Error");
    }

   // $_SESSION['message'] = 'Guardado Satisfactoriamente';
    //$_SESSION['message_type'] = 'success';


    header("Location: editReg.php?Expediente=".$escritura);

}



if(isset($_POST['btnGuardarCompareciente'])){

    $txtComparencientes =$_POST['txtComparenciente'];
    $txtTipo =$_POST['txtTipo'];
    $txtCURP =$_POST['txtCURP'];
    $txtRFC =$_POST['txtRFC'];
    $pasarExpediente = $_POST['pasarExpediente'];
    $txtActoComp = $_POST['txtActoComp'];
    
    
   
    $query = "INSERT INTO  comparecientesRin(NombreCompareciente, Expediente, TIpo, CURP, RFC, Acto) VALUES ('$txtComparencientes','$pasarExpediente','$txtTipo','$txtCURP','$txtRFC','$txtActoComp')";
    $result = mysqli_query($conn,$query);

    if(!$result){
        die("error");
        
    }

   // $_SESSION['message'] = 'Guardado Satisfactoriamente';
    //$_SESSION['message_type'] = 'success';


   header("Location: editReg.php?Expediente=".$pasarExpediente);

}