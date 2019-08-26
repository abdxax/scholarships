<?php
require "oop/student.php";
$ar_name='';
$en_name='';
$id_gov='';
$pass_gov='';
$email='';
$pass1='';
$pass2='';
$tepy_cer='';
$brs='';
if (isset($_POST['subreg'])) {
	if ($_POST['arnaum1']&&$_POST['arnaum2']&&$_POST['arnaum3']&&$_POST['arnaum4']!='') {
		$ar_name=strip_tags($_POST['arnaum1'])." ".strip_tags($_POST['arnaum2'])." ".strip_tags($_POST['arnaum3'])." ".strip_tags($_POST['arnaum4']);
		if ($_POST['ennaum1']&&$_POST['ennaum2']&&$_POST['ennaum3']&&$_POST['ennaum4']!='') {
		$en_name=strip_tags($_POST['ennaum1'])." ".strip_tags($_POST['ennaum2'])." ".strip_tags($_POST['ennaum3'])." ".strip_tags($_POST['ennaum4']);

		if(ctype_digit($_POST['govid'])){
      $id_gov=strip_tags($_POST['govid']);
	}
	else{

	}
	$pass_gov=strip_tags($_POST['passid']);

	$email = filter_var(strip_tags($_POST['email']), FILTER_SANITIZE_EMAIL);
	
	$tepy_cer=$_POST['typ'];
	$brs=strip_tags($_POST['cre']);

	

 		if (strip_tags($_POST['pass'])==strip_tags($_POST['pass2'])) {
		$pass=sha1(strip_tags($_POST['pass']));
		if (empty($ar_name)&&empty($en_name)&&empty($id_gov)&&empty($pass_gov)&&empty($email)&&empty($pass1)&&empty($tepy_cer)&&empty($brs)) {
		echo"ssss";
	}
		else{
			
			$studen=new StudentReq('root','');
		if($studen->register ($email,$pass,$id_gov,$tepy_cer,$brs,$ar_name,$en_name,$pass_gov)){

		}
 		}
	}
	else{

	}


	}

	}
	else{
		
	}

	}
	else{

	}
	
	
	


//$studen=new StudentReq('root','');
//$studen->register ("ssss","ssss","eeee");

?>
<!DOCTYPE html>
<html>
<head>
	<?php require"desing/head.html";?>
	<title></title>
	<style type="text/css">
		input {
			text-align: center;
		}
	</style>
</head>
<body>
<header>
	<div class="header-img">
    		<div class="row">
    			<div class="col-12">
    				<img src="image/logo.jpg" >
    			</div>
    			<div class="col-12">
    				<div class="text-center">
    					<h3>التقديم</h3>
    				</div>
    			</div>
    		</div>
    	</div>
</header>

<section>
	<div class="container">
		<div class="row">
			<div class="col-9">
				<form method="POST">
					<div class="form-group">
						<label>الاسم بالعربي </label>
						<div class="row">
							<div class="col-sm">
							<input type="text" name="arnaum4" class="form-control" placeholder="اسم العائله">
						</div>

						<div class="col-sm">
							<input type="text" name="arnaum3" class="form-control" placeholder="اسم الجد">
						</div>

						<div class="col-sm">
							<input type="text" name="arnaum2" class="form-control" placeholder="اسم الاب">
						</div>

						<div class="col-sm">
							<input type="text" name="arnaum1" class="form-control" placeholder="الاسم الاول">
						</div>
						</div>

					</div>

					<div class="form-group" >
						<label>الاسم بالانجليزي </label>
						<div class="row">
							<div class="col-sm">
							<input type="text" name="ennaum1" class="form-control" placeholder="First Name">
						</div>

						<div class="col-sm">
							<input type="text" name="ennaum2" class="form-control" placeholder="Second Name">
						</div>

						<div class="col-sm">
							<input type="text" name="ennaum3" class="form-control" placeholder="GrandFather Name">
						</div>

						<div class="col-sm">
							<input type="text" name="ennaum4" class="form-control" placeholder="Family Name">
						</div>
						</div>

					</div>

					<div class="form-group">
						<label>رقم الهوية و الجواز </label>
						<div class="row">
							<div class="col-sm">
							<input type="number" name="govid" class="form-control" placeholder="رقم الهويه">
						</div>
						<div class="col-sm">
							<input type="فثطف" name="passid" class="form-control" placeholder="رقم الجواز ">
						</div>
						</div>
					</div>



					<div class="form-group">
						<label>البريد الالكتروني </label>
						<div class="row">
							<div class="col-sm">
							<input type="eamil" name="email" class="form-control" placeholder="البريد الالكتروني ">
						</div>

						</div>

					</div>

					<div class="form-group">
						<label>الرقم السري </label>
						<div class="row">
							<div class="col-sm">
							<input type="text" name="pass" class="form-control" placeholder="اعادة ادخال كلمة المرور ">
						</div>

						<div class="col-sm">
							<input type="text" name="pass2" class="form-control" placeholder="كلمة المرور ">
						</div>

						</div>

					</div>

					<div class="form-group">
						<label>الشهادة</label>
						<div class="row">
							<div class="col-sm">
						 <input type="text" name="cre" class="form-control" placeholder="النسبة ">
						</div>

						<div class="col-sm">

							<select class="form-control text-center" name="typ">
							<?php
							$stu=new StudentReq("root","");
							$sqls=$stu->getQuafType();
							  foreach ($sqls as $key ) {
							  	# code...
							  	echo"<option value=".$key['q_id'].">".$key['name_q']."</option>";
							  }
							?>
						    </select>
							
						</div>

						</div>

					</div>

					<div class="form-group">
						
						<input type="submit" name="subreg" class="btn btn-info btn-center" value="تسجيل ">

					</div>


				</form>
			</div>
		</div>
	</div>
</section>
</body>
</html>