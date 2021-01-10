<?php
namespace app\constent;

class CurveConstent{
	const DEFAULT_CURRENCY		 = 'EUR';
	const CURRENCY_TRANSFER_FROM = 'EUR';
	const CURRENCY_TRANSFER_TO   = 'USD';
	const LATEST_API_URL         = 'https://api.exchangeratesapi.io/latest';
	const HISTORY_API_URL        = 'https://api.exchangeratesapi.io/history';
	const HISTORICAL_API_URL     = 'https://api.exchangeratesapi.io/{_DATE_}';
}
?>