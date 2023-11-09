<?php
session_start();
include_once('../config.php');
if (!isset($_SESSION['id'])) {
  header('location:../login.php?msg=please_login');
}

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

$q1 = "UPDATE mast_customer SET cust_name='$name',address='$address',phone='$mobile',city='$cityid',state='$stateid',country='$countryid',experience='$exp',skills='$skills',basic_edu='$ug',master_edu='$pg' WHERE id=$_SESSION[jsid]";

if (!mysqli_query($db1, $q1)) {
  echo ("Lỗi: " . mysqli_error($db1));
} else {
  session_destroy();
  header('location:../login.php?msg=please_login');
}

?>