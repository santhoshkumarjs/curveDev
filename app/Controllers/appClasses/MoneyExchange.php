<?php
namespace app\controllers\appClasses;


use app\constent\CurveConstent as CurveConstent;
use app\utility\CommonUtility as Utility;

class MoneyExchange{

	// hold the instance of current class
	private static $exchangeInstance = null;
	private static $from_exchange_currency_type = CurveConstent::CURRENCY_TRANSFER_FROM; // CURRENCY TYPE FOR MONEY TRANSFER FROM EX: EUR
	private static $to_exchange_currency_type = CurveConstent::CURRENCY_TRANSFER_TO; // CURRENCY TYPE FOR MONEY TRANSFER TO EX: USD

	private function __constructor(){
		// CONSTRUCTOR BLOCK
	}

	// Object will be created within this class itself, only if the class has no instance
	public static function getExchangeInstance(){
		if(self::$exchangeInstance == null){
			self::$exchangeInstance = new MoneyExchange();
		}
		return self::$exchangeInstance;
	}

   /*
     This method return euro currency value based on params,
     $apiType: string 
   */
	public function getEuroCurrencyValue($apiType='latest'){ 
		if($apiType == 'lastWeek'){
			$date = date("Y-m-d", strtotime("-7 days"));
		}else{
			$date = date('Y-m-d');
		}
		$url = str_ireplace('{_DATE_}', $date, CurveConstent::HISTORICAL_API_URL);
		$latestExchangeEuroValue    = Utility::callAPI($url, ['base' => self::$to_exchange_currency_type,'symbols'=>self::$from_exchange_currency_type]);
		if($latestExchangeEuroValue != ''){
			$latestExchangeArrayResponse = json_decode($latestExchangeEuroValue, true);
			return Utility::fetch($latestExchangeArrayResponse, array('rates', self::$from_exchange_currency_type), 0) ?? null;
		}else{
			return '';
		}
	}

	/*
     This method return boolean value, to check latest euro value and one week before euro value,
     $latesVal: float
     $oldVal: float
    */
	public function isGoodTimeToExchange($latestVal, $oldVal){
		if($latestVal != '' && $oldVal != ''){
			return ($latestVal > $oldVal) ? true : false;
		}else{
			return false;
		}
	}

   /*
   	Destroy the instance
   */
	public function destroyInstance(){
		self::$exchangeInstance = NULL;
		self::$from_exchange_currency_type = NULL;
		self::$to_exchange_currency_type = NULL;
	}

	public function __destruct(){
		// DESTRUCT STUFF HERE
	}
}

?>
