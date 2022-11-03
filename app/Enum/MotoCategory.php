<?php
namespace App\Enum;

use App\Enum\EnumBase;
/**
 * MotoCategory Enum
 *
 * @author Chau.Duc
 * Date: 12/19/2014
 * Time: 9:44 AM
 */

class MotoCategory extends EnumBase{

	const
		GENCHARI = "{\"code\": \"1\", \"name\": \"原付スクーター(〜50cc)\", \"colmn\": \"model_genchari\", \"type\": \"1\", \"category_model_flag\": \"1\", \"char_code\": \"gentsuki\", \"priority\": \"0\"}"
	,   SCOOTER = "{\"code\": \"2\", \"name\": \"スクーター(51cc〜125cc)\", \"colmn\": \"model_scooter\", \"type\": \"1\", \"category_model_flag\": \"1\", \"char_code\": \"scooter\", \"priority\": \"1\"}"
	,   BIG_SCOOTER = "{\"code\": \"3\", \"name\": \"ビッグスクーター(126cc〜)\", \"colmn\": \"model_big_scooter\", \"type\": \"1\", \"category_model_flag\": \"1\", \"char_code\": \"bigscooter\", \"priority\": \"2\"}"
	,   MINI_BIKE = "{\"code\": \"4\", \"name\": \"ミニバイク(〜125cc MT)\", \"colmn\": \"model_mini_bike\", \"type\": \"1\", \"category_model_flag\": \"1\", \"char_code\": \"minibike\", \"priority\": \"3\"}"
	,   STREET = "{\"code\": \"5\", \"name\": \"ストリート\", \"colmn\": \"model_street\", \"type\": \"1\", \"category_model_flag\": \"1\", \"char_code\": \"street\", \"priority\": \"4\"}"
	,   CLASSIC = "{\"code\": \"6\", \"name\": \"クラシックタイプ\", \"colmn\": \"model_classic\", \"type\": \"1\", \"category_model_flag\": \"1\", \"char_code\": \"classic\", \"priority\": \"5\"}"
	,   NAKED = "{\"code\": \"7\", \"name\": \"ネイキッド\", \"colmn\": \"model_naked\", \"type\": \"1\", \"category_model_flag\": \"1\", \"char_code\": \"naked\", \"priority\": \"6\"}"
	,   REPLICA = "{\"code\": \"8\", \"name\": \"スーパースポーツ/レプリカ\", \"colmn\": \"model_replica\", \"type\": \"1\", \"category_model_flag\": \"1\", \"char_code\": \"replica\", \"priority\": \"7\"}"
	,   TOURER = "{\"code\": \"9\", \"name\": \"ツアラー\", \"colmn\": \"model_tourer\", \"type\": \"1\", \"category_model_flag\": \"1\", \"char_code\": \"tourer\", \"priority\": \"8\"}"
	,   AMERICAN = "{\"code\": \"10\", \"name\": \"アメリカン/クルーザー\", \"colmn\": \"model_american\", \"type\": \"1\", \"category_model_flag\": \"1\", \"char_code\": \"american\", \"priority\": \"9\"}"
	,   OFF_ROAD = "{\"code\": \"11\", \"name\": \"オフロード/モタード\", \"colmn\": \"model_off_road\", \"type\": \"1\", \"category_model_flag\": \"1\", \"char_code\": \"offroad\", \"priority\": \"10\"}"
	,   IMPORT = "{\"code\": \"12\", \"name\": \"海外メーカー\", \"colmn\": \"model_import\", \"type\": \"1\", \"category_model_flag\": \"1\", \"char_code\": \"import\", \"priority\": \"11\"}"
	,   BUSINESS_BIKE = "{\"code\": \"13\", \"name\": \"ビジネスバイク\", \"colmn\": \"model_business_bike\", \"type\": \"1\", \"category_model_flag\": \"1\", \"char_code\": \"businessbike\", \"priority\": \"12\"}"
	,   COMPETITION = "{\"code\": \"14\", \"name\": \"レーサー/競技用\", \"colmn\": \"model_competition\", \"type\": \"1\", \"category_model_flag\": \"1\", \"char_code\": \"competition\", \"priority\": \"13\"}"
	,   EV = "{\"code\": \"15\", \"name\": \"電動バイク/ATV\", \"colmn\": \"model_ev\", \"type\": \"1\", \"category_model_flag\": \"1\", \"char_code\": \"ev\", \"priority\": \"14\"}"
	,   FOUR_MINI = "{\"code\": \"1\", \"name\": \"4stミニ／ミニモト\", \"colmn\": \"model_4mini\", \"type\": \"2\", \"category_model_flag\": \"1\", \"char_code\": \"4mini\", \"priority\": \"15\"}"
	,   ZEPPAN1 = "{\"code\": \"2\", \"name\": \"絶版名車(〜1979年)\", \"colmn\": \"model_zeppan1\", \"type\": \"2\", \"category_model_flag\": \"1\", \"char_code\": \"kyusya1979\", \"priority\": \"16\"}"
	,   ZEPPAN2 = "{\"code\": \"3\", \"name\": \"絶版名車(1980年〜)\", \"colmn\": \"model_zeppan2\", \"type\": \"2\", \"category_model_flag\": \"1\", \"char_code\": \"kyusya1980\", \"priority\": \"17\"}"
	,   VINTAGE = "{\"code\": \"4\", \"name\": \"ビンテージモトクロス\", \"colmn\": \"model_vintage\", \"type\": \"2\", \"category_model_flag\": \"1\", \"char_code\": \"vintagemx\", \"priority\": \"18\"}"
	,   DIRT = "{\"code\": \"5\", \"name\": \"ダートトラック\", \"colmn\": \"model_dirt\", \"type\": \"2\", \"category_model_flag\": \"1\", \"char_code\": \"dirttrack\", \"priority\": \"19\"}"
	,   TRIAL = "{\"code\": \"6\", \"name\": \"トライアル\", \"colmn\": \"model_trial\", \"type\": \"2\", \"category_model_flag\": \"1\", \"char_code\": \"trial\", \"priority\": \"21\"}"
	,   STREET_FIGHTER = "{\"code\": \"7\", \"name\": \"ストリートファイター\", \"colmn\": \"model_street_fighter\", \"type\": \"2\", \"category_model_flag\": \"1\", \"char_code\": \"streetfighter\", \"priority\": \"22\"}"
	,   CAFE_RACER = "{\"code\": \"8\", \"name\": \"カフェレーサー\", \"colmn\": \"model_cafe_racer\", \"type\": \"2\", \"category_model_flag\": \"0\", \"char_code\": \"caferacer\", \"priority\": \"23\"}"
	,   LOWRIDER = "{\"code\": \"9\", \"name\": \"ローライダー／チョッパー\", \"colmn\": \"model_lowrider\", \"type\": \"2\", \"category_model_flag\": \"0\", \"char_code\": \"chopper\", \"priority\": \"24\"}"
	,   NEW_SCHOOL = "{\"code\": \"10\", \"name\": \"ニュースクール／ウォンウォン系\", \"colmn\": \"model_new_school\", \"type\": \"2\", \"category_model_flag\": \"0\", \"char_code\": \"newschool\", \"priority\": \"25\"}"
	,   TRIKE = "{\"code\": \"11\", \"name\": \"トライク／サイドカー\", \"colmn\": \"model_trike\", \"type\": \"2\", \"category_model_flag\": \"0\", \"char_code\": \"trike\", \"priority\": \"26\"}"
	,   FULL_CUSTOM = "{\"code\": \"12\", \"name\": \"ビルド／フルカスタム\", \"colmn\": \"model_full_custom\", \"type\": \"2\", \"category_model_flag\": \"0\", \"char_code\": \"complete\", \"priority\": \"27\"}"
	,   ADVENTURE = "{\"code\": \"13\", \"name\": \"アドベンチャー／ビッグオフ\", \"colmn\": \"model_adventure\", \"type\": \"2\", \"category_model_flag\": \"1\", \"char_code\": \"adventure\", \"priority\": \"20\"}"
	;

