<?php
session_start();
require "oop/login.php";

$lo=new Login("root","");
if (isset($_POST['sub'])) {
	$users=strip_tags($_POST['user']);
	$pass=strip_tags($_POST['pass']);
	$msg=$lo->login($users,$pass);
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Amiri&display=swap" rel="stylesheet">

	<title></title>
	<style type="text/css">
	.txt{
		margin-top: 18%;
	}
		footer{
			position: fixed;
			left: 0;
			bottom: 0;
			width: 100%;
			text-align: center;
		}
		.loginform{
			position: absolute;
			right: 4%;
			top:35%;
		}
		body{
			background-color: #e3e3e3;
		}
		h3{
			font-family: 'Amiri', serif;
		}

	</style>
</head>
<body>
<section>
	<div class="container">
		<div class="row">
			<div class="col-12 txt">
				<div class=" text-center">
					<h3>بوابة المنح  </h3>
				</div>
			</div>
				<div class="col-3 offset-md-4 loginform">
					<?php
                    if (!empty($msg)) {
                    	# code...
                    	echo '<div class="alert alert-danger text-center" style="margin-top: 8%;">'.$msg.'</div>';
                    }
                  	
                  
					?>
					<form method="POST">
						<div class="form-group">
							<input type="email" name="user" class="form-control" placeholder="اسم المستخدم ">
							
						</div>
						<div class="form-group">
							
							<input type="password" name="pass" class="form-control" placeholder="كلمة المرور ">
						</div>
						<div class="form-group text-center">
							
							<input type="submit" name="sub" class="btn btn-info" value="تسجيل دخول ">
						</div>
					</form>
				</div>
		</div>
	</div>
</section>
<footer>
	<div class="row">
		<div class="col-4">
			<img src="image/logo .png" >
		</div>
		<div class="col-4 text-center">
			Developer:Abdulrahman Aljarallah 
			@2019
		</div>
		<div class="col-4">
			
		</div>
	</div>
</footer>
</body>
</html>