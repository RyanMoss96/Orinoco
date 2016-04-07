<?php

require 'db.php';
$tab = "\t";
$br = "\n";

$xml = '<?xml version="1.0" encoding="UTF-8"?>' . $br;
$xml .= '<database name="Orinoco">' . $br;

//get the rows
$query3 = 'SELECT * FROM products';
$records = $conn->query($query3) or die('cannot select from table: products');

//table attributes
$attributes = array('product_id', 'category_id', 'title', 'photo_url', 'description', 'price', 'discount_price', 'status', 'quantity', 'created_at', 'updated_at');
$xml .= $tab . '<products>' . $br;

while ($record = $records->fetch_object()) {
    $xml .= $tab . $tab . '<product ';
    foreach ($attributes as $attribute) {
        $xml .= $attribute . '="' . $record->$attribute . '" ';
    }
    $xml .= '/>' . $br;
}
$xml .= $tab . '</products>' . $br;

$xml .= '</database>';

// //save file
$handle = fopen('exports/Orinoco-backup-' . time() . '.xml', 'w+');
fwrite($handle, $xml);
fclose($handle);

header("Location: ./export.php?action=export&successful=true");
die();
