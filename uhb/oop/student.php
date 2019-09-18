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
						$subj="جامعة حفرالباطن ";
						$mess="جامعة حفرالباطن ترحب بكم و تتمنى لكم دوام التوفيق و النجاح في حياتكم العلميه و العمليه و نرجو منكم الدخول اللى حسابكم و اكمال البيانات ";
						$this->sentEmail($user,$mess,$subj);
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
			$point=(int)$this->getPoint($id);
			if($point==0){
				$sql_insert=$this->dbs->prepare("INSERT INTO `point` (id_gov,points) VALUES(?,?)");
				if ($sql_insert->execute(array($id,1))) {
					# code...
				}
				
			}
			else{
                     $point++;
                     $sql_point=$this->dbs->prepare("UPDATE `point` SET points=? WHERE id_gov=?");
                     if ($sql_point->execute(array($point,$id))) {
                     	# code...
                     	$this->orderstatus($id,$point);
                     }
				}

		}
		else{

		}
	}

	public function getPoint($id){
		$sql_point=$this->dbs->prepare("SELECT * FROM `point` WHERE id_gov=?");
		$sql_point->execute(array($id));
		foreach ($sql_point as $key ) {
			# code...
			return $key['points'];
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
			# code..
			$point=(int)$this->getPoint($id);
			if($point==0){
				$sql_insert=$this->dbs->prepare("INSERT INTO `point` (id_gov,points) VALUES(?,?)");
				if ($sql_insert->execute(array($id,1))) {
					# code...
				}
				
			}
			else{
                     ++$point;
                     $sql_point=$this->dbs->prepare("UPDATE `point` SET points=? WHERE id_gov=?");
                     if ($sql_point->execute(array($point,$id))) {
                     	# code...
                     	$this->orderstatus($id,$point);
                     }
                     else{
                     	echo "<br>error point";
                     }
				}

			
				}
			
		
	}


	public function insertPdf($id,$path){
		$sql_pdf=$this->dbs->prepare("INSERT INTO file (id_gov,file_path,type,status)VALUES(?,?,?,?)");
		if ($sql_pdf->execute(array($id,$path,'pdf','comp'))) {
			# code...
			$point=(int)$this->getPoint($id);
			if($point==0){
				$sql_insert=$this->dbs->prepare("INSERT INTO `point` (id_gov,points) VALUES(?,?)");
				if ($sql_insert->execute(array($id,1))) {
					# code...
				}
				
			}
			else{
                     $point++;
                     $sql_point=$this->dbs->prepare("UPDATE `point` SET points=? WHERE id_gov=?");
                     if ($sql_point->execute(array($point,$id))) {
                     	# code...
                     	$this->orderstatus($id,$point);
                     }
				}

		
	}
	else{
		return 0;
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
   		$point=(int)$this->getPoint($id);
			if($point==0){
				$sql_insert=$this->dbs->prepare("INSERT INTO `point` (id_gov,points) VALUES(?,?)");
				if ($sql_insert->execute(array($id,1))) {
					# code...
				}
				
			}
			else{
                     $point++;
                     $sql_point=$this->dbs->prepare("UPDATE `point` SET points=? WHERE id_gov=?");
                     if ($sql_point->execute(array($point,$id))) {
                     	# code...
                     	$this->orderstatus($id,$point);
                     }
				}

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


	public function insertviedo($id,$path){
		$sql_link=$this->dbs->prepare("INSERT INTO file (id_gov,file_path,type,status)VALUES(?,?,?,?)");
		if ($sql_link->execute(array($id,$path,'video','comp'))) {
			# code...
			$point=(int)$this->getPoint($id);
			if($point==0){
				$sql_insert=$this->dbs->prepare("INSERT INTO `point` (id_gov,points) VALUES(?,?)");
				if ($sql_insert->execute(array($id,1))) {
					# code...
				}
				
			}
			else{
                     $point++;
                     $sql_point=$this->dbs->prepare("UPDATE `point` SET points=? WHERE id_gov=?");
                     if ($sql_point->execute(array($point,$id))) {
                     	# code...
                     	$this->orderstatus($id,$point);
                     }
				}

		}
		else{
			echo "string errors";
		}
	}


    
    public function addAddress($id,$op1,$phone1,$op2,$phone2,$adds1,$city1,$country1,$adds2,$city2,$country2){
    	$sql_add=$this->dbs->prepare("INSERT INTO address(id_gov,op1,phone1,op2,phone2,country_mom,country2,city_mom,city2,adds_mom,adds2)VALUES(?,?,?,?,?,?,?,?,?,?,?)");
    	if($sql_add->execute(array($id,$op1,$phone1,$op2,$phone2,$country1,$country2,$city1,$city2,$adds1,$adds2))){
              $point=(int)$this->getPoint($id);
			if($point==0){
				$sql_insert=$this->dbs->prepare("INSERT INTO `point` (id_gov,points) VALUES(?,?)");
				if ($sql_insert->execute(array($id,1))) {
					# code...
				}
				
			}
			else{
                     $point++;
                     $sql_point=$this->dbs->prepare("UPDATE `point` SET points=? WHERE id_gov=?");
                     if ($sql_point->execute(array($point,$id))) {
                     	# code...
                     	$this->orderstatus($id,$point);
                     }
				}

    	}
    	else{

    	}
    }

    public function checkaddress($id){
    	$sql_ch=$this->dbs->prepare("SELECT * FROM address WHERE id_gov=?");
    	$sql_ch->execute(array($id));
    	if($sql_ch->rowCount()==1){
    		return true;
    	}
    	return false;
    }


    public function orderstatus($id,$point){
       if ($point==6) {
       	# code...
       	$sql=$this->dbs->prepare("UPDATE order_app SET status_application=? WHERE id_gov=?");
       	$sql->execute(array("Done_application",$id));
       }
    }

    public function sentEmail($email,$mess,$subj){
    	mail($email, $subj, $mess);
    }

    public function getOrderStatus($id){
    	$sql=$this->dbs->prepare("SELECT * FROM order_app WHERE id_gov=?");
    	$sql->execute(array($id));
    	foreach ($sql as $key) {
    		# code...
    		return $key['status_application'];
    	}
    }
   	
   	public function checkPermison($email,$pass,$role,$id){
   		$sql=$this->dbs->prepare("SELECT * FROM user WHERE email=? AND pass=? AND id_gov=? AND role_id=?");
   		$sql->execute(array($email,$pass,$role,$id));
   		if ($sql->rowCount()==1) {
   			return true ;
   		}
   		
   			return false;
   	
   	}
}