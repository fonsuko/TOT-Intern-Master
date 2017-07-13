<?php require("dbinfo.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>บันทึกข้อมูลชุมสาย | ระบบจัดเก็บข้อมูลท่อร้อยสายใต้ดิน</title>
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
    <b>บันทึกข้อมูลชุมสาย</b>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg"></p>

    <form action="add_ex_check.php" method="post" accept-charset="utf-8">
      <div class="form-group">
        <label>จังหวัด</label>
        <select class="form-control select2" style="width: 100%;" name="province">
          <?php
          $connection=mysql_connect ('localhost', $username, $password);
          if (!$connection) {  die('Not connected : ' . mysql_error());}
          // Set the active MySQL database

          $db_selected = mysql_select_db($database, $connection);
          if (!$db_selected) {
            die ('Can\'t use db : ' . mysql_error());
          }
          mysql_query("SET character_set_results=utf8");
          mysql_query("SET character_set_client='utf8'");
          mysql_query("SET character_set_connection='utf8'");
          mysql_query("collation_connection = utf8_unicode_ci");
          mysql_query("collation_database = utf8_unicode_ci");
          mysql_query("collation_server = utf8_unicode_ci");
            $strSQL = "SELECT * FROM province";
            $objQuery = mysql_query($strSQL);
            if (!$objQuery) { // add this check.
              die('Invalid query: ' . mysql_error());
            }
            while($objResuut = mysql_fetch_array($objQuery))
            {
              ?>
                <option value="<?php echo $objResuut["province_id"];?>">
                <?php echo $objResuut["province_name"];?>
                </option>

                <?php
              }
          ?>
        </select>
      </div>
      <div class="form-group has-feedback">
        <label>ชื่อชุมสาย</label>
        <input type="text" name="exchange" class="form-control" placeholder="เช่น ชุมสายเชียงใหม่" required="">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Latitude ของชุมสาย</label>
        <input type="text" name="lat" class="form-control" placeholder="เช่น 13.751559" required="" >
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Longitude ของชุมสาย</label>
        <input type="text" name="lng" class="form-control" placeholder="เช่น 100.503433" required="">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>ชื่อถนน</label>
        <input type="text" name="street" class="form-control" placeholder="เช่น สุขุมวิท" required="">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>ชื่อผู้สำรวจ</label>
        <input type="text" name="survey" class="form-control" placeholder="ชื่อผู้สำรวจ" required="">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>

      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">เพิ่มข้อมูล</button>
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
