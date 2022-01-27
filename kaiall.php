<?php
require_once("php/connect.php");

function shopproduct($resultTypeproduct)
{
?>


<div class="card-body">
    <div class="row">
        <?php
            while ($row = mysqli_fetch_array($resultTypeproduct)) {

            ?>
        <div class="col-lg-3 col-sm-6 portfolio-item">


            <form action="shopproduct.php?action=add&id=<?php echo $row["kai_ID"]; ?>" method="post">

                <div class="card h-100">
                    <div class="container">
                        <div class="content-item cardphotoproduct">
                            <div class="photozoom  mx-auto">
                                <a href="kai_detail.php?id_kai=<?php echo $row['kai_ID'] ?>" class="warpper-card-img">
                                    <img class="card-img-top photoproductzoom img-fluid" src="img\kai\<?php echo $row['kai_Photo']
                                                                                                                    ?>"
                                        alt="Card image Product">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <h5 style="height: 30%;"><?php echo $row['kai_Name'] ?>
                            </h5>
                        </div>







                        <input type="hidden" name="hidden_name" value="<?php echo $row["kai_Name"]; ?>" />

                        <input type="hidden" name="hidden_price" value="<?php echo $row["kai_Details"]; ?>" />

                        <input type="hidden" name="hidden_photo" value="<?php echo $row['kai_Photo']; ?>" />



                        <div class="row py-4">
                            <a href="kai_detail.php?id_kai=<?php echo $row['kai_ID'] ?>"
                                class="btn btn-secondary    btn-sm col-lg-4 col-sm-4 col-4  float-right btn-item">
                                <i class="fa fa-eye"></i>
                                ดูรายละเอียด
                            </a>
                            <div class="col"></div>



                        </div>

                    </div>


                </div>

        </div>
        </form>

        <?php
            }
            ?>




    </div>
</div>




<?php
}

?>

<?php
function shopproductgettype($resultTypeproduct, $typeproduct)
{
?>


<div class="card-body">
    <div class="row">
        <?php
            while ($row = mysqli_fetch_array($resultTypeproduct)) {

            ?>
        <div class="col-lg-3 col-sm-6 portfolio-item">


            <form action="kai.php?action=add&id=<?php echo $row["kai_ID"]; ?>&&typeproduct=<?php echo $typeproduct ?>"
                method="post">

                <div class="card h-100">
                    <div class="container">
                        <div class="content-item cardphotoproduct">
                            <div class="photozoom  mx-auto">
                                <a href=" kai_detail.php?id_kai=<?php echo $row['kai_ID'] ?>" class="warpper-card-img">
                                    <img class="card-img-top photoproductzoom img-fluid" src="img\kai\<?php echo $row['kai_Photo']
                                                                                                                    ?>"
                                        alt="Card image kai">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <h5 style="height: 30%;"><?php echo $row['kai_Name'] ?>
                            </h5>
                        </div>







                        <input type="hidden" name="hidden_name" value="<?php echo $row["Product_Name"]; ?>" />

                        <input type="hidden" name="hidden_price" value="<?php echo $row["Product_Price"]; ?>" />

                        <input type="hidden" name="hidden_photo" value="<?php echo $row['Product_Photo']; ?>" />

                        <input type="hidden" name="hidden_Balance" value="<?php echo $row['Product_Balance']; ?>" />

                        <div class="row py-4">
                            <a href="product_detail.php?id_product=<?php echo $row['Product_ID'] ?>"
                                class="btn btn-secondary    btn-sm col-lg-4 col-sm-4 col-4  float-right btn-item">
                                <i class="fa fa-eye"></i>
                                ดูรายละเอียด
                            </a>
                            <div class="col"></div>
                            <?php if (isset($_SESSION['ID'])) {
                                    ?>

                            <button type="submit" name="add_to_cart" value="Add to Cart"
                                class="btn btn-success   btn-sm col-lg-4 col-sm-4 col-4 float-right textproduct text-center"><i
                                    class="fa fa-shopping-cart"></i>
                                เพิ่มไปยังรถเข็น </button>


                            <?php
                                    } else { ?>

                            <a href="login.php"
                                class="btn btn-success   btn-sm col-lg-4 col-sm-4 col-4 float-right textproduct text-center">
                                <i class="fa fa-shopping-cart"></i>
                                เพิ่มไปยังรถเข็น
                            </a>

                            <?php } ?>


                        </div>

                    </div>


                </div>

        </div>
        </form>

        <?php
            }
            ?>




    </div>
</div>




<?php
}

