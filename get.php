<?php
header('Content-Type: text/html; charset=utf-8');
$data = new admin();
//echo "2";
//$data ->config("sql313.byethost12.com","b12_15106138_xml","b12_15106138","Quochiep2014");
$data ->config("localhost","xml","root","");
//$info = $data->select("id,sname","music","sname LIKE "."%a%");
if(isset($_GET['name'])){
  $name = $_GET['name'];
}else{
  $name = "";      
}
$info = $data->search($name);
$xml = new DOMDocument("1.0");
$root = $xml->createElement("data");
$xml->appendChild($root);
foreach ($info as $line){
    $id   = $xml->createElement("id");
    $idText = $xml->createTextNode($line['id']);
    $id->appendChild($idText);
    $title   = $xml->createElement("name");
    $titleText = $xml->createTextNode($line['sname']);
    $title->appendChild($titleText);
    $book = $xml->createElement("member");
    $book->appendChild($id);
    $book->appendChild($title);
    $root->appendChild($book);
}

$xml->formatOutput = true;
echo  $xml->saveXML();
$xml->save("data.xml") or die("Error");
class admin {
		//function config database 
		var $db;
    function config($host,$dbname,$user,$pass) {
				$this->db = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $pass);
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $this->db->exec("SET NAMES utf8");
                               
    }

    //function get data from table
    function select($field, $nameDb, $condition) {
       // $this->db->exec("SET CHARACTER SET utf8"); 
        $statement = $this->db->query('SELECT '.$field.' FROM '.$nameDb.' where '.$condition);
				$statement->setFetchMode(PDO::FETCH_ASSOC);
				return $statement->fetchAll();
				
    }
    function search($sname){     
        $params = array("%$sname%","%$sname%");
        $data = $this->db->prepare("SELECT id,sname,sabbr FROM music WHERE sname LIKE ? or sabbr LIKE ?");
        $data->execute($params);
        $data->setFetchMode(PDO::FETCH_ASSOC);
        return $data->fetchAll();     
    }
		 //function insert data from table
    function insert($table, $value) {
				$fi = array();
				$nameField = "";
				foreach ($value as $key=>$data){
					array_push($fi,$key);
				}
				$info = $table."(".implode(",",$fi).")";			
				foreach ($fi as $key=>$line){			
					if($key== count($fi)-1) $nameField  .=":".$line;
					else $nameField  .=":".$line.",";
				}
				$process = $this->db->prepare('INSERT INTO '.$info.' VALUES ('.$nameField .')');
				$process->execute($value);
    }
		//function update data from table
    function update($nameDb, $value, $condition) {
        $process = $this->db->query("UPDATE $nameDb set $value where $condition");
				$process->execute();
    }
		//function delete data from table
    function delete($nameDb, $condition) {
				$process = $this->db->query("DELETE FROM $nameDb  where $condition");
				$process->execute();
    }
		//begin transaction
    function begin() {
        $this->db->beginTransaction();
    }
		//commit
    function commit() {
        $this->db->commit();
    }
		//rollback
    function rollback() {
        $this->db->rollBack();
    }
		//function return data get from file.
		function  dataFileDat($rowData) {
			$temp = array();
			$temp['REC_TYPE']			= trim(substr($rowData, 0, 1));
			$temp['MEMBER_NO']		= trim(substr($rowData, 1, 10));
			$temp['ID_PASSPORT']	= trim(substr($rowData, 11,25));
			$temp['MEMBER_NAME']	= trim(substr($rowData,36,200));
			$temp['GENDER']				= substr($rowData,236,1);
			$temp['ADD_NO']				= trim(substr($rowData,237,50));
			$temp['STREET']				= trim(substr($rowData,287,50));
			$temp['WARD']					= trim(substr($rowData,337,50));
			$temp['DISTRICT']			= trim(substr($rowData,387,50));
			$temp['PROVINCE']			= trim(substr($rowData,437,50));
			$temp['HOME_PHONE']		= trim(substr($rowData,487,20));
			$temp['MOBILE_PHONE']	= trim(substr($rowData,507,20));
			$temp['EARNED_PTS']		= (int)trim(substr($rowData,527,22));
			$temp['REDEEM_PTS']		= (int)trim(substr($rowData,549,22));
			$temp['EXPIRED_PTS']	= (int)trim(substr($rowData,571,22));
			$temp['BAL_PTS']			= (int)trim(substr($rowData,593));
			return $temp;
    }
		//function check not empty for member_no,id_passport,rec_type
		function  notEmpty($data) {
			if(empty($data['MEMBER_NO'])||empty($data['ID_PASSPORT'])||empty($data['REC_TYPE'])){
					return true;
			}
			return false;
    }
		//function check exits member_no and id_passport in database use for insert,update,delete process
		//return true if information exit in database
		function checkNoIcCard($info) {
        //$data = $this->select("MEMBER_NO,ID_PASSPORT", "memberAeon", true);
				$data = $this->select("MEMBER_NO,ID_PASSPORT","memberAeon",true);
        if (!empty($data)) {
            foreach ($data as $every) {
                if (strcmp($every['ID_PASSPORT'], $info['ID_PASSPORT']) == 0 &&
                        strcmp($every['MEMBER_NO'], $info['MEMBER_NO']) == 0)
                    return true;
            }
        }
        return false;
    }
