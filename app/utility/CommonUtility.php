<?php
namespace app\utility;

class CommonUtility{

	public static function fetch($arrayContainer, $keys, $defaultValue = null, $trim = false){
		$v = $defaultValue;
		if(is_array($keys) && count($keys) > 0){
			$ref = $arrayContainer;
			$found = false;
			foreach($keys as $key){
				if(isset($ref[$key])){
					$found = true;
					$ref = $ref[$key];
				}else{
					$found = false;
					break;
				}
			}
			if($found){
				if(!empty($ref) || $href != ''){
					$v = $ref;
				}
			}
		}else{
			$key = trim($keys);
			$v = (isset($arrayContainer[$key]) && !empty($arrayContainer[$key]) && (is_null($arrayContainer[$key]) === false)) ? $arrayContainer[$key] : $defaultValue;
		}
		return $v !== null ? $trim ? trim($v) : $v : null;
	}
	public static function callAPI($url, $data, $method=''){
		$curl = curl_init();
		switch ($method){
			case "POST":
				curl_setopt($curl, CURLOPT_POST, 1);
				if ($data)
					curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			break;
			case "PUT":
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
				if ($data)
					curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
			break;
			default:
				if ($data)
					$url = sprintf("%s?%s", $url, http_build_query($data));
		}
		// OPTIONS:
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
		));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		// EXECUTE:
		$result = curl_exec($curl);
		if(!$result){die("Connection Failure");}
		curl_close($curl);
		return $result;
	}
}

?>