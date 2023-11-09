<?php
session_start();
include_once("../config.php");
$experience = $_GET['exp'];
$qual = $_GET['qual'];
if ($experience == "" || $qual == "") {
    echo " <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='Đóng'  data-dismiss='alert' aria-label='Đóng'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Ghi Chú:</strong> Chọn đầy đủ thông tin</p>
        </div>";

} else {
    $query = "select * from trans_ads where Exp_required = '$experience'  and (pgqual LIKE '%" . $qual . "%')";
    $result = mysqli_query($db1, $query);

    if (mysqli_num_rows($result) == 0) {
        echo " <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='Đóng'  data-dismiss='alert' aria-label='Đóng'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Sorry!</strong> Không tìm thấy công việc phù hợp với từ khóa của bạn, bạn vui lòng thử lại</p>
        </div>";
    } else {
?>

<html>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<table class="table table-striped">
    <th>Công Ty/Doanh Nghiệp:</th>
    <th>Tên Công Việc</th>
    <th>Mô Tả Công Việc:</th>
    <th>Ngày Đăng:</th>

    <?php

        while ($row = mysqli_fetch_array($result)) {
            $query2 = mysqli_query($db1, "select * from mast_company where id = '$row[e_id]'");
            $r2 = mysqli_fetch_array($query2);
            echo " <tr> ";
            echo "<td> <a href='view_emp.php?id=" . $r2['id'] . "'>" . $r2['Company_name'] . "</a></td>";
            echo "<td> <a href='view_jobs.php?jid=" . $row['id'] . "'>" . $row['title'] . "</a></td>";
            echo "<td>" . $row['Description'];
            echo "<td>" . $row['postdate'] . "</td>";
            echo "</tr>";
        }

    }

} ?>
</table>

</html>