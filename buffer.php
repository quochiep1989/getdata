<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include $_SERVER['DOCUMENT_ROOT'].'xml/lib/function.php';
$database = new admin();
$database->config("192.168.1.150", "postandroid", "vsftpd", "vsftpdpassword");

$data = $database->select("*", "item", true);
if (isset($_POST['value'])) {
    $database->insert("item", array("name" => $_POST['value']));
} else {
    $database->delete("item", true);
}


?>
