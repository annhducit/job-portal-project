<?php
include_once('../config.php');
session_start();
$name = $_POST['uname'];
$buildid = $_POST['BuildId'];
$streetid = $_POST['StreetId'];
$pin = $_POST['Pin'];
$mobile = $_POST['mobno'];
$countryid = $_POST['Country'];
$stateid = $_POST['State'];
$cityid = $_POST['City'];
$exp = $_POST['experience'];
$skills = $_POST['skills'];
$ug = $_POST['ugcourse'];
$pg = $_POST['pgcourse'];
$address = "";

$address = $buildid . "," . $streetid . "," . $cityid . "-" . $pin;

$last_id = $_SESSION['user_id'];

$query1 = "INSERT INTO mast_customer (user_id,cust_name,address,phone,city,state,country,experience,skills,basic_edu,master_edu)
                VALUES ('$last_id','$name','$address','$mobile','$cityid','$stateid','$countryid','$exp','$skills','$ug','$pg')";

if (!mysqli_query($db1, $query1)) {
  echo ("Lỗi: " . mysqli_error($db1));
} else {
  unset($_SESSION['user_id']);
  session_destroy();
  header('location: ../login.php?msg=complete');
}

?>