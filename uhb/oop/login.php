<?php
require "DB.php";

/**
 * 
 */
class Login extends Db
{

	private $db_login ;

	function __construct($user,$pass)
	{
		# code...
		parent::__construct($user,$pass);
		$this->dbs=$this->db;
	}

	public function login($email,$pass){
		$sql="SELECT * FROM user WHERE email=? AND pass=?";
	}
}