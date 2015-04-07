<?php

include './csv.html';
include './encode.php';
$a = new file();
$temp = array();
//$text = "quochiep";
//$key = "choembaphat";
////var_dump(encrypt($text,$key));
////var_dump (decrypt(encrypt($text,$key),"choembaphat"));
//$encode = new MCrypt();
//$encode->encrypt($text);
//var_dump($encode->encrypt($text));
//var_dump($encode->decrypt($encode->encrypt($text)));
if (isset($_POST['submit'])) {
    fopen('php://output', 'w');
    header("Expires: 0");
    fopen('php://output', 'w');
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=chapternew.csv');
    $output = fopen('php://output', 'w');
    header("Expires: 0");
    $strData = file_get_contents($_FILES['tmp_name']['tmp_name']);
    $rows = explode("\n", $strData);
    $nRow = count($rows);

    for ($i = 0; $i < $nRow - 1; $i++) {
        $rowData = explode(',', $rows[$i]);
        $dataUsers[] = $a->putData($rowData);
    }
    foreach ($dataUsers as $data) {

        $data['Row']['col1'] = base64_encode($data['Row']['col1']);
        $temp['col1'] = $data['Row']['col1'];
//        $temp['col2'] = $data['Row']['col2'];
//        $temp['col3'] = $data['Row']['col3'];
//        $temp['col4'] = $data['Row']['col4'];
        fputcsv($output, $temp);
    }
}

function encrypt($string, $key) {
    $result = '';
    for ($i = 0; $i < strlen($string); $i++) {
        $char = substr($string, $i, 1);
        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
        $char = chr(ord($char) + ord($keychar));
        $result.=$char;
    }

    return base64_encode($result);
}

function decrypt($string, $key) {
    $result = '';
    $string = base64_decode($string);
    var_dump($string);
    for ($i = 0; $i < strlen($string); $i++) {
        $char = substr($string, $i, 1);
        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
        var_dump("dadjkahsf");
        var_dump($keychar);
        $char = chr(ord($char) - ord($keychar));
        var_dump($char);
        $result.=$char;
    }

    return $result;
}

class file {

    function getDataFromRowData($rowData, $i, $default = "", $trim = false) {
        if (isset($rowData[$i])) {
            if (!$trim) {
                if ($rowData[$i] == "") {
                    return $default;
                }
                return $rowData[$i];
            } else {
                if (trim($rowData[$i]) == "") {
                    return $default;
                }
                return trim($rowData[$i]);
            }
        } else {
            return $default;
        }
    }

    function putData($rowData) {
        $temp = array();
        $temp['Row']['col1'] = $this->getDataFromRowData($rowData, 0,true);
//        $temp['Row']['col2'] = $this->getDataFromRowData($rowData, 1);
//        $temp['Row']['col3'] = $this->getDataFromRowData($rowData, 2);
//        $temp['Row']['col4'] = $this->getDataFromRowData($rowData, 3, true);


        return $temp;
    }

}

?>
