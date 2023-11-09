<?php
include_once('../config.php');
session_start();
if (!isset($_SESSION['id'])) {
    header('location:../login.php?msg=please_login');
}
$q = mysqli_query($db1, "select * from mst_user join mast_customer on mst_user.id=mast_customer.user_id WHERE mast_customer.id = $_GET[jsid]");
$row = mysqli_fetch_assoc($q);
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Xem Ứng Viên</title>
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/jobseeker.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/base.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../assets/footer.css">
    <link rel="stylesheet" href="../assets/grid.css">
    <link rel="stylesheet" href="../assets/base.css">
    <link rel="stylesheet" href="../assets/font-awesome-4.7.0/css/font-awesome.min.css">
        
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</head>
<div id="nav">
    <nav>
        <div class="navbar" id="insidenav">
            <div class="navbar-header">
                <a class="navbar-brand logo" href="#">DH JOB</a>
            </div>

            <ul class="nav navbar-nav">
                <li><a href="profile.php">
                        <?php echo $_SESSION['name']; ?><span class="sr-only">(current)</span>
                    </a></li>
                <li class="active"><a href="#">Xem Thông Tin Ứng Viên</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">Thêm<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="post_jobs.php">Đăng Tin Tuyển Dụng</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Quản Lí Tin</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">Tài Khoản<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="edit_profile.php">Chỉnh Sửa Thông Tin</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="change_pass.php">Đổi Mật Khẩu</a></li>
                    </ul>
                </li>
                <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Đăng Xuất</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div><!-- /.container-fluid -->

<body>
    <div class="container-fluid" id="content">
        <!-- ---------------------------------------------- nav ends ----------------------------------------------------------------------------->

        <aside class="col-sm-3" role="complementary" style="margin-top: 90px;">
            <!-- profile pic -->

            <div class="thumbnail text-center">
                <div class="img thumbnail">
                    <?php if ($row['photo'] != "") {
               echo "<img src = '../uploads/images/" . $row['photo'] . "' >";
           } else
               echo " <img src='../images/user_fallback.png'>";
           ?>
                </div>
                <strong>
                    <?php echo $row['cust_name']; ?>
                </strong>

                <p>
                    <?php if ($row['CV'] != "") {
                        
                echo "<br><a href = '../uploads/resume/" . $row['CV'] . "'class='btn-success' style='color:white;'>
                    Tải CV </a >";
            } ?>
                    <!-- profile pic --->
        </aside>

        <div class="col-sm-9">
            <div id="details" style="margin-top: 50px;">
                <h3 style="color: var(--primary-color)"> Thông Tin Ứng Viên:</h3>
                <table class="table">
                    <tr>
                        <td class="tbold">Họ Tên:</td>
                        <td>
                            <?php echo $row['cust_name']; ?>
                        </td>

                    </tr>
                    <tr>
                        <td class="tbold">Địa Chỉ Email:</td>
                        <td>
                            <?php echo $row['email']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tbold">Số Điện Thoại:</td>
                        <td>
                            <?php echo $row['phone']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tbold">Địa Chỉ:</td>
                        <td>
                            <?php echo $row['address']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tbold">Số Năm Kinh Nghiệm:</td>
                        <td>
                            <?php echo $row['experience']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tbold">Kĩ Năng Hiện Có:</td>
                        <td>
                            <?php echo $row['skills']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tbold">Trình Độ:</td>
                        <td>
                            <?php echo $row['basic_edu']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tbold">Ngành Nghề Mong Muốn:</td>
                        <td>
                            <?php echo $row['master_edu']; ?>
                        </td>
                    </tr>
                </table>
            </div> <!-- profile -->
            <button class="btn-danger" onclick="goBack()"><span
                    class="glyphicon glyphicon-arrow-left"></span>&nbsp;Trở Về
            </button>

        </div>
        </div>
    <div class="page-header" style="background: var(--primary-color)"></div>
    <footer class="footer">
        <div class="grid wide">
            <div class="row">
                <div class="col l-3 m-6 s-12">
                    <nav class="footer-nav">
                        <h2 class="logo">DH Job</h2>
                        <h4 class="footer-nav__title">Website Tìm Kiếm Việc Làm Trong Ngành Công Nghệ Thồn Tin</h4>
                        <h4 class="footer-nav__title">Địa chỉ: 19 Nguyễn Hữu Thọ, Phường Tân Phong, Quận 7, TP HCM
                        </h4>
                        <h4 class="footer-nav__title">SĐT: 0393024380</h4>
                        <h4 class="footer-nav__title">Email: trongduc20@gmail.com</h4>
                    </nav>
                </div>
                <div class="col l-3 m-6 s-12">
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
                <div class="col l-3 m-6 s-12">
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
                <div class="col l-3 m-6 s-12">
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
    </div>
    

</body>
<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>