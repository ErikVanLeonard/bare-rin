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
  CURLOPT_POSTFIELDS =>'{"username":"USERAPI-161-35A2FF","b64Aes256Message":"HNcVr40b1hyBHIrKdYHXC4OAjTBg6KOppsKiUpOZpmEyWwJhlzsc+hfLjhZgBClXMh+waRnANgfzUbZQ84DMKDhKDghwX3tD4g9OSZUBCZlauGDCgNq/fCLyFLROddX6Balpu7k0cf45CULFOX92F+Anon1jlb6krM4vbjiz65N28C39hLvaQym1MOMhQkQ2RkIosQcPxpfVvJSOn2jedErxzlz131ylnzvlvZIjIGmkVA3co3/F1b370imxZSMMOLHkNtF6GCIGSMJT7EM1ruWZl9jXIxkcm+pr8a0PKBxAx/RUsXixHStsBcKtPMzJKliYOAsdemSJMjmbcmxYTA=="}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
