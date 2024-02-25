<?php

function progressBar($progress, $total)
{
    $Yellow = "\e[33m";
    $Green = "\e[92m";
    $White = "\e[0m";

    $barLength = 50;
    $progressPercentage = round(($progress / $total) * 100);
    echo " {$Yellow}◉{$White} Loading. {$Green}[{$White}";
    for ($i = 0; $i < $barLength; $i++) {
        if ($i < ($progressPercentage / 2)) {
            echo "{$Yellow}={$White}";
        } elseif ($i == ($progressPercentage / 2)) {
            echo ">";
        } else {
            echo " ";
        }
    }
    echo "{$Green}]{$White} {$Green}$progressPercentage%{$White} ({$Green}$progress{$White}/{$Yellow}$total{$White})";
    echo "\r";
}
$Yellow = "\e[33m";
$Green = "\e[92m";
$White = "\e[0m";

$total = 100;
$progress = 0;
while ($progress <= $total) {
    progressBar($progress, $total);
    $progress++;
    usleep(100000);
}
echo "\n {$Yellow}◉{$White} Proses loading selesai.\n";
