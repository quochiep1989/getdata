<?php
 fopen('php://output', 'w');
 header("Expires: 0");header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=dataESL.csv');
 $output = fopen('php://output', 'w');
 header("Expires: 0");
include "simple_html_dom.php";
$a = 'http://www.esl-lab.com/';
$easy = array();
$easyDetail = array();
$medium = array();
$mediumDeatail = array();
$dificult = array();
$dificultDetail = array();
$html = file_get_html($a);
$url_dificult = array(
    "http://esl-lab.com/emergencykit/emergencykitsc1.htm",
    "http://esl-lab.com/cellphone/cellphonesc1.htm",
    "http://esl-lab.com/car/carsc1.htm",
    "http://esl-lab.com/universitydegree/universitydegreesc1.htm",
    "http://esl-lab.com/expense/expensesc1.htm",
    "http://esl-lab.com/adsense/adsensesc1.htm",
    "http://esl-lab.com/dui/duisc1.htm",
    "http://esl-lab.com/cancer/cancersc1.htm",
    "http://esl-lab.com/car-accident/car-accidentsc1.htm",
    "http://esl-lab.com/repairs/repairsc1.htm",
    "http://esl-lab.com/trouble/troublesc1.htm",
    "http://esl-lab.com/dietplan/dietplansc1.htm",
    "http://esl-lab.com/divorcelawyer/divorcelawyersc1.htm",
    "http://esl-lab.com/drive/drivesc1.htm",
    "http://esl-lab.com/zoo/zoosc1.htm",
    "http://esl-lab.com/petcare/petcaresc1.htm",
    "http://esl-lab.com/flowershop/flowershopsc1.htm",
    "http://esl-lab.com/night/nightsc1.htm",
    "http://esl-lab.com/dental/dentalsc1.htm",
    "http://esl-lab.com/insurance/insurancesc1.htm",
    "http://esl-lab.com/cm1/cmsc1.htm",
    "http://esl-lab.com/gardeningshow/gardeningshowsc1.htm",
    "http://esl-lab.com/home/homesc1.htm",
    "http://esl-lab.com/homesecurity/homesecuritysc1.htm",
    "http://esl-lab.com/checkin/checkinsc1.htm",
    "http://esl-lab.com/complain/complainsc1.htm",
    "http://esl-lab.com/huntingtrip/huntingtripsc1.htm",
    "http://esl-lab.com/base/basesc1.htm",
    "http://esl-lab.com/jobhunting/jobhuntingsc1.htm",
    "http://esl-lab.com/landscaping/landscapingsc1.htm",
    "http://esl-lab.com/review/reviewsc.htm",
    "http://esl-lab.com/problem/probsc1.htm",
    "http://esl-lab.com/sitter/sittersc1.htm",
    "http://esl-lab.com/loan/loansc1.htm",
    "http://esl-lab.com/rent/rentsc1.htm",
    "http://esl-lab.com/grades/gradessc1.htm",
    "http://esl-lab.com/securitysystems/securitysystemssc1.htm",
    "http://esl-lab.com/returns/returnsc1.htm",
    "http://esl-lab.com/dear/dearsc1.htm",
    "http://esl-lab.com/taxi1/taxisc2.htm",
    "http://esl-lab.com/market/marketsc1.htm",
    "http://esl-lab.com/ideal/idealsc1.htm",
    "http://esl-lab.com/towingservice/towingservicesc1.htm",
    "http://esl-lab.com/game1/gamesc1.htm",
    "http://esl-lab.com/visit/visitsc1.htm",
    "http://esl-lab.com/game-boy/game-boy-sc1.htm",
    "http://esl-lab.com/anniversary/anniversarysc1.htm",
    "http://esl-lab.com/dir4/dir4scr.htm"
);
$easyUrl = array(
"http://esl-lab.com/phone/phonesc1.htm",
"http://esl-lab.com/elem/elemsc1.htm",
"http://esl-lab.com/live/livesc1.htm",
"http://esl-lab.com/bookstore/bookstoresc1.htm",
"http://esl-lab.com/camp/campsc1.htm",
"http://esl-lab.com/santa/santasc1.htm",
"http://esl-lab.com/classreunion/classreunionsc1.htm",
"http://esl-lab.com/clothing/clothingsc1.htm",
"http://esl-lab.com/tc1/tcsc1.htm",
"http://esl-lab.com/school1/schsc1.htm",
"http://esl-lab.com/schedule/schedsc1.htm",
"http://esl-lab.com/like1/lkscrt1.htm",
"http://esl-lab.com/record/recsc1.htm",
"http://esl-lab.com/fun/funsc1.htm",
"http://esl-lab.com/kinder/kindersc1.htm",
"http://esl-lab.com/family1/famsc1.htm",
"http://esl-lab.com/dating/datingsc1.htm",
"http://esl-lab.com/train/trainsc1.htm",
"http://esl-lab.com/music/musicsc1.htm",
"http://esl-lab.com/fastfood/fastfoodsc1.htm",
"http://esl-lab.com/birthday/birthdaysc1.htm",
"http://esl-lab.com/healthclub/healthclubsc1.htm",
"http://esl-lab.com/pie1/piesc1.htm",
"http://esl-lab.com/tradition/traditionsc1.htm",
"http://esl-lab.com/homestay/homestaysc1.htm",
"http://esl-lab.com/hotel1/hotlsc1.htm",
"http://esl-lab.com/customs/custsc1.htm",
"http://esl-lab.com/lost/lostsc1.htm",
"http://esl-lab.com/invite/invitesc1.htm",
"http://esl-lab.com/childintro/childintrosc1.htm",
"http://esl-lab.com/partyinvitations/partyinvitationssc1.htm",
"http://esl-lab.com/party/partscr1.htm",
"http://esl-lab.com/meet/meetsc1.htm",
"http://esl-lab.com/picnic/picsc1.htm",
"http://esl-lab.com/privatetutor/privatetutor-sc1.htm",
"http://esl-lab.com/reading/readingsc1.htm",
"http://esl-lab.com/rent/rentsc1.htm",
"http://esl-lab.com/chores/choresc1.htm",
"http://esl-lab.com/shop1/shopsc1.htm",
"http://esl-lab.com/travel/travelsc1.htm",
"http://esl-lab.com/snack/snacksc1.htm",
"http://esl-lab.com/sick1/sicscr1.htm",
"http://esl-lab.com/socialmedia/socialmediasc1.htm",
"http://esl-lab.com/money/moneysc1.htm",
"http://esl-lab.com/selfintro/selfintrosc1.htm",
"http://esl-lab.com/trainnew/trainsc.htm",
"http://esl-lab.com/flight/flightsc1.htm",
"http://esl-lab.com/plane1/plnscr1.htm",
"http://esl-lab.com/day1/daysc1.htm",
"http://esl-lab.com/intro2/intrsc2.htm"
);
//foreach ($url_dificult as $k){
//    $data =  getResult($k);
//    $data1 = str_replace("#", "<b>",$data);
//    $data2 = str_replace("^", "</b>", $data1);
//    $data3 = str_replace("~", "<p>", $data2);     
//    array_push($easyDetail,$data3);
//    array_push($easy,$easyDetail);
//    $easyDetail = array();
//}
$i=0;
$j=1;
$k=1;
foreach($html->find('a') as $e){   
    if(($i>32)&&($i<83)){      
        if(($j==4)||($j==25)||($j==49)){
               
        }else{
//            array_push($easyDetail,$e->innertext);
              array_push($easyDetail,$e->innertext);
              array_push($easyDetail,base64_encode("http://studyenglishvn.com/hiep/easy/".$k.".mp3"));    
              array_push($easyDetail,$a.$e->href.$k);
//            array_push($easyDetail,0);
//            array_push($easyDetail,0);
//            array_push($easyDetail,getQuiz($a.$e->href));
            $k++;
            
        }
        array_push($easy,$easyDetail);
        $easyDetail = array();
        $j++;
    }
//   if(($i>82)&&($i<132)){
//        if(($j==14)||($j==33)){            
//        }else{
////            array_push($mediumDeatail,$e->innertext);
////            array_push($dificultDetail,$e->href);
////            array_push($mediumDeatail,"http://studyenglishvn.com/hiep/medium/".$k.".mp3");
////            array_push($mediumDeatail,0);
////            array_push($mediumDeatail,1);
////            array_push($mediumDeatail,getQuiz($a.$e->href));
////            array_push($mediumDeatail,getAns($a.$e->href));
//            array_push($mediumDeatail,base64_encode("http://studyenglishvn.com/hiep/medium/".$k.".mp3"));
//            $k++;
//        } 
//        array_push($medium,$mediumDeatail);
//        $mediumDeatail = array();
//        $j++;
//    }

//    if(($i>131)&&($i<183)){
////        array_push($dificultDetail,$e->innertext);
////        array_push($dificultDetail,$e->href);
////        array_push($dificultDetail,"http://studyenglishvn.com/hiep/dificult/".$j.".mp3");
////        array_push($dificultDetail,0);
////        array_push($dificultDetail,1);
////        array_push($dificultDetail,getQuiz($a.$e->href));
////        array_push($dificultDetail,getAns($a.$e->href));
//////        $c = substr($a.$e->href,0,strlen($a.$e->href)-7);
//////        $b = $c."sc1.htm";
//////        $data =  getResult($b);
//////        $data1 = str_replace("#", "<b>",$data);
//////        $data2 = str_replace("^", "</b>", $data1);
//////        $data3 = str_replace("~", "<p>", $data2);     
//////        array_push($dificultDetail,$data3);
//        array_push($dificultDetail,base64_encode("http://studyenglishvn.com/hiep/dificult/".$j.".mp3"));
//        array_push($dificult,$dificultDetail);
//        $dificultDetail = array();
//        $j++;
//    }
   $i++; 
  
}
 

