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
		$this->db=new PDO("mysql:host=localhost;dbname=scholarships",$user,$pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
		//echo"ss";
	}

	
}