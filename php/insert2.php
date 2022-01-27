<?php
require_once('connect.php');

if (isset($_POST['submitkaidetail'])) {
    //echo '<pre>';
    //print_r($_POST);
    //print_r($_FILES['file']); // ชื่อ NAME ใน HTML
    //echo '</pre>';

    $dir = "kai/";
    $fileImage = (["file"]["name"]);
    if (move_uploaded_file($_FILES['file']['tmp_name'], $fileImage)) {
        $sql = "INSERT INTO `kai` ( `kai_Name`, `kai_Details`,  `kai_Photo`, `datephoto_save`,) 
                            VALUES ( '" . $_POST['kainame'] . "', '" . $_POST['kaidetail'] . "'
                                                                                          '" . $fileImage . "', '" . date("Y-m-d") . "');";
        $result = $conn->query($sql) or die($conn->error);
    }

    if ($result) {
        Refresh('managedetailkai.php');
        //header('Refresh:0; url=../login.php');
        echo "<script> alert('เพิ่มสินค้าสำเร็จ'); </script>";
    } else {
        echo "<script> alert('สมัครสมาชิกไม่ล้มเหลว กรุณาติดต่อคนดูแลระบบ'); </script>";
        Refresh('managedetailkai.php');
    }
}
?>