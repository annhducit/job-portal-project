<?php
include_once('../config.php');
session_start();
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/jobseeker.css" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/base.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../assets/footer.css">
    <link rel="stylesheet" href="../assets/grid.css">
    <link rel="stylesheet" href="../assets/base.css">
    <link rel="stylesheet" href="../assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Công Việc Yêu Thích</title>
</head>

<body>
    <div id="nav">
        <nav>
            <div class="navbar" id="insidenav">
                <div class="navbar-header">
                    <a class="navbar-brand logo" href="#">DH JOB</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="profile.php">
                            <?php echo "$_SESSION[jsname]"; ?><span class="sr-only">(current)</span>
                        </a></li>
                    <li class="active"><a href="#">Việc Làm Yêu Thích</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Thêm<span class="caret"></span></a>
                        <ul class="dropdown-menu">

                            <li><a href="view_applied.php">Việc Làm Đã Ứng Tuyển</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="view_selected.php">Việc Làm Yêu Thích</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Tài Khoản<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="update_profile.php">Cập Nhật Thông Tin</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="change_pass.php">Đổi Mật Khẩu</a></li>

                        </ul>
                    </li>
                    <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Đăng Xuất</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div><!-- /.container-fluid -->
    <!------------------------------------------------------ navigation ends -------------------------------------------------------------------------->
    <div class="container">
        <h3 class="text-center" style="margin-top: 50px; color: var(--primary-color);">Danh Mục Công Việc Yêu Thích Của Bạn</h3>
        <div class="page-header" style="background: var(--primary-color)"></div>
        <?php
        $q1 = mysqli_query($db1, "select * from selection where cust_id= $_SESSION[jsid]");
        if (mysqli_num_rows($q1) == 0) {
            echo " <div class='container'> <div class='alert alert-warning alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Đóng'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Ghi Chú:</strong> Bạn không có công việc yêu thích nào</p>
        </div> </div>";
        } else {
            echo "<table class='table'> <th style='width:150px'>Nhà Tuyển Dụng</th><th>Tên Công Việc</th><th>Chi Tiết Công Việc</th><th>Ngày Lưu</th>";
            while ($row = mysqli_fetch_array($q1)) {
                $q2 = mysqli_query($db1,"select * from trans_ads where id=$row[job_id]");
                while ($result = mysqli_fetch_array($q2)) {
                    $comp = mysqli_query($db1, "select * from mast_company where id=$result[e_id]");
                    $rowcomp = mysqli_fetch_array($comp);
                    echo "<tr>";
                    echo "<td> <a href='view_emp.php?id=" . $rowcomp['id'] . "'>" . $rowcomp['Company_name'] . "</a>";
                    echo "<td><a  href='view_jobs.php?jid=" . $result['job_id'] . "'>" . $result['title'] . "</td>";
                    echo "<td>" . substr($result['Description'], 0, 120) . "........</td>";
                    echo "<td>" . $row['date'] . "</td>";
                }
            }
        }
        ?>
    </div>
    <div class="page-header" style="background: var(--primary-color)"></div>
    
    <!-- footer -->
    <footer class="footer">
        <div class="grid wide">
            <div class="row">
                <div class="m-6 col l-3 s-12">
                    <nav class="footer-nav">
                        <h2 class="logo">DH Job</h2>
                        <h4 class="footer-nav__title">Website Tìm Kiếm Việc Làm Trong Ngành Công Nghệ Thông Tin</h4>
                        <h4 class="footer-nav__title">Địa chỉ: 19 Nguyễn Hữu Thọ, Phường Tân Phong, Quận 7, TP HCM
                        </h4>
                        <h4 class="footer-nav__title">SĐT: 0393024380</h4>
                        <h4 class="footer-nav__title">Email: trongduc20@gmail.com</h4>
                    </nav>
                </div>
                <div class="m-6 col l-3 s-12">
                    <nav class="footer-nav">
                        <h4 class="footer-nav__title">Thông tin website</h4>
                        <ul class="nav">
                            <li class="nav__item">
                                <a href="/terms.html" class="nav__link">Thông tin điều khoản</a>
                                <a href="/terms.html" class="nav__link">Tuyển dụng</a>
                                <a href="/terms.html" class="nav__link">Giới thiệu</a>
                                <a href="/terms.html" class="nav__link">Điều khoản sử dụng</a>
                                <a href="/terms.html" class="nav__link">Quy chế hoạt động</a>
                                <a href="/terms.html" class="nav__link">Giới thiệu website</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="m-6 col l-3 s-12">
                    <nav class="footer-nav">
                        <h4 class="footer-nav__title">Ứng viên</h4>
                        <ul class="nav">
                            <li class="nav__item">
                                <a class="nav__link">0393024380</a>
                                <a class="nav__link">Tìm việc làm</a>
                                <a class="nav__link">Cách viết CV</a>
                                <a class="nav__link"> Tạo CV</a>
                                <a class="nav__link"> Cẩm nang nghề nghiệp</a>
                                <a class="nav__link"> Thông tin tham khảo</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="m-6 col l-3 s-12">
                    <nav class="footer-nav">
                        <h4 class="footer-nav__title">Kết nối</h4>
                        <ul class="nav">
                            <li class="nav__item">
                                <a class="nav__link"><i class="fa fa-facebook-square"
                                        style="color:navy; font-size:50px"></i></a>
                                <a class="nav__link"><i class="fa fa-twitter-square"
                                        style="color:cyan; font-size:50px"></i></a>
                                <a class="nav__link"><i class="fa fa-google-plus-square"
                                        style="color: red; font-size:50px"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="footer__copyright">
                Copyright @2022. All rights reserved
            </div>
        </div>
    </footer>
</body>
<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>