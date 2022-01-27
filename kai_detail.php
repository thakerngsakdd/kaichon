<?php
require_once("php/connect.php");

//$sql = "SELECT * FROM `warranty` ORDER BY `warranty`.`Warranty_ID` ASC";
//$query = mysqli_query($conn, $sql);

?>


<?php




//เทส


//echo ('<pre>');
//print_r($_POST);
//print_r($_GET["id_product"]);
//print_r($_GET);
//print_r($_SESSION);
//echo ('</pre>');

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
                echo '<script>window.location="product_detail.php"</script>';
            }
        }
    }
}








//เทส


?>


<?php
if (isset($_GET["id_kai"])) {
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        //echo "111111111111111111111111";
        include('include/importcss.php');
        include('include/navber.php'); // เรียกใช่ไฟล์ include css    
        ?>
    <link rel="icon" href="img/index/kaichon.png">
    <title>ฟาร์มไก่ชน</title>
</head>


</head>

<body>

    <style>
    .cardproduct {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 400px;
        margin: auto;
        text-align: center;
        font-family: arial;
    }

    .priceproduct {
        color: grey;
        font-size: 22px;
    }



    .card button:hover {
        opacity: 0.7;
    }

    .imgproductdetali {

        width: 100%;
        height: 680px;
    }

    @media (max-width: 576px) {
        .imgproductdetali {

            width: 100%;
            height: 480px;
        }

        h1 {
            font-size: 5vw
        }
    }
    </style>








    <body>

        <?php

            $sql = "SELECT * FROM `kai` WHERE `kai_ID`= '" . $_GET["id_kai"] . "'"; // alt  + 96
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            ?>
        <div class="container-fluid py-4">
            <h2 style="text-align:center"></h2>

            <form action="kai_detail.php?action=add&id=<?php echo $row["kait_ID"]; ?>" method="post">
                <div class="card py-3 ">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="img\kai\<?php echo $row['kai_Photo']; ?>" alt="Denim Jeans"
                                class="imgproductdetali">
                        </div>
                        <div class="col-lg-6">
                            <div class="container">
                                <h1><?php echo $row['kai_Name']; ?></h1>
                                <h6> รายละเอียด</h6>
                                <br>
                                <p class="tab">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['kai_Details']; ?>
                                </p>



                                <br>
                                <br>
                                <br>

                                <input type="hidden" name="hidden_name" value="<?php echo $row["Product_Name"]; ?>" />

                                <input type="hidden" name="hidden_price" value="<?php echo $row["Product_Price"]; ?>" />

                                <input type="hidden" name="hidden_photo" value="<?php echo $row['Product_Photo']; ?>" />


                            </div>



                        </div>
                    </div>
                </div>

            </form>
            <div class="modal-footer">
                <button type="button"><a href="index.php">Close</a></button>

            </div>




        </div>


























    </body>

    <?php
        include('include/importjavascript.php'); // เรียกใช่ไฟล์ include javascript
        ?>





    </script>

</html>

















<?php

} else {

    echo '<script>window.location="shopproduct.php"</script>';
}
?>