<?php

include "includes/configJSON.php";

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => API_URL.'/getSeed',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>DATASET,
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);


$rs = explode(",",$response); 

//echo $rs[0]; //mesagge
//echo  $rs[1]; //code
//echo $rs[2]; //data

$ds  = explode(":",$rs[0]);

  echo "<script> alert('".trim($ds[1],"\"")."'); </script>";

$data = explode(":",$rs[2]);
$dataw = trim($data[1],"\"");

define("FIRST_VALIDATION_TOKEN","$dataw");

echo '<br><input type="text" id="fname" name="fname" value="'.$dataw.'" readonly>';