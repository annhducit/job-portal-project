<?php
include_once('../config.php');
session_start();
if (!isset($_SESSION['id'])) {
    header('location:../login.php?msg=please_login');
} else {
    $q = mysqli_query($db1, "select * from mst_user join mast_customer on mst_user.id=mast_customer.user_id WHERE mast_customer.id = user_id");
    $row = mysqli_fetch_array($q);

    $email = $row['email'];
    //echo $email;
    $q2 = mysqli_query($db1, "select * from trans_ads WHERE id= job_id ");
    $row2 = mysqli_fetch_array($q2);
    $job_title = $row2['title'];

    $q3 = mysqli_query($db1, "select * from mast_company WHERE id= emp_id ");
    $row3 = mysqli_fetch_array($q3);
    $Company = $row3['Company_name'];
}

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <META HTTP-EQUIV="refresh" CONTENT="60">
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/employer.css" rel="stylesheet">
    <title>Thành Công</title>
</head>

<body>
    <div id="nav">
        <nav class="emp-nav">
            <div class="navbar" id="insidenav">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">DH JOB</a>
                </div>
    
                <ul class="nav navbar-nav">
                    <li><a href="../employer/profile.php">
                            <?php echo $_SESSION['name']; ?><span class="sr-only">(current)</span>
                        </a></li>
                    <li class="active"><a href="#">Tuyển Dụng</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Đăng Xuất</a></li>
                </ul>
            </div>
        </nav>
    </div>
        <?php $_SESSION['name'] ?>
    </h3>
    <?php echo " <div class='container'> <div class='alert alert-warning alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Đóng'><span
                    aria-hidden='true'>&times;</span></button>
           <!-- <p style='font-size: 25px'><strong>Bạn đã tuyển dụng thành công một người dùng.</strong></p>
        </div> </div>";
    echo "<center><a style='color: whitesmoke;'  href='../employer/manage_applicants.php'><button type='button' class='btn-success'>Trở về</button></a>";

    ?>
    <?php

    $to = "$email";
    $subject = "Successfully Recruited";
    $headers[] = 'MI: 1.0';
    $headers[] = 'Content-type: text/html; charset=utf8_encode';
    $message = "
        <html>
        <head>
        <title>Successfully Hired</title>
        </head>
        <body>
        <p>Now You are Successfully Recruited For $job_title .</p>
        The Company $Company Will Contact You Soon on your email address.
        <table>
        <tr>
        <th>Wish You A Great Future Ahead</th>
        </tr>
        <tr>
        <th>FROM: DH TEAM</th>
        </tr>
        </table>
        </body>
        </html>
";
    ?>
</body>
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>
