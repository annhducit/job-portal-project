<?php
include_once('../config.php');
session_start();
$id = $_SESSION['id'];
if (isset($_SESSION['id']) && ($_SESSION['type'] = "j")) {
    $q = "select * from mst_user join mast_customer on mst_user.id=mast_customer.user_id WHERE mst_user.id = $id";
    $result = mysqli_query($db1, $q);
    $row = mysqli_fetch_array($result);
    $_SESSION['jsname'] = $row['cust_name'];
    $_SESSION['jsid'] = $row['id'];
} else {
    header('location:../login.php?msg=please_login');
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
    <title>Thay Đổi Mật Khẩu -
        <?php echo $row['name_user']; ?>
    </title>
</head>

<body>
    <div id="nav">
        <nav class="navbar">
            <div class="navbar" id="insidenav">
                <div class="navbar-header">
                    <a class="navbar-brand logo" href="#">DH JOB</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="profile.php">
                            <?php echo $row['cust_name']; ?><span class="sr-only">(current)</span>
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
            </div><!-- /.navbar-collapse -->
        </nav>
    </div><!-- /.container-fluid -->
    <div class="container-fluid">
            <div class="jumbotron" align="center">
                <img src="../images/banner_changepw.jpg" alt="" width="100%">
            </div>
            <form id="reguser" onsubmit="return checkForm()" METHOD="post" ACTION="process_change_pass.php"
                enctype="multipart/form-data" class="form-horizontal"></br>
                <div class="form-group">
                    <label class="control-label col-sm-5 " for="passnew">Tạo Mật Khẩu Mới:</label>
                    <div class="col-sm-4"> <input type="password" id="passnew" placeholder="Nhập Mật Khẩu Mới"
                            name="pass1" class="form-control" required
                            onblur="validate('password','passerror',this.value)">
                    </div>
                    <label id="passerror" class="error"></label>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-5" for="passconf">Nhập Lại Mật Khẩu Mới:</label>
                    <div class="col-sm-4">
                        <input type="password" id="passconf" placeholder="Nhập Lại Mật Khẩu Mới" name="pass2"
                            class="form-control" required>
                    </div>
                    <label class="error" id="passerror2"></label>
                </div> <br>
                <div class="form-group form-inline col-sm-6" style="float: right">
                    <button class="btn-success" type="submit" id="reg" value="submit">Lưu</button>
                    <label class="col-sm-2"></label>
                    <button class="btn-danger" type="reset" id="reset">Xóa Dữ Liệu</button>

                </div>
            </form>
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
<script src="../js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="../js/validate.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
    function checkForm() {
        var pass1 = document.getElementById("passerror").innerHTML;
        var pass2 = document.getElementById("passerror2").innerHTML;

        var p1 = document.getElementById("passnew").value;
        var p2 = document.getElementById("passconf").value;
        if (p1 != p2) {
            document.getElementById("passerror2").innerHTML = "Password Donot Match";
        }
        else {
            document.getElementById("passerror2").innerHTML = "";

        }

        if (pass1 == '' && pass2 == '') {
            return true;
        }
        else {
            alert("Bạn vui lòng điền đầy đủ các thông tin và chính xác");
            return false;

        }
    }
</script>

</html>