//function only get file was sent in today
function checkFileToday($file){
        date_default_timezone_set('Asia/Bangkok');
        $date = date('Ymd');
        $date_file = substr($file,3,8);
        if(date($date_file) == $date) return true;
        return false;
}
function slace($file){
        $element = array();
        $pieces = explode("/", $file);
        return $pieces[count($pieces)-1];
}
function getDateToday(){
        date_default_timezone_set('Asia/Bangkok');
        $date = date('Ymd');
        return $date;
}
function success($id,$member,$phone){
                $count = 0;
                $data = $this->select("*","memberAeon","ID_PASSPORT=".$id);
                if(!empty($data)){
                                if(!empty($member)&&!empty($phone)){
                                                foreach ($data as $every){
                                                                if(strcmp($every['MEMBER_NO'],$member) == 0 && strcmp($every['MOBILE_PHONE'],$phone) == 0) $count++;
                                                }
                                }else{
                                                if(!empty($member)){
                                                         foreach ($data as $every){
                                                                if(strcmp($every['MEMBER_NO'],$member) == 0 ) $count++;
                                                         } 
                                                }
                                                elseif(!empty ($phone)){
                                                                foreach ($data as $every){
                                                                if(strcmp($every['MOBILE_PHONE'],$phone) == 0) $count++;
                                                         } 
                                                }
                                }
        }
                if ($count) return true;
                return false;
}	
function getPoint($id,$member,$phone){
        if(!empty($id)&&!empty($member)&&!empty($phone)){
                 $data = $this->select("MEMBER_NO,MEMBER_NAME,EARNED_PTS,REDEEM_PTS,EXPIRED_PTS,BAL_PTS","memberAeon","ID_PASSPORT='$id' AND MOBILE_PHONE='$phone' AND MEMBER_NO= '$member'");
        }
        if(empty($member)){
                 $data = $this->select("MEMBER_NO,MEMBER_NAME,EARNED_PTS,REDEEM_PTS,EXPIRED_PTS,BAL_PTS","memberAeon","ID_PASSPORT='$id' AND MOBILE_PHONE='$phone'");
        }
        if(empty($phone)){
                 $data = $this->select("MEMBER_NO,MEMBER_NAME,EARNED_PTS,REDEEM_PTS,EXPIRED_PTS,BAL_PTS","memberAeon","ID_PASSPORT='$id' AND MEMBER_NO	= '$member'");

        }
        if(!empty($data)) return $data;
 }
}
?>
