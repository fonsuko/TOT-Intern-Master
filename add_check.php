<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
header('Content-Type: text/html; charset=utf-8');
$link = mysqli_connect("localhost", "root", "", "node");
$link->set_charset("utf8");
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$province = mysqli_real_escape_string($link, $_REQUEST['province']);
$exchange = mysqli_real_escape_string($link, $_REQUEST['exchange']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$lat = mysqli_real_escape_string($link, $_REQUEST['lat']);
$lng = mysqli_real_escape_string($link, $_REQUEST['lng']);
$asset = mysqli_real_escape_string($link, $_REQUEST['asset']);
$type = mysqli_real_escape_string($link, $_REQUEST['type']);
$tube = mysqli_real_escape_string($link, $_REQUEST['tube']);
$built = mysqli_real_escape_string($link, $_REQUEST['built']);
$year = mysqli_real_escape_string($link, $_REQUEST['year']);
$survey = mysqli_real_escape_string($link, $_REQUEST['survey']);


// attempt insert query execution
$sql = "INSERT INTO duct (ex_id, duct_name, d_lat, d_lng, asset, type, tube, built, year)
VALUES ('$exchange', '$name', '$lat', '$lng', '$asset', '$type', '$tube', '$built', '$year')";
if(mysqli_query($link, $sql)){
  echo"<script type='text/javascript'>
      alert('เพิ่มข้อมูลสำเร็จ');
      </script>";
      echo"<script type='text/javascript'>
    	 window.location = 'add.php';
       </script>
       ";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// close connection
mysqli_close($link);
?>