?>
<?php
include('include/navber.php');
// เรียกใช่ไฟล์ include navber
?>

<?php


//เทส

/*
echo ('<pre>');
print_r($_POST);
print_r($_GET);
print_r($_SESSION);
echo ('</pre>');
*/
if (isset($_POST["add_to_cart"])) {
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'            =>    $_GET["id"],
                'item_name'            =>    $_POST["hidden_name"],
                'item_price'        =>    $_POST["hidden_price"],
                'item_quantity'        =>    $_POST["quantity"],
                'item_photo' =>     $_POST['hidden_photo'],
                'item_Balance' =>     $_POST['hidden_Balance']

            );
            $_SESSION["shopping_cart"][$count] = $item_array;
            echo '<script>alert("เพิ่มสินค้าลงในตะกร้าสินค้าแล้ว")</script>';
        } else {
            echo '<script>alert("มีสินค้านี้อยู่ในตะกร้าสินค้าแล้ว")</script>';
        }
    } else {
        $item_array = array(
            'item_id'            =>    $_GET["id"],
            'item_name'            =>    $_POST["hidden_name"],
            'item_price'        =>    $_POST["hidden_price"],
            'item_quantity'        =>    $_POST["quantity"],
            'item_photo' => $_POST['hidden_photo'],
            'item_Balance' =>     $_POST['hidden_Balance']
        );
        $_SESSION["shopping_cart"][0] = $item_array;
        echo '<script>alert("เพิ่มสินค้าลงในตะกร้าสินค้าแล้ว")</script>';
    }
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $_GET["id"]) {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="shopproduct.php"</script>';
            }
        }
    }
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/index/kaichon.png">
    <title>ฟาร์มไก่ชน</title>
    <?php
    //echo "111111111111111111111111";
    include('include/importcss.php'); // เรียกใช่ไฟล์ include css    
    ?>

</head>


</head>

