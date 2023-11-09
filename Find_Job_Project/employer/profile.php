<?php
session_start();
include_once('../config.php');

if (!isset($_SESSION['id'])) {
    header('location:../login.php?msg=please_login');
} else {
    $eid = $_SESSION['id'];
    $q = "select * from mst_user join mast_company on mst_user.id=mast_company.user_id WHERE mst_user.id = $eid";
    $result = mysqli_query($db1, $q); 
    $row = mysqli_fetch_assoc($result);
    $_SESSION['e_id'] = $row['id'];
    $_SESSION['name'] = $row['Company_name'];

}
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <link href="../css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/base.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../assets/footer.css">
    <link rel="stylesheet" href="../assets/grid.css">
    <link rel="stylesheet" href="../assets/base.css">
    <link rel="stylesheet" href="../assets/font-awesome-4.7.0/css/font-awesome.min.css">

    <title>Xin Chào
        <?php echo $_SESSION['name']; ?>
    </title>
</head>

<body>

    <div id="nav">
        <nav>
            <div class="navbar" id="insidenav">
                <ul class="nav navbar-nav">
                    <div class="navbar-header">
                        <a class="navbar-brand logo" href="#">DH JOB</a>
                    </div>
                    <li class="active"><a href="#">Thông Tin Công Ty/Doanh Nghiệp<span
                                class="sr-only">(current)</span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Thêm<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="post_jobs.php">Thêm Tin Tuyển Dụng</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="managejobs.php">Quản Lí Tin</a></li>

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
    <div class="container-fluid" id="content">
        <div id="header" class="row">
            <img src="../images/banner_employer.jpeg" alt="" width="100%" height="400px">
        </div>

        <aside class="text-center col-sm-3" role="complementary" style="margin-top:110px">
            <div class="text-center thumbnail">
                <div class="img thumbnail">
                    <?php if ($row['logo'] != "") {
                        echo "<img src = '../uploads/logo/" . $row['logo'] . "'>";
                    } else
                        echo " <img src='../images/fallbacklogo.jpg'>";
                    ?>
                </div>

                <strong>
                    <?php echo $row['Company_name']; ?>
                </strong><br>
                <p><button class="btn-success" data-toggle="modal" data-target="#changelogo">Đổi Logo Công Ty/Doanh
                        Nghiệp
            </div>

            <!------------- logo ------------------------------------- -->
            <div class="modal fade" id="changelogo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Thay Đổi Hoặc Tải Lên Logo Công Ty/Doanh Nghiệp
                            </h4>
                        </div>
                        <form method="post" action="../upload.php?type=logo" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group form-inline">
                                    <label for="file" class="control-label">Chọn Logo:</label>
                                    <input type=file name="file" id="file" class="form-control">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn-danger" data-dismiss="modal">Đóng</button>
                                <button type="submit" id="submit" name="submit" class="btn-success">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </aside>
        <div class="page-header" style="background: var(--primary-color)"></div>
        <section class="col-sm-9">
            <div id="details" class="container-wrap" style="margin-top: 50px;">
                <h3 style="color: var(--primary-color)">Thông Tin Công Ty/Doanh Nghiệp:</h3>
                <table class="table">
                    <tr>
                        <td class="tbold">Tên Công Ty/Doanh Nghiệp:</td>
                        <td><strong>
                                <?php echo $row['Company_name']; ?>
                            </strong></td>
                    </tr>
                    <tr>
                        <td class="tbold">Địa Chỉ:</td>
                        <td>
                            <?php echo $row['Address']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tbold">Pincode:</td>
                        <td>
                            <?php echo $row['Zip']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tbold">Địa Chỉ Email:</td>
                        <td>
                            <?php echo $row['email']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tbold">Website Công Ty/Doanh Nghiệp:</td>
                        <td>
                            <?php echo $row['Website']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tbold">Thông Tin Về Công Ty/Doanh Nghiệp:</td>
                        <td>
                            <?php echo $row['Profile']; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </section>
    </div>
    <div class="page-header" style="background: var(--primary-color)"></div>
    <!-- Footer -->
    <footer class="footer">
        <div class="grid wide">
            <div class="row">
                <div class="m-6 col l-3 s-12">
                    <nav class="footer-nav">
                        <h2 class="logo">DH Job</h2>
                        <h4 class="footer-nav__title">Website Tìm Kiếm Việc Làm Trong Ngành Công Nghệ Thông Tin</h4>
                        <h4 class="footer-nav__title">Địa chỉ: 19 Nguyễn Hữu Thọ, Phường Tân Phong, Quận 7, TP HCM</h4>
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
                                <a class="nav__link">1800 1096</a>
                                <a class="nav__link">Tìm việc làm</a>
                                <a class="nav__link">Cách viết CV</a>
                                <a class="nav__link">Tạo CV</a>
                                <a class="nav__link">Cẩm nang nghề nghiệp</a>
                                <a class="nav__link">Thông tin tham khảo</a>
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

<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>