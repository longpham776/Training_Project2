<?php
namespace App\Enum;

use App\Enum\EnumBase;
/**
 * MotoDisplacement Enum
 *
 * @author Chau.Duc
 * Date: 12/19/2014
 * Time: 9:27 AM
 */

class MotoDisplacement extends EnumBase{

	const
		D1 = "{\"no\": \"1\", \"name\": \"50cc未満\", \"title\": \"原付\", \"key\": \"0_50\", \"code\": \"1\", \"from\": \"0\", \"to\": \"50\"}"
	,   D2 = "{\"no\": \"2\", \"name\": \"51 - 125cc\", \"title\": \"原付二種\", \"key\": \"51_125\", \"code\": \"2\", \"from\": \"51\", \"to\": \"125\"}"
	,   D3 = "{\"no\": \"3\", \"name\": \"126 - 250cc\", \"title\": \"中型バイク(～ 250cc)\", \"key\": \"126_250\", \"code\": \"3\", \"from\": \"126\", \"to\": \"250\"}"
	,   D4 = "{\"no\": \"4\", \"name\": \"251 - 400cc\", \"title\": \"中型バイク(～400cc)\", \"key\": \"251_400\", \"code\": \"4\", \"from\": \"251\", \"to\": \"400\"}"
	,   D5 = "{\"no\": \"5\", \"name\": \"401 - 750cc\", \"title\": \"大型バイク(～750cc)\", \"key\": \"401_750\", \"code\": \"5\", \"from\": \"401\", \"to\": \"750\"}"
	,   D6 = "{\"no\": \"6\", \"name\": \"751 - 1000cc\", \"title\": \"大型バイク(～1000cc)\", \"key\": \"751_1000\", \"code\": \"6\", \"from\": \"751\", \"to\": \"1000\"}"
	,   D7 = "{\"no\": \"7\", \"name\": \"1001cc以上\", \"title\": \"大型バイク(1000cc以上)\", \"key\": \"1001_99999\", \"code\": \"7\", \"from\": \"1001\", \"to\": \"99999\"}"
	;

	/**
	 * get displacement by key
	 * @param $key
	 * @return mixed
	 */
	public static function getMotoDisplacementByKey($key){
		$rs = '';
		if(empty($key)){
			return $rs;
		}
		$values = self::getValues();
		foreach($values as $value){
			if(strcasecmp($value['key'],$key) == 0){
				$rs = $value;
			}
		}
		return $rs;
	}

} 