<?php
  require_once "vendor/autoload.php";


  $exchangeObj = \app\Controllers\appClasses\MoneyExchange::getExchangeInstance();
  $latestEuroValue = $exchangeObj->getEuroCurrencyValue();
  $latestWeekEuroValue = $exchangeObj->getEuroCurrencyValue('lastWeek');
  if($exchangeObj->isGoodTimeToExchange($latestEuroValue,$latestWeekEuroValue)){
  	echo " Yes! it is good time to exchange your money";
  }else{
  	echo " No! it is not good time to exchange your money";
  }
  $exchangeObj->destroyInstance(); // make the currenct instance as null

?>