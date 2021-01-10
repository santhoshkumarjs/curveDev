<?php

class MoneyExchangeTest extends PHPUnit_Framework_TestCase{
	public function testgetEuroCurrencyValue(){
		$monyObj = app\Controllers\appClasses\MoneyExchange::getExchangeInstance();
		$this->assertTrue($monyObj->getEuroCurrencyValue('latest') == '0.8163265306');
	}

	public function testisGoodTimeToExchange(){
		$monyObj = app\Controllers\appClasses\MoneyExchange::getExchangeInstance();
		$this->assertTrue($monyObj->isGoodTimeToExchange('0.8163265306','0.8173265306') == false);
	}
}
?>