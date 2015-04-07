<META http-equiv="REFRESH" content="1; url=http://192.168.1.150/xml/post.php"> 
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include $_SERVER['DOCUMENT_ROOT'].'xml/lib/function.php';
$database = new admin();
$database->config("192.168.1.150", "postandroid", "vsftpd", "vsftpdpassword");
$data = $database->select("*","item",true);
foreach ($data as $i){
    echo $i['name']."<br/>";
}

?>
