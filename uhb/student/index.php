<?php
session_start();
require "../oop/student.php";
$stu=new StudentReq("root","");
//$msg=
if (isset($_SESSION['email'])&& isset($_SESSION['password'])&& isset($_SESSION['role'])
&& isset($_SESSION['id_gov'])) {
  # code...
 // echo "data";
//echo "ddfddf2".$_SESSION['email']." ".$_SESSION['password'];
  if($stu->checkPermison($_SESSION['email'],$_SESSION['password'],$_SESSION['role'],$_SESSION['id_gov'])){
           echo "ddfddf".$_SESSION['email']." ".$_SESSION['password'];
}else{
  //header("location:../index.php");
}

}else{
  header("location:../index.php");
}

$cont=$stu->getAllCountries ();
$ar_name='';
$en_name='';
$error='';
if (isset($_SESSION['id_gov'])) {
  # code..
  echo  $_SESSION['id_gov'];
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
  $brithday=strip_tags($_POST['year']).'/'.strip_tags($_POST['month']).'/'.strip_tags($_POST['day']);
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
    if ($size<= 844500) {
      $path="file/doc_pdf/".$_SESSION['id_gov']."_".$name_file;
      if (move_uploaded_file($file_temp,$path)) {
        # code...
        $stu->insertPdf($_SESSION['id_gov'],$path);
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

//video upload
if (isset($_POST['save_file'])) {

  $links=strip_tags($_POST['link']);
  $stu->insertviedo($_SESSION['id_gov'],$links);
}


//erc
if (isset($_POST['rec_submot'])) {
  $name1=strip_tags($_POST['name1']);
  $job1=strip_tags($_POST['job1']);
  $phone1=strip_tags($_POST['phone1']);
  $name2=strip_tags($_POST['name2']);
  $job2=strip_tags($_POST['job2']);
  $phone2=strip_tags($_POST['phone2']);
  $stu->addRec($_SESSION['id_gov'],$name1,$phone1,$job1,$name2,$phone2,$job2);
}

//ADDRESS
if (isset($_POST['address_submit'])) {
  # code...
  $ophone1=strip_tags($_POST['ophone1']);
  $numphone1=strip_tags($_POST['numphone1']);
  $ophone2=strip_tags($_POST['ophone2']);
  $numphone2=strip_tags($_POST['numphone2']);

  $adds1=strip_tags($_POST['adds1']);
  $city1=strip_tags($_POST['city1']);
  $country1=strip_tags($_POST['country1']);
  $adds2=strip_tags($_POST['adds2']);
  $city2=strip_tags($_POST['city2']);
  $country2=strip_tags($_POST['country2']);

  $stu->addAddress($_SESSION['id_gov'],$ophone1,$numphone1,$ophone2,$numphone2,$adds1,$city1,$country1,$adds2,$city2,$country2);
}
?>

<!DOCTYPE html>
<html>
<head>
	<?php require "../desing/head.html";?>
	<title></title>
	<style type="text/css">
		.fcard{
			margin-top: 15%;
		}
    .txt{
      margin-top: 10%;
      
    }
    .tba{
      direction: rtl;
      margin-left: 33%

    }
    .support{
     
      margin-top: 3%;
      padding: 5%;
     
    }
	</style>
</head>
<body>
<header>
	<nav class="navbar  navbar-expand-lg fixed-top navbar-light bg-light">
  <a class="navbar-brand" href="#"><?php //echo'Hello '; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto" dir="rtl">

    	<li class="nav-item"><a href="logout.php" class="nav-link">تسجيل خروج </a></li>

    </ul>

  </div>
</nav>
</header>

<section class="txt">
  <?php
   $sql_info_detals=$stu->getAllInfoStudent($_SESSION['id_gov']);
   $name_q='';
   $email_o='';
   $status_o='';
   foreach ($sql_info_detals as $key ) {
     # code...
    $name_q=$key['name_ar'];
    $email_o=$key['email'];
    $status_o=$key['status_application'];
   }
  ?>
  <div class="container">
    <div class="row">
      <div class="col-12 ">
        <div class="text-center">
          <h5>جامعة حفرالباطن ترحب بكم </h5>
        </div>
      </div>
      <div class="col-5 tba">
        <table class="table table-striped">
          <tr>
            <th>الاسم</th>
            <td><?php echo $name_q;?></td>
           
          </tr>

          <tr>
            <th>الرقم الوطني</th>
            <td><?php echo $_SESSION['id_gov'];?></td>
           
          </tr>

          <tr>
            <th>البريد الالكتروني </th>
            <td><?php echo $email_o;?></td>
           
          </tr>

          <tr>
            <th>حالة الطلب </th>
            <td>
              <?php 
              if($status_o=='not'){
                echo " الطلب غير مكتمل ";
              }else{
                echo "الطلب تحت  الدراسه ";
              }

              ?>
            </td>
           
          </tr>

        </table>
      </div>
    </div>
  </div>
</section>


<section>
	<div class="container">
		<div class="row">
      <?php echo $error;
         echo $stu->getPoint($_SESSION['id_gov']);
      ?>
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
           <div class="col-11">

             <?php
           $stus=$stu->getStutasInfo($_SESSION['id_gov']);
           foreach ($stus as $key ) {
              if($key['status']=="comp"){
                 echo'
                 <div class="col-10">
                   <table class="table" dir="rtl">
                    <tr>
                      <th>الاسم-عربي</th>
                      <td>'.$key['name_ar'].'</td>
                    </tr>

                    <tr>
                      <th>الاسم-انجليزي</th>
                      <td>'.$key['name_en'].'</td>
                    </tr>

                    <tr>
                      <th>تاريخ الميلاة</th>
                      <td></td>
                    </tr>

                    <tr>
                      <th>رقم الهويه</th>
                      <td></td>
                    </tr>

                    <tr>
                      <th>رقم الجواز </th>
                      <td></td>
                    </tr>

                    <tr>
                      <th>الحالة الاجتماعية </th>
                      <td></td>
                    </tr>




                   </table>
                 </div>

                 ';
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
          <?php
           if ($stu->checkaddress($_SESSION['id_gov'])) {
             # code...
           }
           else{
            echo '
                <form method="POST">
            <div class="form-group">
              <label>ارقام التواصل </label>
              <div class="row">

              <div class="col-8">
                <input type="number" name="numphone1" class="form-control"placeholder="الرقم ">
              </div>
                <div class="col-3">
                <input type="number" name="ophone1" class="form-control" placeholder="مفتاح الدوله ">
              </div>


              <div class="col-8" style="margin-top: 10px">
                <input type="number" name="numphone2" class="form-control"placeholder="مالرقم">
              </div>
              <div class="col-3" style="margin-top: 10px">
                <input type="number" name="ophone2" class="form-control"placeholder="مفتاح الدولة ">
              </div>

            </div>
            </div>

            <div class="form-group">
              <label>العنوان البريدي باللغه الرسميخ للدوله </label>
             <div class="row">
                <div class="col-sm">
                  <input type="text" name="adds1" class="form-control" placeholder="العنوان">

                </div>
                 <div class="col-sm">
                  <input type="text" name="city1" class="form-control" placeholder="المدينة">

                </div>
                 <div class="col-sm">
                  <input type="text" name="country1" class="form-control" placeholder="الدولة">

                </div>
             </div>
            </div>

             <div class="form-group">
              <label>العنوان باللغة الانجليزيه </label>
             <div class="row">
                <div class="col-sm">
                  <input type="text" name="adds2" class ="form-control"placeholder="العنوان">

                </div>
                 <div class="col-sm">
                  <input type="text" name="city2" class="form-control" placeholder="المدينة">

                </div>
                 <div class="col-sm">
                  <input type="text" name="country2" class="form-control" placeholder="الدولة">

                </div>
             </div>
            </div>

            <div class="form-group">
              <input type="submit" name="address_submit" value="حفظ" class="btn btn-info">
            </div>


          </form>
            ';
           }

          ?>

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
            <?php
            if ($stu->checkFile($_SESSION['id_gov'],'pdf')) {
              # code...

            }
            else{
              echo '
                     <form method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <input type="file" name="qua_file" class="form-control">
              </div>

              <div class="form-group">
                <input type="submit" name="save_file_pdf" class="btn btn-info" value="حفظ">
              </div>

            </form>
              ';
            }


            ?>

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
          <p>الرجاء رفعه و ارفاق الرابط في مكان المخصص </p>
        </div>

        <?php
            if ($stu->checkFile($_SESSION['id_gov'],'video')) {
              # code...

            }
            else{
              echo '
                     <div class="col-10">
            <form method="POST" >
              <div class="form-group">
                <!--input type="file" name="vid_file" class="form-control">-->
                <input type="text" name="link" class="form-control" placeholder="رابط المقطع ">
              </div>

              <div class="form-group">
                <input type="submit" name="save_file" class="btn btn-info" value="حفظ">
              </div>

            </form>
          </div>
              ';
            }


            ?>


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
          <?php
              $recs=$stu-> chec_rec($_SESSION['id_gov']);
              if ($recs->rowCount()>0) {
                # code...
              }
              else{
                echo '

           <form method="POST">
             <div class="form-group">
               <label>المعرف الاول </label>
               <div class="row">
               <div class="col-sm">
                 <input type="text" name="phone1" class="form-control" placeholder="رقم التواصل ">
               </div>
               <div class="col-sm">
                 <input type="text" name="job1" class="form-control" placeholder="المهنة" >
               </div>
               <div class="col-sm">
                 <input type="text" name="name1" class="form-control" placeholder="الاسم">
               </div>
             </div>
             </div>

             <div class="form-group">
               <label>المعرف الثاني  </label>
               <div class="row">
               <div class="col-sm">
                 <input type="text" name="phone2" class="form-control" placeholder="رقم التواصل ">
               </div>
               <div class="col-sm">
                 <input type="text" name="job2" class="form-control"placeholder="المهنة">
               </div>
               <div class="col-sm">
                 <input type="text" name="name2" class="form-control"placeholder="الاسم">
               </div>
             </div>
             </div>

             <div class="form-group">
               <input type="submit" name="rec_submot" class="btn btn-info" value="حفظ">
             </div>


           </form>
                ';
              }
          ?>


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


<section class=" support">
  <div class="container">
    <div class="row">
      <div class="col-12 ">
        <div class="text-center">
          <h5>للدعم الفني و الاستفسارات التواصل على :</h5>
          <p> البريد الالكتروني :</p>
           <p> االهاتف : 00966137205351</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!--section for ordre detalis -->


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