	const CATEGORY_TYPE_TEIBAN = 1;
	const CATEGORY_TYPE_KODAWARI = 2;

	/**
	 * get code by char_code
	 * @param $char_code
	 * @param $type
	 * @return $code
	 */
	public static function getCodeFromCharCode($char_code, $type){
		$rs = '';
		if(empty($char_code)){
			return $rs;
		}
		$values = self::getValues();
		foreach($values as $value){
			if(strcasecmp($value['char_code'], $char_code) == 0 && strcasecmp($value['type'], $type) == 0){
				$rs =  $value['code'];
				break;
			}
		}
		return $rs;
	}

	/**
	 * get category by code
	 * @param $code
	 * @param $type
	 * @return mixed
	 */
	public static function getMotoCategory($code, $type){
		$rs = '';
		if(empty($code)){
			return $rs;
		}
		$values = self::getValues();
		foreach($values as $value){
			if(strcasecmp($value['code'], $code) == 0 && strcasecmp($value['type'], $type) == 0){
				$rs =  $value;
				break;
			}
		}
		return $rs;
	}

	/**
	 * check category for model page.
	 * @param $code
	 * @param $type
	 * @return mixed
	 */
	public static function isCategoryModel($code, $type){
		$rs = true;
		if(empty($code)){
			$rs = false;
		}
		$category = self::getMotoCategory($code,$type);
		if(!$category){
			$rs =  false;
		}
		if($category['category_model_flag'] == 0){
			$rs =  false;
		}
		return $rs;
	}

} 