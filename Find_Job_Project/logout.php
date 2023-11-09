<?php
session_start();
if(!isset($_SESSION['id']))
{
  header('location:../login.php?msg=please_login');
}
unset($_SESSION['id']);
unset($_SESSION['type']);
unset($_SESSION['jsname']);
unset($_SESSION['jsid']);
unset($_SESSION['name']);
session_destroy();

header('location:index.php?msg=success_logout');

?>
