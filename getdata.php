<?php
header('Content-Type: text/html; charset=utf-8');
$xml = new DOMDocument("1.0");
$root = $xml->createElement("data");
$xml->appendChild($root);
    $id   = $xml->createElement("id");
    $idText = $xml->createTextNode("4352");
    $id->appendChild($idText);
    $title   = $xml->createElement("name");
    $titleText = $xml->createTextNode("fsafsaf");
    $title->appendChild($titleText);
    $book = $xml->createElement("member");
    $book->appendChild($id);
    $book->appendChild($title);
    $root->appendChild($book);
$xml->formatOutput = true;
echo "<xmp>". $xml->saveXML() ."</xmp>";
$xml->save("data.xml") or die("Error");
?>