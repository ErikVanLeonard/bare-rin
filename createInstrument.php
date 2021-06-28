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
  "seedId" => 100,
  "b64Aes256DataSet" => $data,
  "b64Aes256Token" => "rJ0kb7m7Ti/4Fl0pHIkw+4x3x1bMhBzkD6MxsqKbcLbjaTMb+L4ymAr9dPwO8UsND+WXnDbrSyzz6WozHmLYbUhpC9Yyzsa9aWCGd8DaYnWih1dYYdSwWX8FEYK7DP+R2tuvmUCqN5YXbEeijQO9bcglFv8dq2AFgjm7HutnlVHQpfInKBFFiKNbp9hJ22kKZsxg17mNnD7T3VQCtaEPSO06ZRpgRBNHYedVQutl316jJxWpQ52R25lfkfWLabWKRPmQOzHHb8Z6kjSIb0KvPoNgNnPsl9qTtS/h7+Zygh6y+u+03bfIvxA2ba307wqCk68X+fAqvNj28+LN951TUA==");

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