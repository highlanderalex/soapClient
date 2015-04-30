<?php
	class SimpleCurl
	{
		private $str = '';
		private $obj;
		private $result;
		
		public function __construct($http)
		{
			$this->obj = curl_init($http);
			curl_setopt($this->obj, CURLOPT_RETURNTRANSFER, true);
		}
		
		public function __destruct()
		{
			curl_close($this->obj);
		}
		
		public function teams()
		{
			$this->parseResult();
		}
		
		public function currency()
		{
			$this->str = curl_exec($this->obj);
		}
		
		private function parseResult()
		{
			$this->result = simplexml_load_string(curl_exec($this->obj));
			foreach($this->result->tTeamInfo as $item)
			{
				$this->str .= '<tr><td>' . $item->sName . '</td>';
				$this->str .= '<td><a href="' . $item->sWikipediaURL . '">InfoWikipedia</a></td>';
				$this->str .= '<td><img src="' . $item->sCountryFlagLarge . '"></td></tr>';
			}    
		}
		
		public function getData()
		{
			return $this->str;
		}
	}