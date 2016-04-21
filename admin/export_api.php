<?php
header('Content-type: text/xml');

require_once('db.php');
$tab = "\t";
$br = "\n";

$xml = '<?xml version="1.0" encoding="UTF-8"?>' . $br;

//get the rows
$query3 = 'SELECT * FROM products';
$records = $conn->query($query3) or die('cannot select from table: products');

//table attributes
$attributes = array('product_id', 'category_id', 'title', 'photo_url', 'description', 'price', 'discount_price', 'quantity', 'created_at', 'updated_at');
$xml .= $tab . '<products>' . $br;

while ($record = $records->fetch_object()) {
    $xml .= $tab . $tab . '<product ';
    foreach ($attributes as $attribute) {
        $xml .= $attribute . '="' . $record->$attribute . '" ';
    }
    $xml .= '/>' . $br;
}
$xml .= $tab . '</products>' . $br;


//save file
if(isset($_GET['save']) && $_GET['save']=='true'){

	$handle = fopen('exports/Orinoco-backup-' . time() . '.xml', 'w+');
	$fwritetemp = fwrite($handle, $xml);
	$fclosetemp = fclose($handle);
	// var_dump($fwritetemp,$fclosetemp,$handle);
	if($fclosetemp==true){
		header("Location: ./export.php?action=export&successful=true");
	}else{
		header("Location: ./export.php?action=export&successful=false");
	}

}

$xml = new SimpleXMLElement($xml);
$dom = new DOMDocument('1.0');
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom->loadXML($xml->asXML());

echo $dom->saveXML();
