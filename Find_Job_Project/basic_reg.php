<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Find_Job_Project/bootstrap/dist/css/bootstrap.min.css" />
    <link href="../Find_Job_Project/css/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="../Find_Job_Project/assets/base.css">
    <link rel="stylesheet" href="../Find_Job_Project/css/home.css">
    <link rel="stylesheet" href="../Find_Job_Project/assets/footer.css">
    <link rel="stylesheet" href="../Find_Job_Project/assets/grid.css">
    <link rel="stylesheet" href="../Find_Job_Project/assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Đăng kí tài khoản</title>
    <script type="text/javascript" src="../Find_Job_Project/js/validate.js"></script>
    <script src="../Find_Job_Project/js/jquery-1.12.0.min.js"></script>
    <script src="../Find_Job_Project/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar" id="insidenav">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand logo" href="../Find_Job_Project/index.php">DH JOB</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Đăng Kí</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../Find_Job_Project/login.php"><span class="glyphicon glyphicon-log-in"></span> Đăng
                        Xuất</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="banner_register">
            <img src="./images/banner_register.jpg" width="1140px" height="400px" alt="">
        </div>
        <div class="page-header" style="background: #327ce2"></div>
        <form id="reguser" onsubmit="return checkForm()" METHOD="post" ACTION="process_basic.php"
            enctype="multipart/form-data" class="form-horizontal">
            <h3 class="h3style"> Nhập Thông Tin Đăng Kí</h3>

            <div class="form-group">
                <label class="control-label col-sm-4" for="name_user">Nhập Tên Người Dùng:</label>
                <div class="col-sm-5">
                    <input type="text" name="name_user" placeholder="Nhập Tên" class="form-control" id="name_user"
                        required onblur="validate('username','nameerror',this.value)">
                </div>
                <label id="nameerror" class="error"></label>
            </div>
            <div class="form-group">
                <label for="sex" class="control-label col-sm-4"> Giới Tính:</label>
                <div class="col-sm-5">
                    <select name="sex" class="form-control" id="sex" required>
                        <option value="m" selected>Nam</option>
                        <option value="f">Nữ</option>
                        <option value="o">Khác</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="acc_type" class="control-label col-sm-4"> Người Đăng Kí Tài Khoản:</label>
                <div class="col-sm-5">
                    <select name="acc_type" class="form-control" id="acc_type" required>
                        <option value=""> Bấm Vào Để Chọn </option>
                        <option value="j">Người Tìm Việc </option>
                        <option value="e">Nhà Tuyển Dụng</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="email">Nhập Địa Chỉ Email:</label>
                <div class="col-sm-5">
                    <input type="email" name="useremail" placeholder="Nhập Địa Chỉ Email Của Bạn" class="form-control"
                        id="email" required onblur="validate('email','emailerror',this.value)">
                </div>
                <label id="emailerror" class="error"></label>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="passnew"> Nhập Mật Khẩu:</label>
                <div class="col-sm-5"> <input type="password" id="passnew" placeholder="Nhập Mật Khẩu" name="pass1"
                        class="form-control" required onblur="validate('password','passerror',this.value)">
                </div>
                <label id="passerror" class="error"></label>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="passconf">Xác Nhận Mật Khẩu:</label>
                <div class="col-sm-5">
                    <input type="password" id="passconf" placeholder="Nhập Lại Mật Khẩu" name="pass2"
                        class="form-control" required>
                </div>
                <label class="error" id="passerror2"></label>
            </div>

            <div class="form_btn-register" style="margin-right: -45px;">
                <button class="btn-success" type="submit" id="reg" value="submit">Đăng Kí</button>
                <label class="col-sm-2"></label>
                <button class="btn-danger" type="reset" id="reset"> Xóa Dữ Liệu </button>
            </div>
    </div>
    </form>
    <div class="page-header" style="background: #327ce2"></div>
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
<script type="text/javascript">
    function checkForm() {
        var name = document.getElementById("nameerror").innerHTML;
        var email = document.getElementById("emailerror").innerHTML;
        var pass1 = document.getElementById("passerror").innerHTML;
        var pass2 = document.getElementById("passerror2").innerHTML;
        var p1 = document.getElementById("passnew").value;
        var p2 = document.getElementById("passconf").value;
        if (p1 != p2) {
            document.getElementById("passerror2").innerHTML = "Mật Khẩu Không Trùng Khớp";
        } else {
            document.getElementById("passerror2").innerHTML = "";
        }

        if (name == "" && email == '' && pass1 == '' && pass2 == '') {
            return true;
        } else {
            alert("Bạn Vui Lòng Điền Thông Tin Đầy Đủ Và Chính Xác");
            return false;

        }
    }
</script>

</html>