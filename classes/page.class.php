<?php

class Page
{
	public function get_page()
	{
		if(isset($_GET['page']))
		{
			$page = $_GET['page'];
			return $page;	
		}
		
		else
		{
			$page = 'home';
			return $page;	
		}	
	}	
}

?>