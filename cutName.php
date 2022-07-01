<?php

$email = "youremail@example.com";
$domain_name = substr(strrchr($email, "@"), 1);
echo "Domain name is :" . $domain_name;

$email = "youremail@example.com"; 
$parts = explode("@",$email); 
$username = $parts[0]; 
echo "\nUsername is :" . $username;
