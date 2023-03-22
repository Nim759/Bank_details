<?php
include "db_conn.php";
$AccountNumber = $_GET['AccountNumber'];
$sql = "DELETE FROM `bank_details` WHERE AccountNumber ='$AccountNumber'";
$result = mysqli_query($conn , $sql);

if($result){
    header("Location: index.php?msg=Record deleted successfully ");

}
else {
    echo "Failed: " .mysqli_error($conn);
}



?>