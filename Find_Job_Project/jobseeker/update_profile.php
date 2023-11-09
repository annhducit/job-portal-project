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
    <link href="../css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/base.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../assets/footer.css">
    <link rel="stylesheet" href="../assets/grid.css">
    <link rel="stylesheet" href="../assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Update Profile -
        <?php echo $row['name_user']; ?>
    </title>
</head>

<body>

    <div id="nav">
        <nav class="navbar">
            <div class="navbar" id="insidenav">
                <div class="navbar-header">
                    <a class="navbar-brand logo" href="">DH JOB</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="profile.php">
                            <?php echo $row['name_user']; ?><span class="sr-only">(current)</span>
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
                            aria-expanded="false">Tào Khoản<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Cập Nhật Thông Tin</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="change_pass.php">Đổi Mật Khẩu</a></li>
                        </ul>
                    </li>
                    <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Đăng Xuất</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div><!-- /.container-fluid -->
    <div class="container">
        <div class="container">
            <!-- <div class="jumbotron" align="center">
                <h1>Cập Nhật Thông Tin</h1>
            </div> -->

            <form id="reguser" onsubmit="return checkForm()" METHOD="post" ACTION="process_update_profile.php"
                enctype="multipart/form-data" class="form-horizontal">

                <div class="page-header"></div>
                <h3 class="h3style">Cập Nhật Thông Tin Của Bạn</h3>

                <div class="form-group">
                    <label class="control-label col-sm-5" for="name">Cập Nhật Họ Tên Của Bạn:</label>
                    <div class="col-sm-4">
                        <input type="text" id="uname" placeholder="Tên Của Bạn" name="uname" class="form-control"
                            required onblur="validate('username','nameerror',this.value)">
                    </div>
                    <label id="nameerror" class="error"></label>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-5" for="address">Cập Nhật Địa Chỉ: </label>
                    <div class="form-inline col-sm-4">
                        <input type="text" id="address" placeholder="Số nhà" name="BuildId" class="form-control"
                            style="width:116px;" required onblur="validate('buildno','buildnoerror',this.value)">

                        <input type="text" id="address" placeholder="Tên đường" name="StreetId" class="form-control"
                            style="width:116px;" required onblur="validate('streetname','streetnameerror',this.value)">

                        <input type="number" id="address" placeholder="Pincode" name="Pin" class="form-control"
                            style="width:118px;" required onblur="validate('pinno','pinnoerror',this.value)">
                        <label id="buildnoerror" class="error"></label>
                        <label id="streetnameerror" class="error"></label>
                        <label id="pinnoerror" class="error"></label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-5" for="mobno">Cập Nhật Số Điện Thoại:</label>
                    <div class="form-inline col-sm-4">
                        <input type="text" name="mobno" placeholder="Số điện thoại" class="form-control" id="mobno"
                            required onblur="validate('mobilenum','mobnoerror',this.value)">
                    </div>
                    <label id="mobnoerror" class="error"></label>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-5" for="Location"> Cập Nhật Địa Chỉ: </label>
                    <div class="form-inline col-sm-4">
                        <input type="text" id="Location" placeholder="Quốc gia" name="Country" class="form-control"
                            style="width:116px;" required onblur="validate('country','countryerror',this.value)">
                        <input type="text" id="Location" placeholder="Quốc tịch" name="State" class="form-control"
                            style="width:116px;" required onblur="validate('state','stateerror',this.value)">
                        <input type="text" id="Location" placeholder="Thành phố" name="City" class="form-control"
                            style="width:118px;" required onblur="validate('city','cityerror',this.value)">
                        <label id="countryerror" class="error"></label>
                        <label id="stateerror" class="error"></label>
                        <label id="cityerror" class="error"></label>
                    </div>
                </div>
                <div class="page-header"></div>
                <div class="page-header" style="background: var(--primary-color)"></div>
                <h3 class="h3style"> Cập Nhật Kinh Nghiệm Làm Việc Của Bạn</h3>

                <div class="form-group">
                    <label for="experience" class="control-label col-sm-5">Cập Nhật Số Năm Kinh Nghiệm:</label>
                    <div class="col-sm-4">
                        <select name="experience" class="form-control" id="experience" required>
                            <option value="">Lựa chọn</option>
                            <option value="0 Năm/Fresher"> Fresher </option>
                            <option value="1-2 Năm">1-2 Năm </option>
                            <option value="3-5 Năm">3-5 Năm </option>
                            <option value="Hơn 5 Năm">Hơn 5 Năm </option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-5" for="skills">Cập Nhật Kĩ Năng Của Bạn:</label>
                    <div class="col-sm-4"><input type="text" name="skills" placeholder="Kĩ năng" class="form-control"
                            name="skills" id="skills" required onblur="validate('text','skillerror',this.value)">
                    </div>
                    <label id="skillerror" class="error"></label>
                </div>
                <div class="page-header"></div>
                <div class="page-header" style="background: var(--primary-color)"></div>
                <h3 class="h3style"> Cập Nhật Trình Độ/Ngành Nghề </h3>
                <div class="form-group">
                    <label class="control-label col-sm-5" for="ugcourse">Cập Nhật Trình Độ Giáo Dục: </label>
                    <div class="col-sm-4"> <select name="ugcourse" id="ugcourse" class=" form-control" required>
                            <option value="">Lựa chọn</option>
                            <option value="THPT">Không Có</option>
                            <option value="THPT">THPT</option>
                            <option value="THCS">THCS</option>
                            <option value="ĐH">ĐH</option>
                            <option value="CĐ">CĐ</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-5" for="pgcourse">Cập Nhật Ngành Nghề:</label>
                    <div class="col-sm-4"> <select name="pgcourse" id="pgcourse" class="form-control" required>
                            <option value="">Lựa chọn</option>
                            <option value="Web developer">Web developer</option>
                            <option value="Front-end developer">Front-end developer</option>
                            <option value="Cyber security specialist">Cyber security specialist</option>
                            <option value="QA/QC Engineer">QA/QC Engineer</option>
                            <option value="Bridge System Engineer">Bridge System Engineer</option>
                            <option value="Data scientist">Data scientist</option>
                            <option value="App developer">App developer</option>
                            <option value="Game developer"> Game developer</option>
                            <option value="Business Analytics">Business Analytics</option>
                            <option value="Tester">Tester</option>
                            <option value="Developer PHP">Developer PHP</option>
                            <option value="Content Creator">Content Creator</option>
                            <option value="Network Engineer">Network Engineer</option>
                            <option value="Mobile Developer">Mobile Developer</option>
                            <option value="JavaScript Developer">JavaScript Developer</option>
                            <option value="Data Analyst">Data Analyst</option>
                            <option value="IT Support Engineers">IT Support Engineers</option>
                            <option value="Manage System">Manage System</option>

                            
                        </select>
                    </div>
                </div>
                <div class="page-header"> </div>
                <div class="form_btn-register" style="margin-right: 200px;">
                    <button class="btn-success" type="submit" id="reg" value="submit">Cập Nhật</button>
                    <label class="col-sm-2"></label>
                    <button class="btn-danger" type="reset" id="reset">Xóa Dữ Liệu</button>
                </div>
            </form>
        </div>
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
    <script type="text/javascript" src="../js/validate.js"></script>
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <link href="../css/main.css" rel="stylesheet">
    <!-- <link href="../css/jobseeker.css" rel="stylesheet"> -->
    <script src="../js/jquery-1.12.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function checkForm() {

            var name = document.getElementById("nameerror").innerHTML;
            var address1 = document.getElementById("buildnoerror").innerHTML;
            var address2 = document.getElementById("streetnameerror").innerHTML;
            var address3 = document.getElementById("pinnoerror").innerHTML;
            var mobno = document.getElementById("mobnoerror").innerHTML;
            var location1 = document.getElementById("countryerror").innerHTML;
            var location2 = document.getElementById("stateerror").innerHTML;
            var location3 = document.getElementById("cityerror").innerHTML;
            var skills = document.getElementById("skillerror").innerHTML;

            if (name == "" && address1 == "" && address2 == "" && address3 == "" && mobno == '' && skills == '') {

                return true;
            }
            else {
                alert("Fill in with correct information");
                return false;

            }
        }
    </script>
</body>

</html>