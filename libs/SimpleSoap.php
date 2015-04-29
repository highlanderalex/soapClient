<?php
	class SimpleSoap
	{
		private $str = '';
		private $obj;
		private $result;
		
		public function __construct($http)
		{
			$this->obj = new SoapClient($http);
		}
		
		public function allGames()
		{
			$this->result = $this->obj->AllGames();
			$this->parseResult();
			
		}
		
		private function parseResult()
		{
			foreach($this->result->AllGamesResult->tGameInfo as $item)
			{
				$this->str .= '<tr><td>' . $item->sDescription . '<br />' . $item->dPlayDate . '<br />' . $item->tPlayTime . '</td>';
				$this->str .= '<td>' . $item->StadiumInfo->sStadiumName . '<br />' . $item->StadiumInfo->iSeatsCapacity . '<br />' . 
							  $item->StadiumInfo->sCityName . '<br /><a href="#" onclick="_open(\'' . $item->StadiumInfo->sGoogleMapsURL . '\', 700, 600); return false;">GoogleMap</a></td>';
				$this->str .= '<td>' . $item->Team1->sName . '<br /><img src="' . $item->Team1->sCountryFlagLarge . '"></td>';
				$this->str .= '<td>' . $item->Team2->sName . '<br /><img src="' . $item->Team2->sCountryFlagLarge . '"></td>';
				$this->str .= '<td><h2>' . $item->sScore . '</h2></td>';
			}
		}
		
		public function getData()
		{
			return $this->str;
		}
	}