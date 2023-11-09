<?php
$host = "localhost";
$user = "root";
$password = "";
$database1 = "find_job_project";

$db1 = mysqli_connect($host, $user, $password, $database1);
if ($db1->connect_errno > 0) {
    die('Không thể kết nối đến database' . $db1->connect_error);
} else {
    echo "";
}

?>