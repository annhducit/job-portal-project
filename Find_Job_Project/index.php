<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale =1.0,user-scalable=no">
  <link href="css/home.css" rel="stylesheet" />
  <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="./assets/css/style.css">
  <link href="./css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/footer.css">
  <link rel="stylesheet" href="./assets/grid.css">
  <link rel="stylesheet" href="./assets/base.css">
  <link rel="stylesheet" href="./assets/font-awesome-4.7.0/css/font-awesome.min.css">
  <title>Tìm Kiếm Công Việc Cho Ngành Công Nghệ Thông Tin</title>
  <script type="application/javascript">
    $(document).ready(function () {
      $(".navbar a, footer a[href='#insidenav']").on('click', function (event) {

        event.preventDefault();

        var hash = this.hash;
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 900, function () {

          window.location.hash = hash;
        });
      });
      $(window).scroll(function () {
        $(".slideanim").each(function () {
          var pos = $(this).offset().top;

          var winTop = $(window).scrollTop();
          if (pos < winTop + 600) {
            $(this).addClass("slide");
          }
        });
      });
    })
  </script>
</head>
<!--- -------------------------------------------------------------------------------------------------- -->

<body id="indexbody" data-spy="scroll" data-target=".navbar" data-offset="60">
  <nav class="navbar" id="insidenav">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand logo" href="#">DH JOB</a>
      </div>

      <ul class="nav navbar-nav">
        <li class="active"><a data-toggle="tab" href="#main1">Trang chủ</a></li>
        <li><a data-toggle="tab" href="#recent">Việc Làm</a></li>
        <li><a data-toggle="tab" href="#jobseeker">Người Tìm Việc</a></li>
        <li><a data-toggle="tab" href="#Employer">Nhà Tuyển Dụng</a></li>
        <li><a data-toggle="tab" href="contact">Liên Hệ</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown"><a href="basic_reg.php">
            <span class="glyphicon glyphicon-user"></span> Đăng Kí </span></a>
        </li>
        <li>
          <a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Đăng Nhập</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="bmsTop">
    <ul>
      <li style="font-size: 15px; font-weight: bold">Nhà Tuyển Dụng Hàng Đầu: </li>
      <li><a href="#" target="_blank">
          <img class="img_ntd" src="images/it1.png" border="0">
        </a></li>
      <li><a href="#" target="_blank">
          <img class="img_ntd" src="images/it2.png" border="0">
        </a></li>
      <li><a href="#" target="_blank">
          <img class="img_ntd" src="images/it3.png" border="0"></a>
      </li>
      <li><a href="#" target="_blank">
          <img class="img_ntd" src="images/it4.png" border="0"></a></li>
      <li><a href="#" target="_blank">
          <img class="img_ntd" src="images/it5.png" border="0"></a>
      </li>
      <li><a href="#" target="_blank">
          <img class="img_ntd" src="images/it6.png" border="0"></a>
      </li>
    </ul>
  </div>

  <div class="container-fluid" id="main1">
    <div class="text-center jumbotron" id="searchjum">
      <h1 style="color: var(--primary-color); font-weight: bold">Tìm Kiếm Việc Làm</h1>
      <p class="title_search">Lĩnh Vực IT</p>
      <form class="form_inp" id="homesearch">
        <div class="inp_job">
          <input type="text" class="form_input" size="60" placeholder="Nhập từ khóa tìm kiếm" name="keyword"
            id="keyword">
        </div>
        <div class="btn_finding">
          <button type="button" onclick="search()" class="btn_search">
            <span class="glyphicon glyphicon-search"></span>Tìm Kiếm</button>
        </div>
      </form>
    </div>
  </div>
  <div class="container" id="subcontent" style="background: transparent">
  </div>
  <!-- My Team -->
  <section>
    <section id="team">
      <div class="container wow fadeInUp">
        <div class="row">
          <div class="col-md-12">
            <div class="page-header" style="background: var(--primary-color);"></div>
            <h1 class="text-center">THÀNH VIÊN</h1>
            <br>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="member">
              <div class="pic"><img src="images/DUCIT.jpg" alt="Nguyễn Trọng Đức" style="border-radius:50%;"></div>
              <h4>Nguyễn Trọng Đức</h4>
              <div class="social">
                <a href="https://www.facebook.com/profile.php?id=100025271092169"><i class="fa fa-facebook-square"
                    style="color:navy; font-size:22px"></i></a>
                <a href="https://twitter.com/DasAyantorres"><i class="fa fa-twitter-square"
                    style="color:cyan; font-size:22px"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="container bg-grey" id="contact">
      <div class="page-header" style="background: var(--primary-color);"></div>
      <h2 class="text-center">LIÊN LẠC VỚI CHÚNG TÔI</h2>
      <div class="row">
        <div class="col-sm-5">
          <p>
          <h4>Thông tin liên hệ:</h4>
          </p>
          <p><span class="glyphicon glyphicon-map-marker"></span>19, Nguyễn Hữu Thọ, Tân Phong, Quận 7</p>
          <p><span class="glyphicon glyphicon-phone"></span>0393024380</p>
          <p><span class="glyphicon glyphicon-envelope"></span> trongduc05032002@gmail.com</p>
        </div>
        <div class="col-sm-7">
          <h4 class="feedback">Phản hồi với chúng tôi:</h4>
          <div class="row">
            <div class="col-sm-6 form-group">
              <input class="form-control" id="name" name="name" placeholder="Họ Tên" type="text" required>
            </div>
            <div class="col-sm-6 form-group">
              <input class="form-control" id="email" name="email" placeholder="Địa Chỉ Email" type="email" required>
            </div>
            <div class="col-sm-12 form-group">
              <textarea class="form-control" id="comments" name="comments" placeholder="Nội Dung"
                rows="5"></textarea><br>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 form-group">
              <button class="btn-success" type="submit" style="float:right">Gửi</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

    <div class="slider_footer">
      <div class="slider_img">
        <img src="images/banner_slider.png" alt="">
      </div>
    </div>

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
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/search.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>