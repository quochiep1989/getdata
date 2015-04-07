<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$string = '     ~~~~!#@!#!$%^&*(*&^%$#@!~!@#$%^&*&^%$#@!@#$%^&*()(*&^%213214214124----+++++++++++++++++++++++++++=------?>><<<>>>>>>>>>>>>>>><<<<<<<<<<<<<<<<<<<<<<-----------+++++++=======++++++++++++++141a|"bc!@£de^&$f ?/*()(*&%%%#%#$%@$#!$@!@#%%!$@!$!@<>><><><g';
var_dump(removeSpecialChar($string));

function removeSpecialChar($string) {
   $string = trim($string);
   $string = str_replace(' ', '', $string);                 // Removes all spaces with hyphens.
   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
   return preg_replace('/-+/','', $string);                 // Removes -+ 
}
