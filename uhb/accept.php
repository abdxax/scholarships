<!DOCTYPE html>
<html>
<head>
		<?php require "desing/head.html";?>
	<title></title>
	<style type="text/css">
		#alink{
			opacity: 0.6;
			cursor: not-allowed;
		}
		.text-lti{
			color: red;
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
    					<h3>شروط القبول </h3>
    				</div>
    			</div>
    		</div>
    	</div>
</header>
<section>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="text-center">
					<h3>شروط القبول للمنح الخارجية</h3>
				</div>
			</div>

			<div class="col-12">
				<div dir="rtl">
					<ol>
						<li>أن يكون المتقدم حاصل على الشهادة الثانوية العامة أو ما يعادلها</li>
						<li>ألا يقل سن المتقدم عن (17) سنة ولا يزيد على (25) سنة للمرحلة الجامعية</li>
						<li>ألا يكون المتقدم قد حصل على منحة دراسية أخرى من إحدى المؤسسات التعليمة في المملكة</li>
						<li>ألا يكون قد مضى على شهادة الثانوية العامة أكثر عن خمس سنوات</li>
						<li>-أن تصدق الشهادات والأوراق الثبوتية من الجهات المختصة في بلد المتقدم، وكذلك الملحقية الثقافية السعودية في بلد المتقدم</li>
						<li>أن يحضر المتقدم شهادة خلو من السوابق من الأجهزة الأمنية في بلده</li>
						<li>أن يكون المتقدم لائقة طبياً</li>
						<li>ألا يكون المتقدم مفصول أكاديمياً من إحدى المؤسسات التعليمية في المملكة</li>
						<li>أن توافق حكومة بلد المتقدم على الدراسة في المملكة العربية السعودية للدول التي تشترط ذلك على الطلبة السعوديين</li>
						<li>أن تجتاز المتقدم الفحص الطبي الذي تقرره الأنظمة والتعليمات</li>
						
					</ol>
				</div>
		    </div>

		    <div class="col-12">
		    	<h5>يشترط للتقديم على جامعة حفرالباطن هو <spam class="text-lti h4">إجادة اللغة العربية تحدثاً وكتابتاً </spam></h5>
		    	<div class="col-11">
		    		أتعهد على نفسي بأني أجيد التحدث اللغة العربية.<input type="radio" name="acce"  id="ye" value="yes" onclick="myFunction()"><br>
		    		للأسف ، لا أجيد حالياً التحدث في اللغة العربية.<input type="radio" name="acce"  id="no" value="no" onclick="myFunction()">
		    	</div>
		    </div>
		    <div class="col-12">
		    	<div class="text-center">
		    		<a href="" class="btn btn-default neword"  id="alink" disabled="disabled">تقديم</a>
		    	</div>
		    </div>

	</div>
</div>
</section>

<script type="text/javascript">
	function myFunction() {
		//alert(document.getElementById("ye").value);
  var checkBox = document.getElementById("ye").checked;
  var checkBox2 = document.getElementById("no").checked;
  //alert("ooo");
  //console.log(checked);
  var text = document.getElementById("alink");
  if (checkBox){
    text.style.cursor = "pointer";
    text.style.opacity = "1";
    text.href="newReq.php";
  } else if(checkBox2){
  text.style.cursor = "not-allowed";
     text.style.opacity = "0.6";
     alert("حظاً أوفر ونتمنى أن نراك قريبا بعد إجادتك للغة العربية بالتقديم على نظام القبول في جامعة حفرالباطن ");
     window.location.href = "index.php";
  }

  else {
     text.style.cursor = "not-allowed";
     text.style.opacity = "0.6";
  }
  //var=
  
}
</script>
</body>
</html>