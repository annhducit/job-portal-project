<?php

include_once('../config.php');
session_start();
$name=$_POST['compname'];
$addr=$_POST['addr'];
$pin=$_POST['pin_code'];
$cityid=$_POST['city'];
$countryid=$_POST['country'];
$website=$_POST['website'];
$profile=$_POST['about'];

$last_id=$_SESSION['user_id'];


$query2 =  "INSERT INTO mast_company (user_id,Company_name,Address,City,Zip,Country,Website,Profile)
                VALUES ('$last_id','$name','$addr','$cityid','$pin','$countryid','$website','$profile')";

if (!mysqli_query($db1,$query2))
{
    echo("Error description: " . mysqli_error($db1));
}
else{
	unset($_SESSION['user_id']);
  session_destroy();
    header('location: ../login.php?msg=complete');
}
?>
