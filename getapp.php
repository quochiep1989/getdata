<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include "simple_html_dom.php";
$url = "http://esl-lab.com/homestay/homestayrd1.htm";

//var_dump(checkPosition(getQuiz($url),getAns($url)));
var_dump(getQuiz($url));
var_dump(positionAns(getQuiz($url),getAns($url)));
function getQuiz($url){
  $html = file_get_html($url);
  $string = "";
  $data = array();
    foreach($html->find('form[name="quiz"]') as $e){ 
        $string = $e->innertext;
    } 
   $string1 = explode("<p>",$string);
   foreach ($string1 as $key1=>$value) {     
    $string = explode("<br>", $value);
    if($key1 > count($string1)-3){
        break;
    }
    foreach ($string as $key=>$line){

        if($key==0){
            if(!empty($line)){
                 
                 $data["data".$key1]['quiz'] = $line;
            }
        }
        else{
             $line = explode(">", $line);
             if(!empty($line[count($line)-1])&&$line[count($line)-1]!=" "){
             $data["data".$key1]['ans'][$key] = $line[count($line)-1];
             }
        }
    }  
   } 
   return $data;
}
function getAns($url){
    $file = file_get_html($url);
    $tmp_tra_loi = $file->find("script");

    $String = $tmp_tra_loi[1];

    $mang_tmp_tra_loi = explode(";", $String);


    $tra_loi_1 = "";
    $tra_loi_2 = "";
    for ($i = 0; $i < sizeof($mang_tmp_tra_loi); $i++) {
        if (strpos($mang_tmp_tra_loi[$i], "] = ")) {
            $tra_loi_1 = $tra_loi_1 . $mang_tmp_tra_loi[$i] . "<br>";
            $tra_loi_2 = $tra_loi_2 . $mang_tmp_tra_loi[$i] . ";";
        }
    }
    
    $result = str_replace('"',"", $tra_loi_2);
        if(strpos($result,"answers[0] =")){
        $result = str_replace("answers[0] =","",$result);
    }
    if(strpos($result,"answers[1] =")){
        $result = str_replace("answers[1] =","",$result);
    }
    if(strpos($result,"answers[2] =")){
        $result = str_replace("answers[2] =","",$result);
    }
    if(strpos($result,"answers[3] =")){
        $result = str_replace("answers[3] =","",$result);
    }
    if(strpos($result,"answers[4] =")){
        $result = str_replace("answers[4] =","",$result);
    }
    if(strpos($result,"answers[5] =")){
        $result = str_replace("answers[5] =","",$result);
    }
    $result = explode(";", $result);
    unset($result[count($result)-1]);
            
    return $result;
}
function positionAns($quiz,$ans){
    $result = array(); 
    for($i=0;$i<count($quiz);$i++){ 
        $ans_ques = $ans[$i];
        $ans_ques = str_replace("`","'",$ans_ques);
        foreach ($quiz['data'.$i]['ans'] as $j=>$line){
            if(trim($ans_ques) == removeString($line)){
                $result['ans'.$i] = $j;
            }
        }
    }
    return $result;
}
function removeString($string){
    return(trim(substr($string,2,  strlen($string))));
}

