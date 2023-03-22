<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bank_details";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
    die("Connection failed" . mysqli-connect_error());

}
//echo "Connect successfully";