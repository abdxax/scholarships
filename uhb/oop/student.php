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

	public function register ($user,$pass,$id,$q_type,$mark,$name_ar,$name_en,$pass_gov){
		$data=date("YYYY-MM-DD");
		$sql=$this->dbs->prepare("INSERT INTO user(email,pass,id_gov,role_id,reg_data)VALUES(?,?,?,?,?)");
		if ($sql->execute(array($user,$pass,$id,'1',$data))) {
			# code...
			$sql_qu=$this->dbs->prepare("INSERT INTO qualification(id_gov,type,mark)VALUES(?,?,?)");
			if ($sql_qu->execute(array($id,$q_type,$mark))) {
				# code...
				$sql_student_info=$this->dbs->prepare("INSERT INTO student_info(name_ar,name_en,id_giv,password_gov)VALUES(?,?,?,?)");
				if ($sql_student_info->execute(array($name_ar,$name_en,$id,$pass_gov))) {
					# code...
					$sql_oder_application=$this->dbs->prepare("INSERT INTO order_app (id_gov,status_application)VALUES(?,?)");
					if ($sql_oder_application->execute(array($id,"not"))) {
						# code...
						header("location:login.php");
					}
					else{
						echo"bbbbb4";
					}
					
				}
			}
			else{
				echo("sssss232323");
			}
			//$sql_info="INSERT INTO student_info (name_ar,name_en,id_giv,password_gov)"
			//header("location:login.php");
		}
		else{
			echo("ss");
		}
	}


	public function getQuafType(){
		$sql_type=$this->dbs->prepare("SELECT * FROM quaf_type");
		$sql_type->execute();
		return $sql_type;
	}

	public function getAllCountries (){
		$country=$this->dbs->prepare("SELECT * FROM countries");
		$country->execute();
		return $country;
	}

	public function getDataStudent($id){
		$sql_info=$this->dbs->prepare("SELECT * FROM student_info WHERE id_giv=?");
		$sql_info->execute(array($id));
		return $sql_info;
	}

	public function UpdatedInfo($gen,$nat_o,$nat_n,$br,$cb,$ccb,$mu,$s,$id){
		$sql_updated_info=$this->dbs->prepare("UPDATE student_info SET gander=?,nationality_org=?,nationality_now=?,Birthday=?,country_brith=?,city_brith=?,is_musl_from_brith=?,s_m=?,status=? WHERE id_giv=?");
		if($sql_updated_info->execute(array($gen,$nat_o,$nat_n,$br,$cb,$ccb,$mu,$s,"comp",$id))){
			$point=$this->getPoint($id);
			if($point==0){
				$sql_insert=$this->dbs->prepare("INSERT INTO `point` (id_gov,points) VALUES(?,?)");
				if ($sql_insert->execute(array($id,1))) {
					# code...
				}
				else{
                     $point++;
                     $sql_point=$this->dbs->prepare("UPDATE `point` SET points=?,WHERE id_gov=?");
                     if ($sql_point->execute(array($point,$id))) {
                     	# code...
                     }
				}
			}
			else{

			}

		}
	}

	public function getPoint($id){
		$sql_point=$this->dbs->prepare("SELECT * FROM `point` WHERE id_gov=?");
		$sql_point->execute(array($id));
		foreach ($sql_point as $key ) {
			# code...
			return (int)$key['points'];
		}
		return 0;
	}

	public function getStutasInfo($id){
		$sql_st=$this->dbs->prepare("SELECT * FROM student_info Where id_giv=?");
		$sql_st->execute(array($id));
		return $sql_st;
	}

	public function getQuafli($id){
		$sql_st=$this->dbs->prepare("SELECT * FROM qualification LEFT JOIN quaf_type ON qualification.type=quaf_type.q_id Where id_gov=?");
		$sql_st->execute(array($id));
		return $sql_st;
	}

	public function Updatedqua($id,$county,$great,$dat){
		$sql_upda=$this->dbs->prepare("UPDATE qualification SET country=?,great=?,dates=?,status=? WHERE id_gov=?");
		if ($sql_upda->execute(array($county,$great,$dat,'comp',$id))) {
			# code...
			$poi=$this->getPoint($id);
			
			if($poi==0){
				$sql_insert=$this->dbs->prepare("INSERT INTO `point` (id_gov,points) VALUES(?,?)");
				if ($sql_insert->execute(array($id,1))) {
					# code...
				}
				else{
                     $poi++;
                     $sql_point=$this->dbs->prepare("UPDATE `point` SET points=?,WHERE id_gov=?");
                     if ($sql_point->execute(array($poi,$id))) {
                     	# code...
                     }
				}
			}
		}
	}


	public function insertPdf($id,$path){
		$sql_pdf=$this->dbs->prepare("INSERT INTO file (id_gov,file_path,type,status)VALUES(?,?,?,?)");
		if ($sql_pdf->execute(array($id,$path,'pdf','comp'))) {
			# code...
			$point=$this->getPoint($id);
			if($point==0){
				$sql_insert=$this->dbs->prepare("INSERT INTO `point` (id_gov,points) VALUES(?,?)");
				if ($sql_insert->execute(array($id,1))) {
					# code...
				}
				else{
                     $point++;
                     $sql_point=$this->dbs->prepare("UPDATE `point` SET points=?,WHERE id_gov=?");
                     if ($sql_point->execute(array($point,$id))) {
                     	# code...
                     }
				}

		}
		else{
			echo "string errors";
		}
	}
}


   public function checkFile($id,$type){
   	$sql_ch=$this->dbs->prepare("SELECT * FROM file where id_gov=? AND type=?");
   	$sql_ch->execute(array($id,$type));
   	if ($sql_ch->rowCount()) {
   		return true;
   	}
   	return false;
   }

   public function addRec($id,$na1,$ph1,$ho1,$na2,$ph2,$ho2){
   	$sql_rec=$this->dbs->prepare("INSERT INTO recomd (id_gov,name1,job1,phone1,name2,job2,phone2,status)VALUES(?,?,?,?,?,?,?,?)");
   	if ($sql_rec->execute(array($id,$na1,$ho1,$ph1,$na2,$ho2,$ph2,'comp'))) {
   		# code...
   	}
   	else{
   		echo "string rec";
   	}
   }

   public function chec_rec($id){
   	$sql_c=$this->dbs->prepare("SELECT * FROM recomd WHERE id_gov=?");
   	$sql_c->execute(array($id));
   	return $sql_c;
   }





	
}