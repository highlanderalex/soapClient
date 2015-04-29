<?php
		/* __autoload function
            * *
            * *
            * * @param string: param string name of class
            * * @return: Retutn void
            * */
			
		function __autoload($class)
		{
			if (file_exists('libs/'.$class.'.php') ) 
			{
				require_once ('libs/'.$class.'.php');
			}
		}
		
		