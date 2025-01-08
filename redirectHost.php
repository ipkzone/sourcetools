<?php
// Author : Iddant ID
// Date   : 2025-01-08
// Version: 1.0
// Github : https://github.com/ipkzone

function redirectHost($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo "Error: " . curl_error($ch);
        curl_close($ch);
        return null;
    }

    $xx = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $aa = substr($response, 0, $xx);
    curl_close($ch);

    if (preg_match('/Location: (.+)/i', $aa, $cc)) {
        $dd = trim($cc[1]);
        $bb = parse_url($dd);
        return isset($bb['host']) ? $bb['host'] : null;
    } else {
        $bb = parse_url($url);
        return isset($bb['host']) ? $bb['host'] : null;
    }
}

$url = "http://ipkzone.online";
$domain = redirectHost($url);
if ($domain) {
    echo " Redirect domain: $domain\n";
} else {
    echo " Unable to fetch domain.\n";
}
