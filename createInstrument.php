<?php

$exp_get = explode("/",$_POST['No_Expediente']);
$es_get = $_POST['No_Escritura'];
$vol_get = $_POST['No_Volumen'];
$fu_get = $_POST['No_FoliosUsados'];
$inicial_folio = $_POST['No_FolioIni'];




/*$textToEncrypt = "My super secret information.";
$encryptionMethod = "AES-256-CBC";  // AES is used by the U.S. gov't to encrypt top secret documents.
$secretHash = "25c6c7ff35b9979b151f2136cd13b0ff";
$iv = "?¿dmvhg36v4Uc%$";
$options =0;
//To encrypt
$encryptedMessage = openssl_encrypt($textToEncrypt, $encryptionMethod, $secretHash,$options,$iv);

//To Decrypt
$decryptedMessage = openssl_decrypt($encryptedMessage, $encryptionMethod, $secretHash,$options,$iv);

//Result
echo "Encrypted: $encryptedMessage <br>Decrypted: $decryptedMessage";*/


$url = 'https://api.redintegralnotarial.mx/QA/createInstrument'; //url a la api

$ch = curl_init( $url ); //definicion de la url


$miArray = array(
  "archive"=> $exp_get[0], 
  "bookCollectionId" =>  $es_get,
	"instrumentBookId"=> $exp_get,
	"instrumentId"=> $exp_get,
	"startFolio" =>$inicial_folio,
	"numFolios" => $fu_get,
	"unusedFolios" => []);

$myJSON = json_encode($miArray);


$data = base64_encode($myJSON); // codifiando el json a base64




$sendArreglo = array(
  "deviceId" => "8f25831d-be37-48fb-9539-84cef7da22cc",
  "seedId" => 50,
  "b64Aes256DataSet" => $data,
  "b64Aes256Token" => "Aq5gRPmheKy1tZhxno/tGLUCNqliNjtrFBp7T53Sepk9u52QWL573aI6iJ0HELzD61FLlAZ6rXL+Kc5whR22rw1+JFnq5KICkkt2QSzTsMmJwi8VOIaQ9sRuiFmE9/n1jMn8vG+f113jSd89uuVt3FT6Cq6OVDkEv9KOjC7CNC/Ac6gH92DDHAASpXhv7cWU2X3UoCoih046UXiDIg0jVitHnQG0WdlMcBhH9yAtEbGYE2mL6XlbKoHpXvu1AAJ72oTWFXSfl43T/x7SWSnpwStzeJtdd3V3GlxN76S4/XeF+pqdV9MLFnbLbGyB2HLeYajv1oq5C0BOhTlUdoX6HQ=="

);

# var_dump($sendArreglo)
# Setup request to send json via POST.

$payload = json_encode( array( $sendArreglo ) );
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# Send request.
$result = curl_exec($ch);
curl_close($ch);
# Print response.
echo "<pre>$result</pre>"; 


?>