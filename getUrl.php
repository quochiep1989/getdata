<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include "simple_html_dom.php";
$a = 'http://www.esl-lab.com/';

$html = file_get_html($a);
$text = $html->find('div[id=header]');
foreach($html->find('div[id=header]') as $a){
  var_dump($a->attr);
}

?>
