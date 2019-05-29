<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET,POST,PUT');
    header('Access-Control-Allow-Headers: X-Requested-With,Content-Type');
    header('Content-Type: text/html; charset=utf-8');
	function Negotiation($json_data){

		$Key = $json_data['Keying_Algorithm'];
		$Hashed = $json_data['Hashing_Algorithm'];
		$E_Key = "RSA";
		$E_Hash = "SHA-256";
		$Challenge_Message = "password";

		//$confirm = 1;
		//$str = strcmp($Key,$H_key);
		if($Key==$E_Key && $Hashed==$E_Hash){
			$confirm = 1;
		}else{
			$confirm = 0;
		}
/*
		if(confirm == 1){
			$str_1 = strcmp($Hashed,$H_Hash);
			if($str_1){
				$confirm = 0;
			}
			else{
				$confirm = 1;
			}
		}
*/
		$Negotiation = array(
   		 'confirm'=>$confirm,
   		 'Challenge_Message'=>$Challenge_Message,
		);
		echo json_encode($Negotiation);
	}
?>
