<?php
//Include database configuration file
include('connect.php');

if(isset($_POST["province_id"]) && !empty($_POST["province_id"])){
    //Get all state data
    $query = $db->query("SELECT * FROM exchange WHERE province_id = ".$_POST['province_id']." ORDER BY ex_name ASC");

    //Count total number of rows
    $rowCount = $query->num_rows;

    //Display states list
    if($rowCount > 0){
        echo '<option value="">เลือกชุมสาย</option>';
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['ex_id'].'">'.$row['ex_name'].'</option>';
        }
    }else{
        echo '<option value="">ไม่พบชุมสายในจังหวัดนี้</option>';
    }
}

?>
