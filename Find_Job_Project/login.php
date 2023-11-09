<!Doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link href="css/signin.css" rel="stylesheet">
    <link href="css/home.css" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="./css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/footer.css">
    <link rel="stylesheet" href="./assets/grid.css">
    <link rel="stylesheet" href="./assets/base.css">
    <link rel="stylesheet" href="./assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function () {
            function disableBack() {
                window.history.forward()
            }

            window.onload = disableBack();
            window.onpageshow = function (evt) {
                if (evt.persisted) disableBack()
            }
        });
    </script>
    <title>Đăng Nhập</title>
</head>

<body>
    <nav class="navbar" id="insidenav">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand logo" href="../Find_Job_Project/index.php">DH JOB</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Đăng Nhập</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="basic_reg.php">
                        <span class="glyphicon glyphicon-user"></span> Đăng Kí </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container col-sm-12">
        <form class="form-signin" action="process_login.php" method="post">
            <div class="title_heading">
                <h2 class="form-signin-heading" style="color: var(--primary-color)">Đăng Nhập</h2>
            </div>
            <label for="inputEmail" style="color: var(--primary-color);">Email address</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Nhập địa chỉ Email" required autofocus
                name="email">
            <br>
            <label for="inputPassword" style="color: var(--primary-color);">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Nhập mật khẩu" required
                name="password">
            <div class="checkbox">
                <label><input type="checkbox" value="remember-me"> Remember me </label>
                <a href="forget.php" style="font-weight:bold">/Forgot Password</a>
            </div>
            <button class="btn_login" type="submit">Đăng Nhập</button>
        </form>
        <!-- footer -->
        <div class='page-header' style='background:var(--primary-color)'></div>
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
    </div>
    <!-- Footer -->
    <!-- Footer -->
</body>
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>