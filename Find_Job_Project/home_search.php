<?php
header('Content-Type: text/html; charset=utf-8');
include_once("../Find_Job_Project/config.php");
$keyword = $_GET['key'];
if ($keyword == "") {
        echo " <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='Đóng'  data-dismiss='alert' aria-label='Đóng'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 22px'><strong>Oops!</strong> Vui lòng nhập từ khóa</p>
        </div>";

} else {
        $query = "select * from trans_ads join mast_company on trans_ads.e_id = mast_company.id  where trans_ads.title LIKE '%" . $keyword . "%' or mast_company.Company_name LIKE '%" . $keyword . "%' or mast_company.Profile LIKE '%" . $keyword . "%'";
        $result = mysqli_query($db1, $query);
        if (mysqli_num_rows($result) === 0) {
                echo " <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='Đóng'  data-dismiss='alert' aria-label='Đóng'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 22px'><strong>Xin Lỗi! </strong>Không tìm thấy kết quả tìm kiếm với từ khóa của bạn. Bạn vui lòng thử lại</p>
        </div>";
        } else {

?>
<html>
<div class="table-responsive">
        <table class="table table-striped">
                <th>Tên Công Ty/Doanh Nghiệp</th>
                <th>Tên Công Việc</th>
                <th>Yêu Cầu Số Năm Kinh Nghiệm</th>
                <th>Yêu Cầu Bằng Cấp</th>
                <th>Địa Chỉ Website</th>
                <th>Thông Tin Công Ty/Doanh Nghiệp</th>
                <th>Ngày Đăng</th>
                <?php
                echo "<h3 style='color:var(--primary-color)'>Kết Quả Tìm Kiếm Với : " . $keyword . "</h3> ";
                while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['Company_name'] . "</td>";
                        echo "<td>" . $row['title'] . "</td>";
                        echo "<td>" . $row['Exp_required'] . "</td>";
                        echo "<td>" . $row['ugqual'] . "</td>";
                        echo "<td><a href=" . $row['Website'] . "><font color=#0091ea>" . $row['Website'] . "</font></a></td>";
                        echo "<td>" . $row['Profile'];
                        echo "<td>" . $row['postdate'] . "</td>";
                        echo "</tr>";
                }
        }
        echo "<p> <a href='login.php' style='color:green'>Đăng Nhập Để Biết Nhiều Hơn</a> </p>";
}

    ?>
        </table>
</div>

</html>