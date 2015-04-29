<?php
	require_once 'libs/func.php';
	
	$game = new SimpleSoap('http://footballpool.dataaccess.eu/data/info.wso?WSDL');
	$game->allGames();
	$data = $game->getData();
	
	if (isset($_POST['send']))
	{
		$curr = new SoapClient('http://www.webservicex.net/CurrencyConvertor.asmx?WSDL');
		$arr = array('FromCurrency' => $_POST['from'], 'ToCurrency' => $_POST['to']);
		$rez = $curr->ConversionRate($arr);
		$val = $_POST['from'] . '/' . $_POST['to'] . ' = ' . $rez->ConversionRateResult;
	}
	
	require_once 'templates/index_soap.php';
?>