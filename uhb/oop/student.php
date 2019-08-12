<?php
require "DB.php";
/**
 * 
 */
class StudentReq extends Db 
{
	private $dbs;
	function __construct($user,$pass)
	{
		# code...
		parent::__construct($user,$pass);
		$this->dbs=$this->db;
	}

	public function register ($user,$pass,$id){
		$data=date("YYYY-MM-DD");
		$sql=$this->dbs->prepare("INSERT INTO user(email,pass,id_gov,role_id,reg_data)VALUES(?,?,?,?,?)");
		if ($sql->execute(array($user,$pass,$id,'1',$data))) {
			# code...
			header("location:login.php");
		}
		else{
			echo("ss");
		}
	}

	
}