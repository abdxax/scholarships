<?php
session_start();
require "../oop/student.php";
$stu=new StudentReq("root","");
$cont=$stu->getAllCountries ();
$ar_name='';
$en_name='';
$error='';
if (isset($_SESSION['id_gov'])) {
  # code...

  $da=$stu->getDataStudent($_SESSION['id_gov']);

  foreach ($da as $key ) {
    # code...
    $ar_name=$key['name_ar'];
    $en_name=$key['name_en'];
  }
}
// updated info 
if (isset($_POST['info_save'])) {
  # code...
  $gender=strip_tags($_POST['gender']);
  $na_now=strip_tags($_POST['na_now']);
  $na_or=strip_tags($_POST['na_or']);
  $brithday=strip_tags($_POST['brithday']);
  $brithCount=strip_tags($_POST['brithdaycount']);
  $is_mus=strip_tags($_POST['musl']);
  $m_s=strip_tags($_POST['ms']);
  $qu=strip_tags($_POST['qua']);
  //$na_now=strip_tags($_POST['']);
  $city_born=strip_tags($_POST['city_born']);

  if (!empty(trim($gender))&&!empty(trim($na_now))&&!empty(trim($na_or))&&!empty(trim($brithday))&&!empty(trim($brithCount))&&!empty(trim($is_mus))&&!empty(trim($m_s))&&!empty(trim($qu))&&!empty(trim($city_born))) {
    # code...
    $stu->UpdatedInfo($gender,$na_or,$na_now,$brithday,$brithCount,$city_born,$is_mus,$m_s,$_SESSION['id_gov']);

  }
  else{

  }

}

if (isset($_POST['save_qua'])) {
  # code...
  $year=$_POST['year'];
  $month=$_POST['month'];
  $day=$_POST['day'];
  $cunt=$_POST['conunt'];
  $great=$_POST['gra'];
  $dates=$year."-".$month."-".$day;
  $stu->Updatedqua($_SESSION['id_gov'],$cunt,$great,$dates);
  
}
echo "hhhh";
if (isset($_FILES['qua_file'])) {
  # code...
  print_r($_FILES['qua_file']);
  $name_file=$_FILES['qua_file']['name'];
  $size=$_FILES['qua_file']['size'];
  $type_file=$_FILES['qua_file']['type'];
  $file_temp=$_FILES['qua_file']['tmp_name'];
  $typ="pdf";
  $expr=explode('.',$_FILES['qua_file']['name']);
  $en=end($expr);
  $en_los=strtolower($en);
  if($typ==$en_los){
    if ($size==4100) {
      $path="student/";
      if (move_uploaded_file($file_temp,$path.$name)) {
        # code...
        echo 'uploaded';
      }
      else{
        echo "not upload ";
      }
    }
    else{
      echo 'size';
    }

  }
  else{
    $error= 'error type';
  }
}
?>

<!DOCTYPE html>
<html>
<head>
	<?php require "../desing/head.html";?>
	<title></title>
	<style type="text/css">
		.fcard{
			margin-top: 150px;
		}
	</style>
</head>
<body>
<!--<header>
	<nav class="navbar  navbar-expand-lg fixed-top navbar-light bg-light">
  <a class="navbar-brand" href="#"><?php //echo'Hello '; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto" dir="rtl">
    	
    	<li class="nav-item"><a href="#" class="nav-link">تسجيل خروج </a></li>

    </ul>
    
  </div>
</nav>-->
</header>

