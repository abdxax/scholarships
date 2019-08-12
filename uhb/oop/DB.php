<?php

/**
 * 
 */
class Db 
{
	protected $db;
	function __construct($user,$pass)
	{
		
		# code...
		$this->db=new PDO("mysql:host=localhost;dbname=scholarships",$user,$pass);
		//echo"ss";
	}

	
}