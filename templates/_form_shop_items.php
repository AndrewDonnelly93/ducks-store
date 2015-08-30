<?php
$file = "./data/products.csv";

if (!file_exists($file)) {
    die("We don't have data file");
}

if (($fp = fopen($file,"r+")) === false) {
    die("Error while opening file");
}

$products = [];

$i = 0;
while (($data = fgetcsv($fp,1000,";")) !== false) {
    if ($i > 0) {
        $products[$data[0]] = $data;
    }
    $i++;
}

fclose($fp);