<section>
	<div class="container">
		<div class="row">
      <?php echo $error;?>
			<div class="col-10">
				<div class="accordion" id="accordionExample">
  <div class="card fcard">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#info" aria-expanded="true" aria-controls="collapseOne">
         البيانات الشخصيه 
        </button>
      </h2>
    </div>

    <div id="info" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
       <div class="container">
         <div class="row">
           <div class="col-9">
           
             <?php 
           $stus=$stu->getStutasInfo($_SESSION['id_gov']);
           foreach ($stus as $key ) {
              if($key['status']="comp"){
                 
               }
               else{
                echo'
                 <form method="POST">
               <div class="form-group">
                 <label>الاسم </label>
                 <p> '; //echo $_SESSION['id_gov'];
                   echo $ar_name;
                echo ' </p>
               </div>
                <div class="form-group">
                 <label>الاسم </label>
                 <p>< ';echo $en_name; echo '</p>
               </div>

               <!-- complite info-->

                <div class="form-group">
                 <label>الجنس </label>
                 <div>
                   ذكر<input type="radio" name="gender" value="M">
                  انثى <input type="radio" name="gender" value="F">
                 </div>
               </div>

                <div class="form-group">
                 <label>الجنسيه الحاليه </label>
                 <div>
                   <select class="form-control" name="na_now">';
                    

                     foreach ($cont as $key ) {
                       echo "<option>".$key['ar_name']."</option>";
                     }

                     echo'
                   </select>
                 </div>
               </div>

                <div class="form-group">
                 <label>الجنسية الاصليه  </label>
                 <div>
                   <select class="form-control" name="na_or">';
                  
                      $cont2=$stu->getAllCountries ();
                     foreach ($cont2 as $keys ) {
                       echo "<option>".$keys['ar_name']."</option>";
                     }

                    echo'
                   </select>
                 </div>
               </div>

                <div class="form-group">
                 <label>تاريخ الميلاد </label>
               
                 <div class="well">
  <div id="datetimepicker1" class="input-append date">
    <input data-format="dd/MM/yyyy " type="text" name="brithday"></input>
    <span class="add-on">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
      </i>
    </span>
  </div>
</div>

               </div>

                <div class="form-group">
                 <label>دولة الميلاد </label>
                 <div>
                   <select class="form-control" name="brithdaycount">';
                      
                     $cont3=$stu->getAllCountries ();
                    foreach ($cont3 as $key ) {
                      # code...
                      echo "<option>".$key['ar_name']."</option>";
                    }

                     echo'
                   </select>
                 </div>

               </div>

                <div class="form-group">
                 <label>مكان الميلاد  </label>
                 <div>
                   <input type="text" name="city_born" class="form-control">
                 </div>
               </div>

               <!-- <div class="form-group">
                 <label>الدوله التي يتبعها مكان الميلاد  </label>
               </div>-->

                <!--<div class="form-group">
                 <label>مكان الاقامه الحالي  </label>

               </div>-->

                <div class="form-group" >
                 <label>هل انت مسلم منذ الولادة </label>
                <div class="" >
                   <select class="form-control" name="musl">
                   <option value="yes">نعم</option>
                    <option value="No">لا</option>
                 </select>
                </div>
               </div>

                <div class="form-group">
                 <label>الحالة الاجتماعيه </label>
                 <div>
                   <select name="ms">
                     <option value="singl">اعزب</option>
                       <option value="mare">متزوج</option>
                   </select>
                 </div>
               </div>

                <div class="form-group">
                 <label>كم تحفظ من القران الكريم  </label>
                  <div class="">
                   <select name="qua">
                     <option value="all">احفظ القران كاملا</option>
                     <option value="part">احفظ اجزاء من القران </option>
                     <option value="small">احفظ قصار الصور </option>
                   </select>
                 </div>
               </div>

                <!--<div class="form-group">
                 <label>بيانات التواصل  </label>
               </div>-->

               <!-- <div class="form-group">
                 <label>العنوان البدريدي باللغة الرسمية في  بلدك  </label>
               </div>

                <div class="form-group">
                 <label>العنوان البريدي باللغة الانجليزية </label>
               </div>

                <div class="form-group">
                 <label>الاسم </label>
               </div>

                <div class="form-group">
                 <label>الاسم </label>
               </div>

                <div class="form-group">
                 <label>الاسم </label>
               </div>-->

               <div class="form-group">
                 <input type="submit" name="info_save" value="حفظ" class="btn btn-info ">
               </div>
             </form>
                ';
               }
           }

              

             ?>
           </div>
         </div>
       </div>
      </div>
    </div>
  </div>

