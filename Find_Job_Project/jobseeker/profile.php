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
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/base.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../assets/footer.css">
    <link rel="stylesheet" href="../assets/grid.css">
    <link rel="stylesheet" href="../assets/base.css">
    <link rel="stylesheet" href="../assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Thông Tin -
        <?php echo $row['name_user']; ?>
    </title>
    <script type="text/javascript">
        function advsearch() {
            var experience = document.getElementById("experience").value;
            var qual = document.getElementById("qual").value;
            var xmlhttp;
            if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else { // for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
                    document.getElementById("subcontent").innerHTML = "Searching..";
                } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("subcontent").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("subcontent").innerHTML =
                        "Lỗi. <a href='profile.php'>Khởi chạy lại trang</a>";
                }
            }
            xmlhttp.open("GET", "adv_search.php?exp=" + experience + "&qual=" + qual, true);
            xmlhttp.send();
        }
    </script>
</head>

<body>
    <div id="nav">
        <nav class="navbar">
            <div class="navbar" id="insidenav">
                <div class="navbar-header">
                    <a class="navbar-brand logo" href="../index.php">DH JOB</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="profile.php">Thông Tin Cá Nhân<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Thêm<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="view_applied.php">Xem Việc Làm Đã Ứng Tuyển</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="view_selected.php">Xem Việc Làm Đã Chọn</a></li>
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
                            <li><a href="change_pass.php">Đổi Mật Khẩu</a></li>
                        </ul>
                    </li>
                    <li><a href="../logout.php"><span class="glyphicon glyphicon-log-in"></span> Đăng Xuất</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div><!-- /.container-fluid -->
    <div class="bmsTop">
        <ul>
            <li style="font-size: 15px; font-weight: bold">Nhà Tuyển Dụng Hàng Đầu: </li>
            <li><a href="#" target="_blank">
                    <img class="img_ntd" src="../images/it1.png" border="0">
                </a></li>
            <li><a href="#" target="_blank">
                    <img class="img_ntd" src="../images/it2.png" border="0">
                </a></li>
            <li><a href="#" target="_blank">
                    <img class="img_ntd" src="../images/it3.png" border="0"></a>
            </li>
            <li><a href="#" target="_blank">
                    <img class="img_ntd" src="../images/it4.png" border="0"></a></li>
            <li><a href="#" target="_blank">
                    <img class="img_ntd" src="../images/it5.png" border="0"></a>
            </li>
            <li><a href="#" target="_blank">
                    <img class="img_ntd" src="../images/it6.png" border="0"></a>
            </li>
        </ul>
    </div>
    <!------------------------------------------------------------------------------- -->
    <div class="container-fluid" id="content">
        <div id="header" class="row">
            <img src="../images/banner_register.jpg" alt="" width="100%" height="400px">
        </div>
        <aside class="col-sm-3" role="complementary" style="margin-top:75px">
            <!-- profile pic -->
            <div class="text-center thumbnail">
                <div class="thumbnail img ">
                    <?php if ($row['photo'] != "") {
                        echo "<img src = '../uploads/images/" . $row['photo'] . "' >";
                    } else
                        echo " <img src='../images/user_fallback.png'>"; ?>
                </div>
                <strong>
                    <?php echo $row['cust_name']; ?>
                </strong>
                <p><button type="button" class="btn-success" data-toggle="modal" data-target="#changeimg">Thay Đổi
                        Ảnh</button></p>
                <!--------------------------- profile pic --------------------------------------- -->
                <div class="modal fade" id="changeimg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Thay Đổi Hoặc Tải Ảnh Lên</h4>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="../upload.php?type=image" enctype="multipart/form-data">
                                    <div class="form-group form-inline">
                                        <label for="file" class="control-label">Chọn Ảnh:</label>
                                        <input type=file name="file" id="file" class="form-control">
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                <button type="submit" id="submit" name="submit" class="btn btn-primary">Lưu
                                    Thay Đổi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- profile pic -->

        </aside>
        <div class="page-header" style="background: var(--primary-color)"></div>
        <!------------------------------------------------------------------------------- -->
        <section class="col-sm-9">
            <div id="searchcontent">
                <!-- Search content overlay div starts here --------------------------------------- -->
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#details">Thông Tin Của Bạn</a></li>
                    <li><a data-toggle="tab" href="#resume">Cập Nhật CV</a></li>
                    <li><a data-toggle="tab" href="#advsearch">Tìm Kiếm Việc Làm</a></li>
                </ul>

                <!------------------------------------------------------------------------------- -->

                <div class="tab-content">
                    <div id="details" class="tab-pane fade in active" style="margin-top: 50px;">
                        <h3>Thông Tin</h3>
                        <table class="table">
                            <tr>
                                <td class="tbold">Họ Tên:</td>
                                <td>
                                    <?php echo $row['cust_name']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tbold">Email:</td>
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
                                    <?php echo $row['city'] . " , " . $row['state'] . " , " . $row['country']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tbold">Số Năm Kinh Nghiệm:</td>
                                <td>
                                    <?php echo $row['experience']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tbold">Kĩ Năng Đang Có:</td>
                                <td>
                                    <?php echo $row['skills']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tbold">Bằng Cấp Đơn Giản:</td>
                                <td>
                                    <?php echo $row['basic_edu']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tbold">Bằng Cấp Cao Cấp:</td>
                                <td>
                                    <?php echo $row['master_edu']; ?>
                                </td>
                            </tr>
                        </table>
                    </div> <!-- profile -->
                    <div id="resume" class="tab-pane fade">
                        <div>
                            <form action="../upload.php?type=file" enctype="multipart/form-data" method="post">
                                <?php if ($row['CV'] == "") {
                                    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                                    <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                    <p style='font-size: 20px'><strong>Ghi Chú: </strong>Bạn Chưa Tải Lên CV</p>
                                            </div>";
                                } ?>
                                <h4>Tải Lên CV:</h4>
                                <hr style="background-color: darkslateblue;">
                                <div class="form-group" align="center">
                                    <label class="form-group col-sm-3" for="file"
                                        style="font-size:16px; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chọn CV Của
                                        Bạn:</label>
                                    <div class="col-sm-7 form-inline">
                                        <input type="file" name="file" id="resumefile" class="form-control"> <br><br>
                                        <button class="btn btn-success" type="submit" name="submit" value="submit">Tải
                                            Lên</button>
                                    </div>
                                </div>
                            </form>

                            <?php if ($row['CV'] != "") {
                                echo "<div align='center'><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href = '../uploads/resume/" . $row['CV'] . "' class='btn bg-primary' style='color:white;' >Tải Xuống CV</a ></div>";
                            } ?>
                            <br>

                        </div>
                    </div> <!-- resume -->
                    <!------------------------------------------------------------------------------- -->

                    <div id="advsearch" class="tab-pane fade">
                        <div class="container-fluid" id="advsearch">
                            <h2>Tìm Kiếm Việc Làm</h2>
                            <form role="form">
                                <table>
                                    <tr>
                                        <td class="tbold">Số Năm Kinh Nghiệm:</td>
                                        <td>
                                            <div class="dropdown">
                                                <select name="experience" class="form-control" id="experience" required>
                                                    <option value="">Lựa Chọn</option>
                                                    <option value="0 Năm/Fresher">Fresher</option>
                                                    <option value="1 Năm">1 Năm</option>
                                                    <option value="2 Năm">2 Năm</option>
                                                    <option value="3 Năm">3 Năm</option>
                                                    <option value="4 Năm">4 Năm </option>
                                                    <option value="Trên 5 Năm"> Trên 5 Năm</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tbold">Lĩnh Vực Công Việc:</td>
                                        <td>
                                            <div class="dropdown"> <select name="ugcourse" id="qual"
                                                    class=" form-control" required>
                                                    <option value="">Lựa chọn</option>
                                                    <optgroup label="Công Việc">
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
                                                        <option value="Mobile Developer">FullStack Developer</option>
                                                        <option value="JavaScript Developer">JavaScript Developer </option>
                                                        <option value="Data Analyst">Data Analyst</option>
                                                        <option value="IT Support Engineers">IT Support Engineers</option>
                                                        <option value="Manage System">Manage System</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><button type="button" onclick="advsearch()" class="btn btn-success"><span
                                                    class="glyphicon glyphicon-search"></span> Tìm Kiếm</button></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <hr>
                        <div id="subcontent">
                        </div>
                    </div>
                    
                </div> 

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
                        <h2 class="logo">DH JOB</h2>
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
<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
<link href="../css/main.css" rel="stylesheet">
<script src="search.js"></script>
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>