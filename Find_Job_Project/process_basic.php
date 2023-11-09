<?php
session_start();
include_once('./config.php');

$uname = $_POST['name_user'];
$sex = $_POST['sex'];
$type = $_POST['acc_type'];
$email = $_POST['useremail'];
$password = $_POST['pass1'];
$hash = password_hash($password, PASSWORD_DEFAULT);



$query1 = "INSERT INTO mst_user (name_user,gender,account_type,email,login_pass) VALUES ('$uname','$sex','$type','$email','$hash')";
$result1 = mysqli_query($db1, $query1);

if (!$result1) {
	echo ("Không Thể Đăng Kí Tài Khoản, Tên Đăng Nhập Hoặc Mật Khẩu Đã Tồn Tại!");
} else {
	$_SESSION['user_id'] = mysqli_insert_id($db1);
	if ($type === "j") {
		header('location: ../Find_Job_Project/jobseeker/register_user.php?msg=registered');
	} else if ($type === "e") {
		header('location: ../Find_Job_Project/employer/register_emp.php?msg=registered');
	} else {
		echo "Vui Lòng Chọn Loại Người Dùng !";
	}
}




















?>