<body>

    <div class="container">

        <div class="py-3">


            <?php
            ini_set('display_errors', 1);
            error_reporting(~0);
            //echo $_POST;
            $strKeyword = null;


            ?>

            <form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" <div
                class="form-group row">
                <!-- <label for="inputPassword" class="col-2 col-form-label py-2 ">ค้นหาชื่อสินค้า</label> -->
                <div class="col-7">
                    <!-- <input type="text" class="form-control" id="txtKeyword" name="txtKeyword"
                        placeholder="ค้นหาชื่อสินค้า" maxlength="50" value="<?php echo $strKeyword; ?>"> -->
                </div>
                <div class="col-3">
                    <!-- <input class="btn btn-light" type="submit" value="Search"> -->
                </div>
        </div>
        </form>

        <?php
        if (isset($_POST["txtKeyword"])) {
            //echo $_POST["txtKeyword"];

            $strKeyword = $_POST["txtKeyword"];
            $keyword =  ($strKeyword);
            //echo $keyword;





            $selectTypeproduct = "SELECT * FROM product  WHERE `product`.`Product_Name` LIKE '%" . $keyword . "%' ";
            $resultTypeproduct = mysqli_query($conn, $selectTypeproduct);
            $sql2 = "SELECT * FROM product  WHERE `product`.`Product_Name` LIKE '%" . $keyword . "%' ";
            $result2 = mysqli_query($conn,  $sql2);
            $ckrow = mysqli_fetch_array($result2);




            if (!isset($ckrow)) {

                //echo 'ไม่พบสินค้า';
        ?>
        <div class="col-7 text-center mx-auto ml-2">
            <div class="alert alert-danger alert-dismissible fade show " role="alert">
                !!!! ไม่พบสินค้าที่ค้นหาในระบบ
                <button type="button" class="close" -dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>


        <?php

                $selectproduct = "SELECT * FROM `kai` WHERE `kai`.`kai_ID` ORDER BY `kai`.`kai_Name` ASC";
                $resultproduct = mysqli_query($conn, $selectproduct);

                if (isset($_GET['typeproduct'])) {

                    $selectTypeproduct = "SELECT * FROM `kai` WHERE `kai`.`kai_ID`  = '" . $_GET['typeproduct'] . "' ";
                    $sql =  "SELECT * FROM `kai` WHERE `kai`.`kai_ID`  = '" . $_GET['typeproduct'] . "' ";
                    $result = $conn->query($sql);
                    $resultTypeproduct = mysqli_query($conn, $selectTypeproduct);
                    $rowresult = $result->fetch_assoc();
                } else {
                    $selectTypeproduct = "SELECT * FROM product   ";
                    $resultTypeproduct = mysqli_query($conn, $selectTypeproduct);
                }
            }
        } else {

            if (isset($_GET['typeproduct'])) {

                $selectTypeproduct =  "SELECT * FROM `kai` WHERE `kai`.`kai_ID`  = '" . $_GET['typeproduct'] . "' ";
                $sql = "SELECT * FROM `kai` WHERE `kai`.`kai_ID`  = '" . $_GET['typeproduct'] . "' ";
                $result = $conn->query($sql);
                $resultTypeproduct = mysqli_query($conn, $selectTypeproduct);
                $rowresult = $result->fetch_assoc();
            } else {
                $selectTypeproduct = "SELECT * FROM kai   ";
                $resultTypeproduct = mysqli_query($conn, $selectTypeproduct);
            }
        }
        ?>


    </div>




    <?php
    //echo '<pre>', print_r($_POST), '</pre>';
    ?>

    <?php



    if (isset($_GET['typeproduct'])) {

        // ปิด1 
        // $selectTypeproduct = "SELECT * FROM `product`,`producttype` WHERE `product`.`Type_ID` = `producttype`.`Type_ID` AND `product`.`Type_ID` = '" . $_GET['typeproduct'] . "' ";
        // $sql = "SELECT * FROM `product`,`producttype` WHERE `product`.`Type_ID` = `producttype`.`Type_ID` AND `product`.`Type_ID` = '" . $_GET['typeproduct'] . "' ";
        // $result = $conn->query($sql);
        // $rowresult = $result->fetch_assoc();
    ?>



    <div class="container-fluid py-2">
        <div class="card col-sm-auto col-md-auto">
            <div class="card-header">
                ประเภทสินค้า <?php echo $rowresult['Type_Name']; ?>
            </div>
            <div class="card-body">
                <div class="row">

                    <?php
                } else {
                    // ปิด1
                    //  $selectTypeproduct = "SELECT * FROM product ";
                    ?>

                    <div class="container-fluid py-2">
                        <div class="card">
                            <div class="card-header">
                                <?php
                                    if (isset($_POST["txtKeyword"])) {
                                        echo 'ค้นหาสินค้า';
                                    } else {
                                        echo 'วิธีการเลี้ยงไก่';
                                    }
                                    ?>


                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <?php
                                }
                                //$selectTypeproduct = "SELECT * FROM product";
                                // ปิด1
                                //$resultTypeproduct = mysqli_query($conn, $selectTypeproduct);
                                if (isset($_GET['typeproduct'])) {
                                    //echo $_GET['typeproduct'];
                                    shopproductgettype($resultTypeproduct, $_GET['typeproduct']);
                                    ?>




                                    <?php

                                } //เช็คget
                                else {

                                    shopproduct($resultTypeproduct);
                                }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>











                </div>
            </div>
        </div>
    </div>














</body>








<?php
include('include/importjavascript.php'); // เรียกใช่ไฟล์ include javascript
?>










</script>

</html>