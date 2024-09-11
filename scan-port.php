<?php
error_reporting(0);

function isPortOpen($host, $port)
{
    $connection = @fsockopen($host, $port, $errno, $errstr, 5);
    if (is_resource($connection)) {
        fclose($connection);
        return true;
    } else {
        return false;
    }
}

function isError400($url)
{
    $headers = @get_headers($url);
    if ($headers && strpos($headers[0], '400') !== false) {
        return true;
    }
    return false;
}

$Yellow = "\e[33m";
$Green = "\e[92m";
$White = "\e[0m";
$Red = "\e[31m";

echo " {$Red}➤{$White} Checking Host Open Port\n";
echo " {$Red}➤{$White} Input your file : ";
$dataFiles = trim(fgets(STDIN));
echo "\n";

$file = file_get_contents($dataFiles);
$subdomains = preg_split('/\r\n|\r|\n/', $file);
$port = 81;
$results = [];
$openPorts = [];

foreach ($subdomains as $subdomain) {
    $isPortOpen = isPortOpen($subdomain, $port);
    $url = "http://$subdomain";
    $hasError400 = isError400($url);

    if ($isPortOpen || $hasError400) {
        $results[] = [
            'subdomain' => $subdomain,
            'port_open' => $isPortOpen,
            'error_400' => $hasError400
        ];
        if ($isPortOpen) {
            $openPorts[] = $subdomain;
        }
    }
}

$filename = 'scan_results.txt';
$file = fopen($filename, 'w');
foreach ($results as $result) {
    $line = "";
    $line .= "Host       : " . $result['subdomain'] . "\n";
    $line .= "Port 81    : " . ($result['port_open'] ? 'Ya' : 'Tidak') . "\n";
    $line .= "Error 400  : " . ($result['error_400'] ? 'Ya' : 'Tidak') . "\n";
    $line .= "-----------------------------------------\n";
    fwrite($file, $line);

    echo " {$Red}➤{$White} {$Yellow}" . $result['subdomain'] . "{$White} \t| Open port 81 : " . ($result['port_open'] ? ''.$Green.'Ya'.$White.'' : ''.$Red.'Tidak'.$White.'') . " | Error 400 : " . ($result['error_400'] ? ''.$Green.'Ya'.$White.'' : ''.$Red.'Tidak'.$White.'') . "\n";
}
fclose($file);
