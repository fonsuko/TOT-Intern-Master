<?php require("dbinfo.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIIT Management System | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <b font-size: 35px;>บันทึกข้อมูลบ่อพัก</b>
  </div>
  <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
      $('#province').on('change',function(){
          var provinceID = $(this).val();
          if(provinceID){
              $.ajax({
                  type:'POST',
                  url:'ajaxData.php',
                  data:'province_id='+provinceID,
                  success:function(html){
                      $('#exchange').html(html);
                  }
              });
          }else{
              $('#exchange').html('<option value="">กรุณาเลือกจังหวัดก่อน</option>');
          }
      });

  });
  </script>
  <div class="register-box-body">
    <p class="login-box-msg"></p>
    <form action="add_check.php" method="post" accept-charset="UTF-8">

      <div class="form-group" id="provinceWrap">
        <label>เลือกจังหวัด</label>
        <?php
//Include database configuration file
include('connect.php');
//Get all country data
$query = $db->query("SELECT * FROM province ORDER BY province_id ASC");

//Count total number of rows
$rowCount = $query->num_rows;
?>
<select class="form-control select2" style="width: 100%;" name="province" id="province">
  <option value="">กรุณาเลือกจังหวัด</option>
  <?php
  if($rowCount > 0){
      while($row = $query->fetch_assoc()){
          echo '<option value="'.$row['province_id'].'">'.$row['province_name'].'</option>';
      }
  }else{
      echo '<option value="">Country not available</option>';
  }
  ?>
</select>
      </div>

      <div class="form-group" id="exchangeWrap">
        <label>ชื่อชุมสาย</label>
        <select class="form-control select2" id="exchange" name="exchange">
          <option value="">กรุณาเลือกจังหวัดก่อน</option>
        </select>
      </div>


      <div class="form-group has-feedback">
        <label>ชื่อบ่อพัก</label>
        <input type="text" name="name" class="form-control" placeholder="เช่น MH#001, PB#002 เป็นต้น" required="">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Latitude ของบ่อพัก</label>
        <input type="text" name="lat" class="form-control" placeholder="เช่น 13.751559" required="" >
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Longitude ของบ่อพัก</label>
        <input type="text" name="lng" class="form-control" placeholder="เช่น 100.503433" required="">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>ประเภทของบ่อพัก</label>
        <select class="form-control select2" style="width: 100%;" name="asset">
                <option value="">กรุณาเลือกประเภท</option>
                <option value="Manhole">Manhole</option>
                <option value="Pullbox">Pullbox</option>
        </select>
      </div>
      <div class="form-group has-feedback">
        <label>ชนิด</label>
        <input type="text" name="type" class="form-control" placeholder="เช่น A1, JUF11 เป็นต้น" required="">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <label>การวางท่อ</label>
        <input type="text" name="tube" class="form-control" placeholder="เช่น Double , 1 แนว เป็นต้น" required="">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>สร้างโดย</label>
        <input type="text" name="built" class="form-control" placeholder="เช่น TOT" required="">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>ปีที่สร้าง</label>
        <input type="text" name="year" class="form-control" placeholder="เช่น 2527">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>ผู้บันทึก</label>
        <input type="text" name="survey" class="form-control" placeholder="ชื่อผู้บันทึก">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">บันทึกข้อมูล</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="index.php" class="text-center">Return to home</a>
  </div>

  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script>
  $(function () {
    $("[data-mask]").inputmask();
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
