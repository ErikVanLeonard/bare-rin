<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.redintegralnotarial.mx/QA/authApi',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{"username":"USERAPI-161-35A2FF","b64Aes256Message":"qbGhVwhLjNd3wf7YK0UetOpvnz443SLvgLQ/HWFO1583SLzZcjK5WNmDO/cHF0wjaTvWZQ+xVzawagPogi7Qw7ufHYFNwWCZloqE3OkuwPO3LGLLYZaCcQ2t648tfgtYuOO5gy6kr2KPf/HWEpmPmF9SWw4jq8zKO5K2P22g0nGbj29keWlv0KhIXr1Mqv8xDqAEftNS++J9dfKu2Pcg9ubMWc1Ypg=="}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
