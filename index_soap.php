<?php
	require_once 'config.php';
	require_once 'libs/func.php';

	$game = new SimpleSoap(WS_FOOTBALL);
	$game->allGames();
	$data = $game->getData();
	
	if (isset($_POST['send']))
	{
		$curr = new SimpleSoap(WS_CURRENCY);
		$arr = array('FromCurrency' => $_POST['from'], 'ToCurrency' => $_POST['to']);
		$curr->convertCurr($arr);
		$val = $_POST['from'] . '/' . $_POST['to'] . ' = ' . $curr->getData();
	}
	
	require_once 'templates/index_soap.php';
?>