unset($easy[3]);
unset($easy[24]);
unset($easy[48]);

writeCsv($easy, $output);
//unset($medium[13]);
//unset($medium[32]);
//writeCsv($medium, $output);
//writeCsv($dificult, $output);
//var_dump(getResult("http://www.esl-lab.com/emergencykit/emergencykitsc1.htm"));
//writeCsv($easy, $output);

function getAudio($url){
 $html = file_get_html($url);
 $string = "";
    foreach($html->find('script[type="text/javascript"]') as $e){ 
       if(strpos($e->innertext,"file")) $string = $e->innertext;
    }   
    $arg = explode('.', $string);
    return "http://www.esl-lab.com".$arg[6];
}
function getQuiz($url){
  $html = file_get_html($url);
  $string = "";
    foreach($html->find('form[name="quiz"]') as $e){ 
        $string = $e->innertext;
    } 
   return $string;
}
function writeCsv($data,$file){
    foreach ($data as $i){
        fputcsv($file,$i);
    }
    fclose($file);
}
function getResult($url){
    
    $html = file_get_html($url);
    $TABLE = $html->find("table", 4);
    $tmp_dam_thoai = explode("</table>", $TABLE);
    $text_dam_thoai = $tmp_dam_thoai[1];
    $text_dam_thoai = str_replace("<b>", "#", $text_dam_thoai);
    $text_dam_thoai = str_replace("</b>", "^", $text_dam_thoai);
    $text_dam_thoai = str_replace("<p>", "~", $text_dam_thoai);
    $text_dam_thoai = strip_tags($text_dam_thoai);
    $dam_thoai = $text_dam_thoai;
   return $dam_thoai;  
   //return $string;
}
function getAns($url){
    $file = file_get_html($url);
    $tmp_tra_loi = $file->find("script");

    $String = $tmp_tra_loi[1];

    $mang_tmp_tra_loi = explode(";", $String);


    $tra_loi_1 = "";
    for ($i = 0; $i < sizeof($mang_tmp_tra_loi); $i++) {
        if (strpos($mang_tmp_tra_loi[$i], "] = ")) {
            $tra_loi_1 = $tra_loi_1 . $mang_tmp_tra_loi[$i] . "<br>";
        }
    }
    
    $result = str_replace('"',"", $tra_loi_1);
    
    if(strpos($result,"answers[0] =")){
        $result = str_replace("answers[0] =","1. ",$result);
    }
    if(strpos($result,"answers[1] =")){
        $result = str_replace("answers[1] =","2. ",$result);
    }
    if(strpos($result,"answers[2] =")){
        $result = str_replace("answers[2] =","3. ",$result);
    }
    if(strpos($result,"answers[3] =")){
        $result = str_replace("answers[3] =","4. ",$result);
    }
    if(strpos($result,"answers[4] =")){
        $result = str_replace("answers[4] =","5. ",$result);
    }
    if(strpos($result,"answers[5] =")){
        $result = str_replace("answers[5] =","6. ",$result);
    }
    return $result;
}
?>
