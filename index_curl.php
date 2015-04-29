<?php
	require_once 'libs/func.php';

    $ch = curl_init('http://footballpool.dataaccess.eu/data/info.wso/Teams/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $str = simplexml_load_string(curl_exec($ch));
    curl_close($ch);
    $data = '';
    foreach($str->tTeamInfo as $item)
    {
        $data .= '<tr><td>' . $item->sName . '</td>';
        $data .= '<td><a href="' . $item->sWikipediaURL . '">InfoWikipedia</a></td>';
        $data .= '<td><img src="' . $item->sCountryFlagLarge . '"></td></tr>';
    }    
    
    if (isset($_POST['send']))
	{
        $curr = curl_init('http://www.webservicex.net/CurrencyConvertor.asmx/ConversionRate?FromCurrency=' .
            $_POST['from'] . '&ToCurrency=' . $_POST['to']);
         curl_setopt($curr, CURLOPT_RETURNTRANSFER, true);
        $rez = curl_exec($curr);
 		$val = $_POST['from'] . '/' . $_POST['to'] . ' = ' . $rez;
	}
	
	require_once 'templates/index_curl.php';
?>
