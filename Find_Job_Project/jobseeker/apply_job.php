<?php
include_once('../config.php');
session_start();
$jobid=$_GET['jid'];
$jsid=$_SESSION['jsid'];
$date=date("d-m-y");
$q1=mysqli_query($db1,"select * from trans_apply where adv_id =$jobid AND user_id = $jsid");
if(mysqli_num_rows($q1)>=1){
    echo " <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Ghi Chú:</strong> Bạn đã ứng tuyển cho công việc này!</p>
        </div>";
}
else{
    $q3=mysqli_query($db1,"SELECT * from trans_ads where id = '$jobid'");
    $q3result=mysqli_fetch_array($q3);
    $emp_id=$q3result['e_id'];
    $q2=mysqli_query($db1,"insert into trans_apply (user_id,emp_id,adv_id,apply_date) VALUES ($jsid,$emp_id,$jobid,'$date')");

    if($q2){
        echo " <div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Ghi Chú:</strong> Bạn đã ứng tuyển thành công cho công việc này!</p>
        </div>";
              $q4=mysqli_query($db1,"SELECT * from mst_user join mast_company on mst_user.id=mast_company.user_id where mast_company.id=$emp_id");
              $row=mysqli_fetch_array($q4);
              $q5=mysqli_query($db1,"SELECT * from mst_user join mast_customer on mst_user.id=mast_customer.user_id where mast_customer.id=$jsid");
              $row2=mysqli_fetch_array($q5);
              
    }
    else{
        echo " <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Oops!:</strong>Xin Lỗi ! Ứng tuyển công việc thất bại!</p>
        </div>";
    }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
</body>
</html>
