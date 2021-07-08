<?php

$data = @file_get_contents('seeds.json');

$items = json_decode($data, true);

base64_decode($items);
var_dump ($items);
?>