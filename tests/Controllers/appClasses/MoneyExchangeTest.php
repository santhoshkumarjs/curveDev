<?php

class MoneyExchangeTest extends PHPUnit_Framework_TestCase{
	public function testgetEuroCurrencyValue(){
		$monyObj = app\Controllers\appClasses\MoneyExchange::getExchangeInstance();
		$this->assertEquals('0.8163265306',$monyObj->getEuroCurrencyValue('latest'));
	}
}
?>