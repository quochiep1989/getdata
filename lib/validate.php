<?php

class validate {
        function errors($type){
            switch ($type){
                case "emptyId":
                    return "Please enter your ID";
                    break;
                case "isId":
                    return "ID must numberic";
                    break;
                case "emptyCardPhone":
                    return "Please enter your member card number or cell phone number";
                    break;
                case "isCard":
                    return "Member card number must be a numeric";
                    break;
                case "isPhone":
                    return "Phone number must be a numeric";
                    break;
                case "emptyCode":
                    return "Please enter your code";
                    break;
                case "isCode":
                    return "Please enter your code again";
                    break;
                case "unSuccess":
                    return "Sorry, we can not find this member number. Please contact customer service counter or hotline 6288.7722 for more information
                   .Wrong ID/cellphone number/ member card number";
                    break;
                    
            }
        }
	//function validate ID
	function checkId($String) {
		$errors = "";
		if (empty($String))
			$errors = $this->errors("emptyId");
                else{
                    ///[^0-9A-Za-z]/                   
                    if(preg_match('/[^0-9]/', $String)){
                        $errors = $this->errors("isId");
                    }
                }
		return $errors;
	}

	//function validate for Membercard and Phone
	function checkMemberCardPhone($memberCard, $phone) {
		$errors = "";
		if (empty($memberCard) && empty($phone)) {
			$errors["emptyCardPhone"] = $this->errors("emptyCardPhone");
		} else {
			/*if (!empty($memberCard) && empty($phone)) {
				if (preg_match('/[^0-9]/', $memberCard))
					$errors["card"] = $this->errors("isCard");
			}
			if (!empty($phone) && empty($memberCard)) {
				if (preg_match('/[^0-9]/', $phone))
					$errors["phone"] = $this->errors("isPhone");
			}
			if (!empty($phone) && !empty($memberCard)) {
				if (preg_match('/[^0-9]/', $phone))
					$errors["phone"] = $this->errors("isPhone");
				if (preg_match('/[^0-9]/', $memberCard))
					$errors["card"] = $this->errors("isCard");
			}*/
                        if (!empty($memberCard)) {
				if (preg_match('/[^0-9]/', $memberCard))
					$errors["card"] = $this->errors("isCard");
			}
                        if (!empty($phone)) {
				if (preg_match('/[^0-9]/', $phone))
					$errors["phone"] = $this->errors("isPhone");
			}
                        
		}
		return $errors;
	}

	///////////////////////////////////////////////////////////////////////
	//function validate for code apatcha
	function checkCode($String) {
		$errors = "";
		if (empty($String)) {
			$errors = $this->errors("emptyCode");
		} else {
			if ($String != $_SESSION["vercode"] OR $_SESSION["vercode"] == '') {
				$errors = $this->errors("isCode");
			}
		}
		return $errors;
	}
	//function check not empty for all field
	function notEmptyAll($str1, $str2, $str3) {
		if (empty($str1) && empty($str2) && empty($str3))
			return true;
		return false;
	}	

}
?>
