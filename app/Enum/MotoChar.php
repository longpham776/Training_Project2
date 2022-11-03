<?php
namespace App\Enum;

use App\Enum\EnumBase;
/**
 * MotoChar Enum
 *
 * @author Chau.Duc
 * Date: 12/19/2014
 * Time: 9:35 AM
 */

class MotoChar extends EnumBase{

	const
		JA = "{\"no\": \"1\", \"name\": \"ア行\", \"key\": \"JA\", \"code\": \"ア\", \"type\": \"1\"}"
	,   JK = "{\"no\": \"2\", \"name\": \"カ行\", \"key\": \"JK\", \"code\": \"カ\", \"type\": \"1\"}"
	,   JS = "{\"no\": \"3\", \"name\": \"サ行\", \"key\": \"JS\", \"code\": \"サ\", \"type\": \"1\"}"
	,   JT = "{\"no\": \"4\", \"name\": \"タ行\", \"key\": \"JT\", \"code\": \"タ\", \"type\": \"1\"}"
	,   JN = "{\"no\": \"5\", \"name\": \"ナ行\", \"key\": \"JN\", \"code\": \"ナ\", \"type\": \"1\"}"
	,   JH = "{\"no\": \"6\", \"name\": \"ハ行\", \"key\": \"JH\", \"code\": \"ハ\", \"type\": \"1\"}"
	,   JM = "{\"no\": \"7\", \"name\": \"マ行\", \"key\": \"JM\", \"code\": \"マ\", \"type\": \"1\"}"
	,   JY = "{\"no\": \"8\", \"name\": \"ヤ行\", \"key\": \"JY\", \"code\": \"ヤ\", \"type\": \"1\"}"
	,   JR = "{\"no\": \"9\", \"name\": \"ラ行\", \"key\": \"JR\", \"code\": \"ラ\", \"type\": \"1\"}"
	,   JW = "{\"no\": \"10\", \"name\": \"ワ行\", \"key\": \"JW\", \"code\": \"ワ\", \"type\": \"1\"}"

	,   EA = "{\"no\": \"1\", \"name\": \"A\", \"key\": \"EA\", \"code\": \"A\", \"type\": \"2\"}"
	,   EB = "{\"no\": \"2\", \"name\": \"B\", \"key\": \"EB\", \"code\": \"B\", \"type\": \"2\"}"
	,   EC = "{\"no\": \"3\", \"name\": \"C\", \"key\": \"EC\", \"code\": \"C\", \"type\": \"2\"}"
	,   ED = "{\"no\": \"4\", \"name\": \"D\", \"key\": \"ED\", \"code\": \"D\", \"type\": \"2\"}"
	,   EE = "{\"no\": \"5\", \"name\": \"E\", \"key\": \"EE\", \"code\": \"E\", \"type\": \"2\"}"
	,   EF = "{\"no\": \"6\", \"name\": \"F\", \"key\": \"EF\", \"code\": \"F\", \"type\": \"2\"}"
	,   EG = "{\"no\": \"7\", \"name\": \"G\", \"key\": \"EG\", \"code\": \"G\", \"type\": \"2\"}"
	,   EH = "{\"no\": \"8\", \"name\": \"H\", \"key\": \"EH\", \"code\": \"H\", \"type\": \"2\"}"
	,   EI = "{\"no\": \"9\", \"name\": \"I\", \"key\": \"EI\", \"code\": \"I\", \"type\": \"2\"}"
	,   EJ = "{\"no\": \"10\", \"name\": \"J\", \"key\": \"EJ\", \"code\": \"J\", \"type\": \"2\"}"
	,   EK = "{\"no\": \"11\", \"name\": \"K\", \"key\": \"EK\", \"code\": \"K\", \"type\": \"2\"}"
	,   EL = "{\"no\": \"12\", \"name\": \"L\", \"key\": \"EL\", \"code\": \"L\", \"type\": \"2\"}"
	,   EM = "{\"no\": \"13\", \"name\": \"M\", \"key\": \"EM\", \"code\": \"M\", \"type\": \"2\"}"
	,   EN = "{\"no\": \"14\", \"name\": \"N\", \"key\": \"EN\", \"code\": \"N\", \"type\": \"2\"}"
	,   EO = "{\"no\": \"15\", \"name\": \"O\", \"key\": \"EO\", \"code\": \"O\", \"type\": \"2\"}"
	,   EP = "{\"no\": \"16\", \"name\": \"P\", \"key\": \"EP\", \"code\": \"P\", \"type\": \"2\"}"
	,   EQ = "{\"no\": \"17\", \"name\": \"Q\", \"key\": \"EQ\", \"code\": \"Q\", \"type\": \"2\"}"
	,   ER = "{\"no\": \"18\", \"name\": \"R\", \"key\": \"ER\", \"code\": \"R\", \"type\": \"2\"}"
	,   ES = "{\"no\": \"19\", \"name\": \"S\", \"key\": \"ES\", \"code\": \"S\", \"type\": \"2\"}"
	,   ET = "{\"no\": \"20\", \"name\": \"T\", \"key\": \"ET\", \"code\": \"T\", \"type\": \"2\"}"
	,   EU = "{\"no\": \"21\", \"name\": \"U\", \"key\": \"EU\", \"code\": \"U\", \"type\": \"2\"}"
	,   EV = "{\"no\": \"22\", \"name\": \"V\", \"key\": \"EV\", \"code\": \"V\", \"type\": \"2\"}"
	,   EW = "{\"no\": \"23\", \"name\": \"W\", \"key\": \"EW\", \"code\": \"W\", \"type\": \"2\"}"
	,   EX = "{\"no\": \"24\", \"name\": \"X\", \"key\": \"EX\", \"code\": \"X\", \"type\": \"2\"}"
	,   EY = "{\"no\": \"25\", \"name\": \"Y\", \"key\": \"EY\", \"code\": \"Y\", \"type\": \"2\"}"
	,   EZ = "{\"no\": \"26\", \"name\": \"Z\", \"key\": \"EZ\", \"code\": \"Z\", \"type\": \"2\"}"
	,   E0 = "{\"no\": \"27\", \"name\": \"数字\", \"key\": \"E0\", \"code\": \"0\", \"type\": \"2\"}"
	;

	/**
	 * get code by key
	 * @param key
	 * @return code
	 */
	public static function getCodeByKey($key){
		$rs ='';
		if(empty($key)){
			return $rs;
		}
		$values = self::getValues();
		foreach($values as $value){
			if(strcasecmp($value['key'],$key) == 0){
				$rs = $value['code'];
			}
		}
		return $rs;
	}

} 