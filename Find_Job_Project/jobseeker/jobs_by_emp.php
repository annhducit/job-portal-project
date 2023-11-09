<?php
session_start();
include_once('../config.php');
$query = mysqli_query($db1, "select * from trans_ads where e_id = $_GET[eid]");
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/jobseeker.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/base.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../assets/footer.css">
    <link rel="stylesheet" href="../assets/grid.css">
    <link rel="stylesheet" href="../assets/base.css">
    <link rel="stylesheet" href="../assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Tất Cả Các Công Việc</title>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</head>

<body>>
    <div id="nav">
        <nav>
            <div class="navbar" id="insidenav">
                <div class="navbar-header">
                    <a class="navbar-brand logo" href="#">DH JOB</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="profile.php">
                            <?php echo "$_SESSION[jsname]"; ?><span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="active"><a href="#">Công Việc Của Bạn
                            <?php echo $_GET['ename']; ?>
                        </a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Thêm<span class="caret"></span></a>
                        <ul class="dropdown-menu">

                            <li><a href="view_applied.php">Công Việc Đã Ứng Tuyển</a></li>
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
                            <li><a href="#">Thay Đổi Mật Khẩu</a></li>

                        </ul>
                    </li>
                    <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Đăng Xuất</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="container" id="viewmain">
        <br>
        <br>
        <h3>Tất Cả Tin Tuyển Dụng Của
            <?php echo $_GET['ename']; ?>
        </h3><br>
        <button class="btn-danger" onclick="goBack()"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Trở
            Về</button>
        <div class="table-responsive">
            <table class="table table-responsive" style="margin-top: 30px;">
                <th>Tên Công Việc</th>
                <th>Mô Tả Công Việc</th>
                <th>Ngày Đăng</th>
                <th colspan="3">Trạng Thái</th>
                <?php
                while ($result = mysqli_fetch_array($query)) {
                    echo "<tr> ";
                    echo "<td>" . $result['title'] . "</td>";
                    echo "<td>" . substr($result['Description'], 0, 120) . " ........</td>";
                    echo "<td>" . $result['postdate'] . "</td>";
                    echo "<td> <a style='color: whitesmoke;'  href='view_jobs.php?jid=" . $result['id'] . "'> <button type='button' class='btn-success' style='width:150px'>Xem Công Việc</button></a> </td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
    <div class="page-header" style="background: var(--primary-color);"></div>
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
                        <h4 class="footer-nav__title">Email: trongduc05032002@gmail.com</h4>
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

<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>