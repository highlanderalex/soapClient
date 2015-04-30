<?php
	require_once 'config.php';
	require_once 'libs/func.php';

    $meth = '/Teams/';
	$http = CURL_FOOTBALL . $meth;
	
	$game = new SimpleCurl($http);
    $game->teams();
    $data = $game->getData();
    
    if (isset($_POST['send']))
	{
        $param = '/ConversionRate?FromCurrency=' . $_POST['from'] . '&ToCurrency=' . $_POST['to'];
		$http = CURL_CURRENCY . $param;
		$curr = new SimpleCurl($http);
		$curr->currency();
 		$val = $_POST['from'] . '/' . $_POST['to'] . ' = ' . $curr->getData();
	}
	
	require_once 'templates/index_curl.php';
?>
