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
		$this->db_login=$this->db;
	}

	/*public function login($email,$pass){
		$pas=sha1($pass);
		$sql=$this->db_login->prepare("SELECT * FROM user WHERE email=? AND pass=?");
		$sql->execute(array($email,$pas));
		if ($sql->rowCount()==1) {
			foreach ($sql as $key ) {
				if ($key['role_id']==1) {
					# code...
					$_SESSION['id_gov']==$key['id_gov'];
					$_SESSION['email']==$key['email'];
					$_SESSION['password']==$key['pass'];
					header("location:studebt/index.php");
				}
			}
		}
		else{
			header("location:login.php?msg=".$pas."");
		}
	}*/

	public function Login($email,$pass){
		$pas=sha1('uhb'.$pass);
		$sql=$this->db_login->prepare("SELECT * FROM user WHERE email=? AND pass=?");
		//$sql->execute(array($email,$pas));
		//	echo $sql->rowCount();
		if($sql->execute(array($email,$pas))){
			echo $sql->rowCount();
			if($sql->rowCount()==1){
				foreach ($sql as $key ) {
					# code...
					if ($key['role_id']==1) {
					# code...
					$_SESSION['id_gov']=$key['id_gov'];
					$_SESSION['email']=$key['email'];
					$_SESSION['password']=$key['pass'];
					$_SESSION['role']=$key['role_id'];
					header("location:student/index.php");
				}

				}
			}
			else{
				echo "error2";
			}

		}
		else{
			echo("er1");
		}
	}
}