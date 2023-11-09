<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('location: ../basic_reg.php?msg=first_reg_basic');
}
?>
<!DOCTYPE html>
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
  <title> Hoàn Thiện Thông Tin Của Bạn</title>
</head>

<body>
  <nav class="navbar" id="insidenav">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand logo" href="../index.php">DH JOB</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Đăng kí nhà tuyển dụng</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../login.php"><span class="glyphicon glyphicon-log-in"></span> Đăng Nhập</a></li>
      </ul>
    </div>
  </nav>

  <!-- This is container -->
  <div class="container">
    <div class="jumbotron">
      <div id="insidejumb">
        <h1>Đăng kí thông tin công ty/doanh nghiệp của bạn</h1>
        <p>
          Đăng ký công ty/doanh nghiệp ngay hôm nay và thực hiện công việc tuyển dụng ngay.
          Tìm các ứng viên phù hợp và có năng lực một cách dễ dàng và nhanh chóng thông qua website của chúng tôi.
        </p>
      </div>
    </div>
    <form role="form" id="regcomp" onsubmit="return checkForm()" class="form-horizontal" method="post"
      action="process_emp.php">

      <div class="page-header"></div>
      <h3 class="h3style"> Thông Tin Công Ty/Doanh Nghiệp Của Bạn</h3>
      <div class="page-header"></div>

      <div class="form-group">
        <label class="control-label col-sm-4"> Tên Công Ty/Doanh Nghiệp:</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="compname" id="compname"
            placeholder="Nhập tên công ty/doanh nghiệp" required onblur="validate('company','comperror',this.value)">
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
          <input type="text" class="form-control" placeholder="Nhập Pincode" name="pin_code" id="pin_code" required
            style="width:200px" onblur="validate('pincode','pinerror',this.value)">
        </div>
        <label class="error" id="pinerror"></label>
      </div>


      <div class="form-group">
        <label class="control-label col-sm-4" for="city">Vị Trí: </label>

        <div class="form-inline col-sm-4">
          <input type="text" class="form-control" name="city" id="city" placeholder="Thành Phố" style="width:160px;"
            required onblur="validate('city','cityerror',this.value)">
          <input type="text" class="form-control" name="country" id="country" placeholder="Quốc Gia"
            style="width:180px;" required onblur="validate('country','countryerror',this.value)">
          <label id="cityerror" class="error"></label>
          <label id="countryerror" class="error"></label>

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-4" for="website"> Website Của Công Ty/Doanh Nghiệp:</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="website" id="website" placeholder="Website của bạn"
            style="width:350px" required onblur="validate('website','weberror',this.value)">
        </div>
        <label class="error" id="weberror"></label>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4">Thông Tin Bổ Sung Công Ty/Doanh Nghiệp:</label>
        <div class="col-sm-5">
          <textarea placeholder="Mô tả công ty/doanh nghiệp" name="about" class="form-control" rows="5" required
            onblur="validate('longtext','abouterror',this.value)"></textarea>
          <label class="error" id="abouterror"></label>
        </div>
      </div>

      <div class="form_btn-register">
        <button class="btn-success" type="submit" id="reg">Tạo hồ sơ</button>
        <label for"reset" class="col-sm-2"> </label>
        <button class="btn-danger" type="reset" id="reset"> Xóa dữ liệu </button>
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
  <script src="../Find_Job_Project/js/jquery-1.12.0.min.js"></script>
  <script src="../Find_Job_Project/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/Find_Job_Project/js/validate.js"></script>
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

        alert("Vui Lòng Điền Thông Tin Đầy Đủ Và Chính Xác");
        return false;
      }

    }
  </script>
</body>

</html>