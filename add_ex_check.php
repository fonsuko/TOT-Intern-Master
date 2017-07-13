<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "node");
$link->set_charset("utf8");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$province = mysqli_real_escape_string($link, $_REQUEST['province']);
$exchange = mysqli_real_escape_string($link, $_REQUEST['exchange']);
$lat = mysqli_real_escape_string($link, $_REQUEST['lat']);
$lng = mysqli_real_escape_string($link, $_REQUEST['lng']);
$street = mysqli_real_escape_string($link, $_REQUEST['street']);
$survey = mysqli_real_escape_string($link, $_REQUEST['survey']);


// attempt insert query execution

$sql = "INSERT INTO exchange (province_id, ex_name, ex_lat, ex_lng, street_name)
VALUES ('$province', '$exchange', '$lat', '$lng', '$street')";

if(mysqli_query($link, $sql)){
  echo"<script type='text/javascript'>
      alert('เพิ่มข้อมูลสำเร็จ');
      </script>";
      echo"<script type='text/javascript'>
    	 window.location = 'add_ex.php';
       </script>
       ";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// close connection
mysqli_close($link);
?>
