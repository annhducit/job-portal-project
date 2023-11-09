<?php
include_once('../config.php');
session_start();
if (!isset($_SESSION['id'])) {
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
    <link href="../css/jobseeker.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/base.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../assets/footer.css">
    <link rel="stylesheet" href="../assets/grid.css">
    <link rel="stylesheet" href="../assets/base.css">
    <link rel="stylesheet" href="../assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Đăng Tin Tuyển Dụng</title>
</head>

<body>
    <div id="nav">
        <nav>
            <div class="navbar" id="insidenav">
                <div class="navbar-header">
                    <a class="navbar-brand logo" href="#">DH JOB</a>
                </div>

                <ul class="nav navbar-nav">
                    <li><a href="../employer/profile.php">
                            <?php echo $_SESSION['name']; ?><span class="sr-only">(current)</span>
                        </a></li>
                    <li class="active"><a href="#">Đăng Tin Tuyển Dụng</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Thêm<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="post_jobs.php">Đăng Tin Tuyển Dụng</a></li>
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


    <div class="container">
        <br />
        <center>
            <h2 style="color: var(--primary-color)">Đăng Tin Tuyển Dụng</h2>
        </center>
        <div class="page-header" style="background: var(--primary-color)"></div>
        <h3>Chi Tiết Công Việc: </h3>
        <form id="job_post" role="form" onsubmit="return checkForm();" method="post" class="form-horizontal"
            action="process_postjob.php">

            <div class="form-group">
                <label for="desig" class="control-label col-sm-5">Tên Công Việc:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="desig" id="desig" required
                        onblur="validate('text','deser', this.value);">
                </div>
                <label id="deser" class="error"></label>
            </div>



            <div class="form-group">
                <label for="job_desc" class="control-label col-sm-5">Mô Tả Công Việc:</label>
                <div class="col-sm-5"> <textarea class="form-control" rows="5" id="job_desc" name="jobdesc" required
                        onblur="validate('longtext','jober',this.value)"></textarea> </div>
                <label class="error" id="jober"></label>
            </div>

            <div class="form-inline form-group">
                <label for="exp" class="control-label col-sm-5">Số Năm Kinh Nghiệm:</label>
                <div class="col-sm-5">
                    <select class="form-control" name="exp" required name="exp" id="exp">
                        <option value="">Lựa Chọn</option>
                        <option value="0 Năm/Fresher">Fresher</option>
                        <option value="1 Năm">1 Năm</option>
                        <option value="2 Năm">2 Năm</option>
                        <option value="3 Năm">3 Năm</option>
                        <option value="4 Năm">4 Năm</option>
                        <option value="5 Năm">5 Năm</option>
                        <option value="Trên 5 Năm"> Trên 5 Năm</option>
                    </select>
                </div>
            </div>

            <div class="form-inline form-group">
                <label for="pay-div" class="control-label col-sm-5">Mức Lương:</label>
                <div class="col-sm-5" id="pay-div">
                    <select class="form-control" id="money" name="money">
                        <option value="VNĐ"> VNĐ </option>
                        <option value="USD"> USD </option>
                    </select>
                    <input type="text" class="form-control" id="pay" name="pay" required
                        onblur="validate('digit','payer',this.value)">
                </div>
                <label class="error" id="payer"></label>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-5">Lĩnh Vực Công Việc:</label>
                <div class="col-sm-5">
                    <select name="jobtype" id="jobtype" class="form-control" required>
                        <option selected="selected" value="">Lựa Chọn Lĩnh Vực</option>
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
                        <option value="Back-end Developer">Back-end Developer</option>
                        <option value="Fullstack Developer">Fullstack Developer</option>
                        <option value="JavaScript Developer">JavaScript Developer</option>
                        <option value="Data Analyst">Data Analyst</option>
                        <option value="IT Support Engineers">IT Support Engineers</option>
                        <option value="Manage System">Manage System</option>
                    </select>
                </div>
            </div>
            <h3>Hồ Sơ Yêu Cầu:</h3>
            <div class="page-header">
            <div class="form-group">
                <label for="ugcourse[]" class="control-label col-sm-5">Yêu Cầu Trình Độ:</label>
                <div class="col-sm-5">
                    <select name="ugcourse[]" id="ugcourse[]" class="form-control" multiple="multiple" required>
                        <option value="THPT">Không Có</option>
                        <option value="THPT">THPT</option>
                        <option value="THCS">THCS</option>
                        <option value="ĐH">ĐH</option>
                        <option value="CĐ">CĐ</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="pgcourse[]" class="control-label col-sm-5">Ngành Nghề:</label>
                <div class="col-sm-5">
                    <select name="pgcourse[]" id="pgcourse[]" class="form-control" multiple="multiple" required>
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
                        <option value="Fullstack Developer">Fullstack Developer</option>
                        <option value="JavaScript Developer">JavaScript Developer</option>
                        <option value="Data Analyst">Data Analyst</option>
                        <option value="IT Support Engineers">IT Support Engineers</option>
                        <option value="Manage System">Manage System</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-sm-3" style="float: right;">
                <button class="btn-success" type="submit" id="postbtn">Đăng Tin</button>
            </div>
    </div>
    </form>
    </div>

    <div class="page-header" style="background: var(--primary-color)"></div>
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
                                <a class="nav__link">1800 1096</a>
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

<script>
    function checkForm() {
        // Fetching values from all input fields and storing them in variables.
        var desig = document.getElementById("deser").innerHTML;
        var desc = document.getElementById("jober").innerHTML;
        var pay = document.getElementById("payer").innerHTML;
        //Check input Fields Should not be blanks.

        if (desig == '' && desc == '' && pay == '') {
            return true;
        }
        else {
            alert("Fill in with correct information");
            return false;
        }
    }
</script>
<script type="text/javascript" src="../js/validate.js"></script>
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>