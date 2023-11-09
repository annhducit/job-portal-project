<?php
include_once('../config.php');
session_start();
if (!isset($_SESSION['id'])) {
    header('location:../login.php?msg=please_login');
}
$jobid = $_GET['jid'];
$query = mysqli_query($db1, "select * from trans_ads where id =" . $jobid);
$result = mysqli_fetch_array($query);
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
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
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script type="text/javascript">
        function apply(jobid) {
            var xmlhttp;
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
                    document.getElementById("applydiv").innerHTML = "Processing..";
                } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("applydiv").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("applydiv").innerHTML = "Lỗi. <a href='profile.php'>Bạn vui lòng thử lại</a>.";
                }
            }
            xmlhttp.open("GET", "apply_job.php?jid=" + jobid, true);
            xmlhttp.send();
        }
    </script>
    <title>Xem Tin</title>
</head>

<body>

    <div id="nav">
        <nav class="navbar-fixed-top">
            <div class="collapse navbar-collapse" id="insidenav">
                <div class="navbar-header">
                    <a class="navbar-brand logo" href="#">DH JOB</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="profile.php">
                            <?php echo "$_SESSION[jsname]"; ?><span class="sr-only">(current)</span>
                        </a></li>
                    <li class="active"><a href="#">Xem Công Việc</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Thêm<span class="caret"></span></a>
                        <ul class="dropdown-menu">

                            <li><a href="./view_applied.php">Công Việc Đã Ứng Tuyển</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="view_selected.php">Xem Công Việc Đã Chọn</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Tài Khoản<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="update_profile.php">Cập Nhập Thông Tin</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="change_pass.php">Đổi Mật Khẩu</a></li>

                        </ul>
                    </li>
                    <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Đăng Xuất</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="container">
        <?php
        $qc = mysqli_query($db1, "select * from mast_company join trans_ads where mast_company.id = trans_ads.e_id and trans_ads.id=" . $jobid);
        $res = mysqli_fetch_array($qc);
        ?>
        <h3>Chi Tiêt Của
            <?php echo $result['title']; ?> by
            <?php echo $res['Company_name']; ?>
        </h3>

        <div id="applydiv"></div>
        <div class="page-header" style="background: var(--primary-color)"></div>

        <div id="tablecontent">
            <h3 style="color: var(--primary-color)"> Thông Tin Công Việc: </h3>

            <table class="table table-responsive">
                <tr>
                    <td class="tbold">Công Ty/Doanh Nghiệp: </td>
                    <td>
                        <?php echo "<a href='view_emp.php?id=" . $result['e_id'] . "'>" . $res['Company_name'] . "</a>"; ?>
                    </td>
                </tr>
                <tr>
                    <td class="tbold">Tên Công Việc:</td>
                    <td>
                        <?php echo $result['title']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="tbold">Ngày Đăng:</td>
                    <td>
                        <?php echo $result['postdate']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="tbold">Mô Tả Công Việc:</td>
                    <td>
                        <?php echo $result['Description']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="tbold">Yêu Cầu Kinh Nghiệm:</td>
                    <td>
                        <?php echo $result['Exp_required'] . " "; ?>
                    </td>
                </tr>
                <tr>
                    <td class="tbold">Mức Lương:</td>
                    <td>
                        <?php echo $result['Salary']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="tbold">Lĩnh Vực Công Việc:</td>
                    <td>
                        <?php echo $result['Job_category']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="tbold">Địa Chỉ:</td>
                    <td>
                        <?php echo $res['City'] . ", " . $res['Country']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="tbold">Yêu Cầu Trình Độ:</td>
                    <td>
                        <?php echo $result['ugqual']; ?>
                    </td>

                </tr>
                <tr>
                    <td class="tbold">Ngành Nghề:</td>
                    <td>
                        <?php echo $result['pgqual']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="tbold">Địa Chỉ Website:</td>
                    <td>
                        <a href="<?php echo $res['Website']; ?>"><?php echo $res['Website']; ?></a>
                    </td>
                </tr>

            </table>

            <button class="btn-danger" onclick="goBack()"><span class="glyphicon glyphicon-arrow-left"></span> Trở
                Về</button>
            <button type="button" class="btn-success" onclick="apply(<?php echo $jobid; ?>)">
                <span class='glyphicon glyphicon-ok'></span> Ứng Tuyển
            </button>

        </div>
        <div class="page-header" style="background: var(--primary-color);"></div>
        <!-- Footer -->
        <footer class="footer">
            <div class="grid wide">
                <div class="row">
                    <div class="col l-3 m-6 s-12">
                        <nav class="footer-nav">
                            <h2 class="logo">DH Job</h2>
                            <h4 class="footer-nav__title">Website Tìm Kiếm Việc Làm Trong Ngành Công Nghệ Thông Tin</h4>
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
</body>


<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>