<?php
include_once('../config.php');
session_start();
if (!isset($_SESSION['id'])) {
    header('location:../login.php?msg=please_login');
} else {
    $q = "select * from mst_user where id = " . $_SESSION['id'];
    $query = mysqli_query($db1, $q);
    $result = mysqli_fetch_assoc($query);
    $email = $result['email'];
}
?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <META HTTP-EQUIV="refresh" CONTENT="60">
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <link href="../css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/base.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../assets/footer.css">
    <link rel="stylesheet" href="../assets/grid.css">
    <link rel="stylesheet" href="../assets/base.css">
    <link rel="stylesheet" href="../assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Cảm Ơn</title>
</head>

<body>
    <div id="nav">
        <nav class="emp-nav">
            <div class="navbar" id="insidenav">
                <div class="navbar-header">
                    <a class="navbar-brand logo" href="#">DH JOB</a>
                </div>

                <ul class="nav navbar-nav">
                    <li><a href="../employer/profile.php">Thông Tin
                            <?php echo $_SESSION['name']; ?><span class="sr-only">(current)</span>
                        </a></li>
                    <li class="active"><a href="#">Đã Đăng Tin</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Đăng Xuất</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div><!-- /.container-fluid -->
    <h3 style="color: green; margin-top: 50px; " class="text-center" style="color: var(--primary-color)">Xin Chúc Mừng
        Bạn
        <?php $_SESSION['name'] ?>
    </h3>
    <?php echo " <div class='container'> <div class='alert alert-warning alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 25px'><strong>Đã Đăng Tin Tuyển Dụng Thành Công.</strong></p>
        </div> </div>";
    echo "<a style='color: whitesmoke;'  href='../employer/profile.php'><button type='button' class='btn-success' style='margin-left:190px'; '>Trở Về</button></a>";
    ?>

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
                <a class="nav__link"><i class="fa fa-facebook-square" style="color:navy; font-size:50px"></i></a>
                <a class="nav__link"><i class="fa fa-twitter-square" style="color:cyan; font-size:50px"></i></a>
                <a class="nav__link"><i class="fa fa-google-plus-square" style="color: red; font-size:50px"></i></a>
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