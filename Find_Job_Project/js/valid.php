<?php
include_once('../config.php');
$value = $_GET['query'];
$formfield = $_GET['type']; 

if ($formfield == "username") {

    if ($value == "")
        echo "Tên không được để trống";
    else if (strlen($value) < 3) {
        echo "Phải lớn hơn 3 chữ cái";
    }
}

if ($formfield == "buildno") {

    if ($value == "") {
        echo "Địa chỉ không được để trống";
    }
}

if ($formfield == "streetname") {

    if ($value == "") {
        echo "Địa chỉ không được để trống";
    }
}

if ($formfield == "pinno") {

    if (strlen($value) != 6) {
        echo "Nhập Pincode";
    }
}

if ($formfield == "country") {

    if ($value == "") {
        echo "Quốc gia không được để trống";
    }
}

if ($formfield == "state") {

    if ($value == "") {
        echo "Quốc tịch không được để trống";
    }
}

if ($formfield == "city") {

    if ($value == "") {
        echo "Thành phố không được để trống";
    }
}

if ($formfield == "password") {
    if ($value == "")
        echo "Mật khẩu không được để trống";
    else
        if (strlen($value) < 6) {
            echo "Mật khẩu quá ngắn";
        }
}

if ($formfield == "email") {
    $sql = "SELECT email FROM mst_user WHERE email = '$value'";
    $select = mysqli_query($db1, $sql);

    if ($value == "") {
        echo "Nhập địa chỉ Email";
    } else if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value) || (mysqli_num_rows($select) > 0)) {
        echo "Email không hợp lệ hoặc đã được dùng";
    }
}

if ($formfield == "website") {
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $value)) {
        echo "Website không hợp lệ";
    }
}

if ($formfield == "longtext") {
    if (strlen($value) < 20) {
        echo "Phải nhập hơn 20 chữ cái";
    }
}

if ($formfield == "address") {
    if ($value == "")
        echo "Nhập địa chỉ";
    else
        if (strlen($value) < 20) {
            echo "Phải nhập hơn 20 chữ cái";
        }
}

if ($formfield == "digit") {
    if (!is_numeric($value)) {
        echo "Dữ liệu phải là số";
    }
}

if ($formfield == "text") {
    if (strlen($value) < 10) {
        echo "Phải nhập trên 10 chữ cái";
    }
}

if ($formfield == "mobilenum") {
    $mob = "/^[1-9][0-9]*$/";
    if ($value == '')
        echo "Nhập số điện thoại của bạn";
}

if ($formfield == "company") {
    if ($value == '' && (strlen($value) < 3)) {
        echo "Nhập tên công ty/doanh nghiệp";
    } elseif (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $value)) {
        echo "Tên công ty/doanh nghiệp có chứa kí tự không hợp lệ";
    }

}

if ($formfield == "pincode") {
    if ($value == "")
        echo "Pincode không được để trống";
    else if (!is_numeric($value)) {
        echo "Pincode phải là số";
    }
}

?>