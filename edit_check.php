<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "node");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$lat = mysqli_real_escape_string($link, $_REQUEST['lat']);
$lng = mysqli_real_escape_string($link, $_REQUEST['long']);
$id = mysqli_real_escape_string($link, $_REQUEST['id']);


// attempt insert query execution
$sql = "UPDATE markers SET lat='$lat', lng='$lng' WHERE id='$id'";
if(mysqli_query($link, $sql)){
  echo"<script type='text/javascript'>
      alert('แก้ไขข้อมูลสำเร็จ');
      </script>";
  echo"<script type='text/javascript'>
	 window.location = 'edit_map.html';
   </script>
   ";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// close connection
mysqli_close($link);
?>
