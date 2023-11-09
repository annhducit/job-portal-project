<?php
include_once('../config.php');
session_start();
$q1 = mysqli_query($db1, "select * from trans_apply where adv_id=$_GET[jobid]");
$q3 = mysqli_query($db1, "select * from trans_ads where id = $_GET[jobid]");
$q3row = mysqli_fetch_array($q3);
$emp_id = $_SESSION['e_id'];
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
    <title>Manage Jobs</title>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script type="text/javascript">
        function selectJs(user, job, emp) {
            var xmlhttp;
            if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else { // for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
                    document.getElementById("message").innerHTML = "Processing Request..";
                } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("message").innerHTML = xmlhttp.responseText;
                } 
            }
            xmlhttp.open("GET", "process_select.php?user=" + user + "&job=" + job + "&emp=" + emp, true);
            xmlhttp.send();
        }
        function rejectJs(user, job, emp) {
            var xmlhttp;
            if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else { // for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
                    document.getElementById("message").innerHTML = "Processing Request..";
                } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("message").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("message").innerHTML = "Lỗi. <a href='manage_applicants.php?jobid='>Reload Or Try Again</a> the page.";
                }
            }
            xmlhttp.open("GET", "process_reject.php?user=" + user + "&job=" + job + "&emp=" + emp, true);
            xmlhttp.send();
        }
    </script>
</head>

<body>

    <div id="nav">
        <nav>
            <div class="navbar" id="insidenav">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">DH JOB</a>
                </div>

                <ul class="nav navbar-nav">
                    <li><a href="profile.php">
                            <?php echo $_SESSION['name']; ?><span class="sr-only">(current)</span>
                        </a></li>
                    <li class="active"><a href="#">Xem Ứng Viên</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Thêm<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="post_jobs.php">Đăng Tin Tuyển Dụng</a></li>
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

    <!-- ----------------------------------------- contents -------------------------------------------------------------------------- -->
    <div class="container-fluid">
        <h3 class="text-center" style="margin-top: 50px; color: var(--primary-color);">Danh Sách Người Ứng Tuyển:
            <?php echo $q3row['title']; ?>
        </h3>
        <div class="page-header" style="background: var(--primary-color)"></div>
        <button class="btn-success" onclick="goBack()"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Trở
            Về</button>
        <?php if (mysqli_num_rows($q1) > 0) { ?>
        <div class="table-responsive">
            <table class="table table-responsive" style="margin-top: 30px;">
                <th>STT</th>
                <th>Họ Tên</th>
                <th>Trình Độ</th>
                <th>Kĩ Năng</th>
                <th>Ngày Ứng Tuyển</th>
                <th colspan="2">Thực Hiện</th>
                <?php
            while ($row = mysqli_fetch_array($q1)) {
                $i = 1;
                $user_id = $row['user_id'];
                $q2 = mysqli_query($db1, "select * from mast_customer where id = $user_id");

                while ($result = mysqli_fetch_array($q2)) {
                    $qsel = mysqli_query($db1, "select * from selection where job_id=$_GET[jobid] and cust_id= $result[id]");
                    $ressel = mysqli_fetch_array($qsel);
                    echo " <tr> ";
                    echo "<td>" . $i . "</td>";
                    echo "<td> <a href='view_js.php?jsid=" . $result['id'] . "'>" . $result['cust_name'] . "</a></td>";
                    echo "<td> <b>Trình Độ: </b> " . $result['basic_edu'] . "<br>  <b>Ngành Nghề Mong Muốn: </b> " . $result['master_edu'] . "</td>";
                    echo "<td>" . $result['skills'] . "</td>";
                    echo "<td>" . $row['apply_date'] . "</td>";
                    if (mysqli_num_rows($qsel) == 0) {
                        echo "<td> <button type='button' class='btn-success' onclick='selectJs(" . $user_id . "," . $_GET['jobid'] . "," . $emp_id . ");'>Chọn</button> </td>";
                        echo "<td> <button type='button' class='btn-danger' onclick='rejectJs(" . $user_id . "," . $_GET['jobid'] . "," . $emp_id . ");'>Từ Chối</button> </td>";
                    } else {
                        $qrej = mysqli_query($db1, "select * from trans_apply where adv_id=$_GET[jobid] and user_id= $result[id] ");
                        $rowrej = mysqli_fetch_array($qrej);
                        if ($rowrej['status'] == 2) {
                            echo "<td> <h4 style='color: red'>=Đã Từ Chối</h4> </td>";
                        } else {
                            echo "<td> <h4 style='color: green'>Đã Chọn</h4> </td>";
                        }
                    }
                    echo "<tr><td colspan='6'><div id='message'></div></td></tr>";
                    echo "</tr>";
                }
                $i++;
            }
                ?>
            </table>
        </div>
        <?php } else {
            echo " <div class='container'> <div class='alert alert-warning alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 22px'><strong>Ghi Chú:</strong> Không có người ứng tuyển nào!</p>
        </div> </div>";
        }
        ?>
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
    <!-- --------------------------------------------------------- contents end --------------------------------------------------------------------- -->
</body>

<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>