<div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#conact" aria-expanded="true" aria-controls="collapseOne">
        بيانات التواصل 
        </button>
      </h2>
    </div>

    <div id="conact" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <div class="row">
          <form>
            <div class="form-group">
              <label>ارقام التواصل </label>
              <div class="row">
              <div class="col-3">
                <input type="number" name="phone" class="form-control">
              </div>
              <div class="col-7">
                <input type="number" name="phone" class="form-control">
              </div>
              <div class="col-3">
                <input type="number" name="phone" class="form-control">
              </div>
              <div class="col-7">
                <input type="number" name="phone" class="form-control">
              </div>
            </div>
            </div>

            <div class="form-group">
              <label>العنوان البريدي باللغه الرسميخ للدوله </label>
             <div class="row">
                <div class="col-sm">
                  <input type="text" name="" class="form-control">
                 
                </div>
                 <div class="col-sm">
                  <input type="text" name="" class="form-control">
                  
                </div>
                 <div class="col-sm">
                  <input type="text" name="" class="form-control">
                   
                </div>
             </div>
            </div>

             <div class="form-group">
              <label>العنوان باللغة الانجليزيه </label>
             <div class="row">
                <div class="col-sm">
                  <input type="text" name="" class ="form-control">
                  
                </div>
                 <div class="col-sm">
                  <input type="text" name="" class="form-control">
                   
                </div>
                 <div class="col-sm">
                  <input type="text" name="" class="form-control">
                  
                </div>
             </div>
            </div>

            <div class="form-group">
              <input type="submit" name="contact_sub" value="حفظ" class="btn btn-info">
            </div>


          </form>
        </div>
      </div>
    </div>
  </div>



  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#qua" aria-expanded="true" aria-controls="collapseOne">
        المؤاهلات 
        </button>
      </h2>
    </div>
  <?php

    $qua=$stu->getQuafli($_SESSION['id_gov']);
    $tyep_qu='';
    $bers='';
    $stut_q='';
    $count_q='';
    $dtes_q='';
    $grat_q='';
    foreach ($qua as $key ) {
      # code...
      $tyep_qu=$key['name_q'];
      $bers=$key['mark'];
      $stut_q=$key['status'];
      $count_q=$key['country'];
      $dtes_q=$key['dates'];
      $grat_q=$key['great'];

    }
  ?>
    <div id="qua" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
       <?php
       if($stut_q=="comp"){
              echo '
                 <form method="POST">
          <div class="form-group">
            <label> تاريخ الحصول على الشهادة </label>
            <div class="row">
             <p>'.$dtes_q.'</p>
            </div>
          </div>

           <div class="form-group">
            <label> تاريخ الحصول على الشهادة </label>
            <div class="">
              
            </div>
          </div>

           <div class="form-group">
            <label> اسم الدوله التي حصل على شهادة الثانويه منها  </label>

             <div>
                   <p>'.$count_q.'</p>
                 </div>

           
          </div>

           <div class="form-group">
            <label> نوع شهادة الثانوية </label>
            <div class="">
               <p>'.$tyep_qu.'</p>
            </div>
          </div>

           <div class="form-group">
            <label> النسبة </label>
            <div class="">
              <p>'.$bers.'</p>
            </div>
          </div>

          <div class="form-group">
            <label>التقدير العام  </label>
            <div class="">
              <p>'.$grat_q.'</p>
            </div>
          </div>

           


        </form>
  
              ';
       }
       else{
        echo '
            <form method="POST">
          <div class="form-group">
            <label> تاريخ الحصول على الشهادة </label>
            <div class="row">
              <div class="col-sm">
                <select class="form-control" name="year">
                  <option>1990</option>
                </select>
              </div>

              <div class="col-sm">
                <select class="form-control" name="month">
                  <option>5</option>
                </select>
              </div>

              <div class="col-sm">
                <select class="form-control" name="day">
                  <option>6</option>
                </select>
              </div>
            </div>
          </div>

           <div class="form-group">
            <label> تاريخ الحصول على الشهادة </label>
            <div class="">
              
            </div>
          </div>

           <div class="form-group">
            <label> اسم الدوله التي حصل على شهادة الثانويه منها  </label>

             <div>
                   <select class="form-control" name="conunt">';
                  
                     $cont4=$stu->getAllCountries ();
                     foreach ($cont4 as $key ) {
                       echo "<option>".$key['ar_name']."</option>";
                     }

                    
                 echo'  </select>
                 </div>

           
          </div>

           <div class="form-group">
            <label> نوع شهادة الثانوية </label>
            <div class="">
               <p><?php echo $tyep_qu;?></p>
            </div>
          </div>

           <div class="form-group">
            <label> النسبة </label>
            <div class="">
              <p><?php echo $bers;?></p>
            </div>
          </div>

          <div class="form-group">
            <label>التقدير العام  </label>
            <div class="">
              <select class="form-control" name="gra">
                <option>ممتاز</option>
                 <option>جيد جدا</option>
                  <option>جيد</option>
                   <option>مقبول </option>
              </select>
            </div>
          </div>

           <div class="form-group">
            <label>  </label>
            <div class="">
              <input type="submit" name="save_qua" value="حفظ " class="btn btn-info">
            </div>
          </div>


        </form>
        ';
       }



       ?>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#file" aria-expanded="true" aria-controls="collapseOne">
        الملفات المرفقه 
        </button>
      </h2>
    </div>

    <div id="file" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <div class="text-center">
          <h3>المستندات المطلوب ارفاقها الكترونياً عند تقديم طلب القبول على منحة خارجية:</h3>
          
        </div>

        <div class="col-10">
            <ul dir="rtl">
              <li> شهادة الثانوية العامة أو ما يعادلها مصدقة من الملحقية الثقافية للمملكة العربية السعودية في بلد صدور الشهادة</li>
              <li>  كشف الدرجات لشهادة الثانوية العامة أو ما يعادلها مصدقة من الملحقية الثقافية للمملكة العربية السعودية في بلد صدور الشهادة</li>
              <li>  شهادة حسن السيرة والسلوك</li>
              <li>  خطاب موافقة بلد المتقدم على الدراسة بالجامعة</li>
              <li>  شهادة الخلو من السوابق الأمنية حديثة الإصدار بما لا يقل عن 5 أشهر من تاريخ التقديم</li>
              <li>  تقرير طبي يؤكد أن المتقدم خالي من الأمراض ولائقا صحياً صادر قبل بدء تقديم الطلب في مدة أقصاها ثلاثة أشهر</li>
            </ul>
          </div>

          <div class="col-10">
            <form method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <input type="file" name="qua_file" class="form-control">
              </div>

              <div class="form-group">
                <input type="submit" name="save_file" class="btn btn-info" value="حفظ">
              </div>

            </form>
          </div>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#viedo" aria-expanded="true" aria-controls="collapseOne">
         مقطع الفيديو 
        </button>
      </h2>
    </div>

    <div id="viedo" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <div class="">
          <h3> ارفاق مقطع فيديو (لا يزيد عن ثلاث دقائق) يتحدث الطالب عن نفسه، والحالة الاجتماعية للأسرة، هواياته، وطموحاته، والغرض من الدراسة في المملكة العربية السعودية، مع إظهار كامل لصورته في المقطع أثناء التحدث</h3>
        </div>


        <div class="col-10">
            <form method="POST">
              <div class="form-group">
                <input type="file" name="qua_file" class="form-control">
              </div>

              <div class="form-group">
                <input type="submot" name="save_file" class="btn btn-info" value="حفظ">
              </div>

            </form>
          </div>

      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#rec" aria-expanded="true" aria-controls="collapseOne">
        المعرفين  
        </button>
      </h2>
    </div>

    <div id="rec" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
       <div class="row">
         <div class="col-12 text-center">
           <h4>بيانات المعرفين </h4>
           <p>التعريف يكون مقدم من مؤسسة اسلامية او شخصية اسلامية </p>
         </div>

         <div>
           
           <form>
             <div class="form-group">
               <label>المعرف الاول </label>
               <div class="row">
               <div class="col-sm">
                 <input type="text" name="" class="form-control" >
               </div>
               <div class="col-sm">
                 <input type="text" name="" class="form-control">
               </div>
               <div class="col-sm">
                 <input type="text" name="" class="form-control">
               </div>
             </div>
             </div>

             <div class="form-group">
               <label>المعرف الثاني  </label>
               <div class="row">
               <div class="col-sm">
                 <input type="text" name="" class="form-control" >
               </div>
               <div class="col-sm">
                 <input type="text" name="" class="form-control">
               </div>
               <div class="col-sm">
                 <input type="text" name="" class="form-control">
               </div>
             </div>
             </div>

             <div class="form-group">
               <input type="submit" name="rec_submot" class="btn btn-info" value="حفظ">
             </div>


           </form>

         </div>
       </div>
      </div>
    </div>
  </div>
  
</div>
			</div>
		</div>
	</div>
</section>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.js"></script>

<script type="text/javascript">
  $(function() {
    $('#datetimepicker1').datetimepicker({
      language: 'pt-BR'
    });
  });
</script>



</body>
</html>