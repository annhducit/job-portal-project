<?php

session_start();
include_once('../config.php');

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
    <link rel="stylesheet" href="../css/profile.css">

    <title>Xin Chào <?php echo $_SESSION['name']; ?></title>
</head>

<body>

    <div id="nav">
        <nav>
            <div class="navbar" id="insidenav">
                <ul class="nav navbar-nav">
                    <div class="navbar-header">
                        <a class="navbar-brand logo" href="../index.php">DH JOB</a>
                    </div>
                    <li class="active"><a href="#">Chỉnh Sửa Thông Tin<span class="sr-only">(current)</span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Thêm<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="post_jobs.php">Thêm Tin Tuyển Dụng</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="managejobs.php">Quản Lí Tin Tuyển Dụng</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Tài Khoản<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Chỉnh Sửa Thông Tin Công Ty/Doanh Nghiệp</a></li>
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
        <div class="background_profile">
            <img src="../images/background_profile.png" alt="" width="100%">
        </div>
        <br>
        <!-- <div class="jumbotron" align="center">
            <h1>Chỉnh Sửa Thông Tin Công Ty/Doanh Nghiệp</h1>
        </div> -->
        <form role="form" id="regcomp" onsubmit="return checkForm()" class="form-horizontal" method="post"
            action="process_edit_profile.php">

            <div class="page-header" style="background: var(--primary-color)"></div>
            <h3 class="h3style"> Chỉnh Sửa Thông Tin</h3>
            <div class="page-header"></div>

            <div class="form-group">
                <label class="control-label col-sm-4"> Tên Công Ty/Doanh Nghiệp:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="compname" id="compname"
                        placeholder="Nhập tên tông ty/doanh nghiệp" required
                        onblur="validate('company','comperror',this.value)">
                </div>
                <label class="error" id="comperror"></label>
            </div>


            <div class="form-group">
                <label for="addr" class="control-label col-sm-4">Địa Chỉ:</label>
                <div class="col-sm-5"><textarea id="addr" rows="5" name="addr" class="form-control" required
                        onblur="validate('address','addrerror',this.value)"></textarea>
                </div>
                <label class="error" id="addrerror"></label>
            </div>

            <div class="form-group">
                <label for="pincode" class="control-label col-sm-4">Pincode:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Nhập Pincode" name="pin_code" id="pin_code"
                        required style="width:200px" onblur="validate('pincode','pinerror',this.value)">
                </div>
                <label class="error" id="pinerror"></label>
            </div>


            <div class="form-group">
                <label class="control-label col-sm-4" for="city"> Vị Trí: </label>

                <div class="form-inline col-sm-5">
                    <input type="text" class="form-control" name="city" id="city" placeholder="City"
                        style="width:160px;" required onblur="validate('city','cityerror',this.value)">
                    <input type="text" class="form-control" name="country" id="country" placeholder="Country"
                        style="width:180px;" required onblur="validate('country','countryerror',this.value)">
                    <label id="cityerror" class="error"></label>
                    <label id="countryerror" class="error"></label>

                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="website"> Website Của Công Ty/Doanh Nghiệp:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="website" id="website"
                        placeholder="Nhập Địa Chỉ Website" style="width:457px" required
                        onblur="validate('website','weberror',this.value)">
                </div>
                <label class="error" id="weberror"></label>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4">Thông Tin Công Ty/Doanh Nghiệp:</label>
                <div class="col-sm-5">
                    <textarea placeholder="Mô Tả Công Ty/Doanh Nghiệp Của Bạn" name="about" class="form-control"
                        rows="5" required onblur="validate('longtext','abouterror',this.value)"></textarea>
                    <label class="error" id="abouterror"></label>
                </div>
            </div>
            <div class="form_btn">
                <button class="btn-success" type="submit" id="reg">Cập Nhật Thông Tin</button>
                <label for"reset" class="col-sm-2"> </label>
                <button class="btn-danger" type="reset" id="reset">Xóa Dữ Liệu</button>
            </div>
        </form>
    </div>
    <div class="page-header" style="background: var(--primary-color)"></div>

    <!-- Footer -->
    <footer class="footer">
        <div class="grid wide">
            <div class="row">
                <div class="m-6 col l-3 s-12">
                    <nav class="footer-nav">
                        <h2 class="logo">DH Job</h2>
                        <h4 class="footer-nav__title">Website Tìm Kiếm Việc Làm Trong Ngành Công Nghệ Thồn Tin</h4>
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
    <script type="text/javascript" src="../js/validate.js"></script>
    <script>
        function checkForm() {
            var compname = document.getElementById("comperror").innerHTML;
            var addr = document.getElementById("addrerror").innerHTML;
            var pincode = document.getElementById("pinerror").innerHTML;
            var city = document.getElementById("cityerror").innerHTML;
            var country = document.getElementById("countryerror").innerHTML;
            var website = document.getElementById("weberror").innerHTML;

            if (compname == "" && addr == "" && pincode == "" && city == "" && country == "" && website == "") {
                return true;
            } else {

                alert("Bạn vui lòng điền đầy đủ thông tin đầy đủ và chính xác!");
                return false;
            }

        }
    </script>
</body>

<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>