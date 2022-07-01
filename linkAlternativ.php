<?php

$url = "https://bit.ly/33NZlfS";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$a = curl_exec($ch); 
$url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL); 
echo $url;
