<?php
	header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.csv');

        // create a file pointer connected to the output stream
        $output = fopen('php://output', 'w');
        header("Expires: 0");
	
	$header = array("MEMBER_NO","ID_PASSPORT","MEMBER_NAME","GENDER","ADD_NO","WARD","STREET","DISTRICT","PROVINCE","HOME_PHONE",
									"MOBILE_PHONE","EARNED_PTS","REDEEM_PTS","EXPIRED_PTS","BAL_PTS","CREATE_AT","ERRORS");
	fputcsv($output,$header);
	/*foreach ($content as $i){	
		fputcsv($csv,$data);
	}*/
	
?>