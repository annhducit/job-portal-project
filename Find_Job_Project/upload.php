<?php
include_once('./config.php');
session_start();
$type = $_GET['type'];
if (isset($_POST['submit'])) {
    if ($type === "image") {
        upload_image();
    } elseif ($type === "file") {
        upload_resume();
    } elseif ($type === "logo") {
        upload_logo();
    }
}

function upload_image()
{

    $filename = $_FILES["file"]["name"];
    $file_basename = substr($filename, 0, strripos($filename, '.')); //  get file name
    $file_ext = substr($filename, strripos($filename, '.')); // get file extention
    $filesize = $_FILES["file"]["size"];
    $allowed_file_types = array('.jpeg', '.png', '.PNG', '.jpg', '.JPEG', '.JPG', '.img');

    if (in_array($file_ext, $allowed_file_types) && ($filesize < 250000)) {

        $newfilename = $_SESSION['jsname'] . $_SESSION['jsid'] . $file_ext;
        if (file_exists("uploads/images/" . $newfilename)) {
            unlink("uploads/images/" . $newfilename);
        }
        $imageInformation = getimagesize($_FILES['file']['tmp_name']);


        $imageWidth = $imageInformation[0];
        $imageHeight = $imageInformation[1];

        if ($imageWidth <= 1080 && $imageHeight <= 1280) {
            move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/images/" . $newfilename);
            mysqli_select_db($GLOBALS['db1'], "Find_Job_Project");
            $cmd = mysqli_query($GLOBALS['db1'], "update mast_customer set photo= '$newfilename' WHERE id=$_SESSION[jsid]");
            if (!$cmd) {
                echo ("Lỗi: " . mysqli_error($GLOBALS['db1']));
            } else {
                echo "<center><h3>Tệp đã được tải lên thành công !!</h3> <br><br><h4><a href='jobseeker/profile.php'>Trở về</a></h4>";
            }
        } else {
            echo "<center>Kích thước ảnh lớn quá mức cho phép";
        }

    } elseif (empty($file_basename)) {
        echo "<center>Chọn file tải lên.";
    } elseif ($filesize > 250000) {
        echo "<center>Tệp bạn tải lên quá lớn mức cho phép.";
    } else {
        echo "<center>Bạn chỉ có thể tải lên các tệp này: " . implode(', ', $allowed_file_types);
        unlink($_FILES["file"]["tmp_name"]);
    }
}


function upload_logo()
{
    $filename = $_FILES["file"]["name"];
    $file_basename = substr($filename, 0, strripos($filename, '.'));
    $file_ext = substr($filename, strripos($filename, '.'));
    $filesize = $_FILES["file"]["size"];
    $allowed_file_types = array('.jpeg', '.png', '.jpg', '.JPEG', '.JPG', '.PNG', '.img');

    if (in_array($file_ext, $allowed_file_types) && ($filesize < 250000)) {
        $newfilename = $_SESSION['name'] . $_SESSION['e_id'] . $file_ext;
        $eid = $_SESSION['e_id'];
        if (file_exists("../Find_Job_Project/uploads/logo/" . $newfilename)) {

            unlink("../Find_Job_Project/uploads/logo/" . $newfilename);
        }
        $imageInformation = getimagesize($_FILES['file']['tmp_name']);
        $imageWidth = $imageInformation[0];
        $imageHeight = $imageInformation[1];
        if ($imageWidth <= 1080 && $imageHeight <= 1280) {
            move_uploaded_file($_FILES["file"]["tmp_name"], "../Find_Job_Project/uploads/logo/" . $newfilename);
            mysqli_select_db($GLOBALS['db1'], "Find_Job_Project");
            $cmd = mysqli_query($GLOBALS['db1'], "update mast_company set logo='$newfilename' where id=$eid");
            if (!$cmd) {
                echo ("Error description: " . mysqli_error($GLOBALS['db1']));
            } else {
                echo "<center>Tệp tải lên thành công !! <br><a href='employer/profile.php'>Trở Về</a>";
            }
        } else {
            echo "Kích thước ảnh quá lớn";
        }

    } elseif (empty($file_basename)) {
        echo "<center>Chọn tệp tải lên";
    } elseif ($filesize > 250000) {
        echo "<center>Tệp bạn tải lên có dung lượng quá lớn.";
    } else {
        echo "<center>Bạn chỉ có thể tải lên các tệp này: " . implode(', ', $allowed_file_types);
        unlink($_FILES["file"]["tmp_name"]);
    }
}

function upload_resume()
{

    $filename = $_FILES["file"]["name"];
    $file_basename = substr($filename, 0, strripos($filename, '.'));
    $file_ext = substr($filename, strripos($filename, '.'));
    $filesize = $_FILES["file"]["size"];
    $allowed_file_types = array('.doc', '.docx', '.pdf');

    if (in_array($file_ext, $allowed_file_types) && ($filesize < 250000)) {
        $newfilename = $_SESSION['jsname'] . $_SESSION['jsid'] . $file_ext;
        if (file_exists("uploads/resume/" . $newfilename)) {
            unlink("uploads/resume/" . $newfilename);
        }
        move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/resume/" . $newfilename);
        $cmd = mysqli_query($GLOBALS['db1'], "update mast_customer set CV= '$newfilename' WHERE id=$_SESSION[jsid]");
        if (!$cmd) {
            echo ("Error description: " . mysqli_error($GLOBALS['db1']));
        } else {
            echo "<center>Tải Tệp Lên Thành Công!<br> <a href='jobseeker/profile.php'> Trở Về</a>";
        }
    } elseif (empty($file_basename)) {
        echo "<center>Chọn tệp tải lên";
    } elseif ($filesize > 500000) {
        echo "<center>Tệp bạn tải lên có dung lượng quá lớn.";
    } else {
        echo "<center>Bạn chỉ có thể tải lên các tệp này: " . implode(', ', $allowed_file_types);
        unlink($_FILES["file"]["tmp_name"]);
    }
}
?>