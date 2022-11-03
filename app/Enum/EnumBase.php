<?php
namespace App\Enum;

use ReflectionClass;

/**
 * Base Enum
 *
 * Base method used for all Enum.
 *
 * @author Chau.Duc
 * Date: 12/19/2014
 * Time: 9:31 AM
 */

abstract class EnumBase {

	/**
	 * Caching enum by map
	 * @var array
	 */
	public static $constCache = array();

	/**
	 * get all key
	 * @return array|null
	 */
	private static function getConstants() {
		$reflect = new ReflectionClass(get_called_class());
		self::$constCache[get_called_class()] = $reflect->getConstants();
		return self::$constCache[get_called_class()];
	}

	/**
	 * check valid name
	 * @param $name
	 * @param bool $strict
	 * @return bool
	 */
	public static function isValidName($name, $strict = false) {
		$constants = self::getConstants();

		if ($strict) {
			return array_key_exists($name, $constants);
		}

		$keys = array_map('strtolower', array_keys($constants));
		return in_array(strtolower($name), $keys);
	}

	/**
	 * Check valid value
	 * @param $value
	 * @return bool
	 */
	public static function isValidValue($value) {
		$values = array_values(self::getConstants());
		return in_array($value, $values, $strict = true);
	}

	/**
	 * get Enum from Name
	 * @param $name
	 * @return mixed
	 */
	public static function fromKey($key){
		//get all const of class
		$constants = self::getConstants();
		foreach($constants as $constant=>$item){

			if($constant == $key){
				//covert value to json object
				return json_decode($item);
			}
		}
	}

	/**
	 * get all value
	 * @return array
	 */
	public static function getValues(){
		$values = array_values(self::getConstants());
		$result = array();
		foreach ($values as $value){

			//covert value to json object
			$result[] = json_decode($value,true);
		}
		return $result;
	}

	/**
	 * get all name
	 * @return array
	 */
	public static function getKeys(){
		$keys = array_keys(self::getConstants());
		return $keys;
	}

	/**
	 * get name value map
	 */
	public static function getAllKeysAndValues(){
		$keys = array_keys(self::getConstants());

		//result
		$result = array();

		foreach($keys as $key){
			$value = self::fromKey($key);
			$result[$key] = $value;
		}
		return $result;
	}

	/**
	 * get value from const
	 */
	public static function fromEnum($enum){
		//parse to json
		return json_decode($enum);

	}
} 