<?php
session_start();
include("php/connectns.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"> <!-- link เลือก css-->
    <link rel="stylesheet" href="node_modules/font-awesome5/css/fontawesome-all.css">
    <link rel="stylesheet" href="include/CSS/styles.css?v=<?php echo filemtime('include/CSS/styles.css'); ?>"
        type=" text/css">
    <link rel="icon" href="img/index/kaichon.png">
    <title>ฟาร์มไก่ชน</title>

</head>

<body>
    <?php


    include('include/navber.php'); // เรียกใช่ไฟล์ include

    ?>
    <br>

    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div id="imglist" class="carousel-item active " data-interval="1000">

                <img src="img\index\sl1.jpg" class="d-block  img-fluid imglist" alt="...">

            </div>
            <div id="imglist" class="carousel-item " data-interval="1000">

                <img src="img\index\sl2.jpg" class="d-block  img-fluid  imglist" alt="...">


            </div>
            <div id="imglist" class="carousel-item " data-interval="1000">

                <img src="img\index\sl3.jpg" class="d-block    img-fluid imglist" alt="...">


            </div>
        </div>



        <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <br>
    <br>





    <div class="card container-fluid">
        <h1 class="text-justify px-5">สินค้าใหม่</h1>
        <br>
        <br>


        <div class="container-fluid">
            <div class="row blog">
                <div class="col-md-12">
                    <div id="blogCarousel2" class="carousel slide" data-ride="carousel">

                        <ol class="carousel-indicators">
                            <li data-target="#blogCarousel2" data-slide-to="0" class="active"></li>
                            <li data-target="#blogCarousel2" data-slide-to="1"></li>
                        </ol>

                        <!-- Carousel items -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">

                                <div class="row">
                                    <?php


                                    $i = 0;
                                    /*
                        
                        $selectTypeproduct = "SELECT * FROM `product`,`producttype` WHERE `product`.`Type_ID` = `producttype`.`Type_ID` AND `product`.`Type_ID` = '" . $_GET['typeproduct'] . "' ";
                        */
                                    $selectproduct = "SELECT * FROM `product` ORDER BY `product`.`date_save` DESC";
                                    $resultproduct = mysqli_query($connect, $selectproduct);
                                    while ($row = mysqli_fetch_array($resultproduct)) {
                                        //$row["Type_ID"];
                                        //  <a href="php/delete.php?Warranty_ID=<?php
                                        // echo $row["Warranty_ID"];                           
                                        //<i class=" fas fa-trash-alt"></i></a>

                                        if ($i <= 5) {

                                    ?>


                                    <div class="col-md-2">
                                        <a href="product_detail.php?id_product=<?php echo $row['Product_ID'] ?>">
                                            <img src="img\product\<?php echo $row['Product_Photo'] ?>" alt="Image"
                                                class="cardproductindex img-fluid">
                                        </a>
                                    </div>

                                    <?php
                                        }
                                        $i++;
                                    }
                                    ?>

                                </div>
                                <!--.row-->
                            </div>
                            <!--.item-->

                            <div class="carousel-item">
                                <div class="row">
                                    <?php


                                    $x = 0;
                                    /*
                        
                        $selectTypeproduct = "SELECT * FROM `product`,`producttype` WHERE `product`.`Type_ID` = `producttype`.`Type_ID` AND `product`.`Type_ID` = '" . $_GET['typeproduct'] . "' ";
                        */
                                    $selectproduct = "SELECT * FROM `product` ORDER BY `product`.`date_save` DESC";
                                    $resultproduct = mysqli_query($connect, $selectproduct);
                                    while ($row = mysqli_fetch_array($resultproduct)) {
                                        //$row["Type_ID"];
                                        //  <a href="php/delete.php?Warranty_ID=<?php
                                        // echo $row["Warranty_ID"];                           
                                        //<i class=" fas fa-trash-alt"></i></a>

                                        if ($x >= 6 && $x <= 11) {



                                    ?>


                                    <div class="col-md-2">
                                        <a href="product_detail.php?id_product=<?php echo $row['Product_ID'] ?>">
                                            <img src="img\product\<?php echo $row['Product_Photo'] ?>" alt="Image"
                                                class="cardproductindex img-fluid">
                                        </a>
                                    </div>

                                    <?php
                                        }
                                        $x++;
                                    }
                                    ?>

                                </div>
                            </div>
                            <!--.row-->
                        </div>
                        <!--.item-->

                    </div>
                    <!--.carousel-inner-->
                </div>
                <!--.Carousel-->

            </div>
        </div>



    </div>


    <!--
    <div class="container">
        <div class="jumbotron jumbotron-fluid text-center">

            <h1 class="display-4">ยินดีต้อนรับ</h1>
            <p class="lead"></p>
        </div>
    </div>
    -->

    <br>
    <br>
    <br>












    <script src="node_modules/jquery/dist/jquery.min.js"></script> <!-- sc เลือก src -->
    <script src="node_modules/popper.js/dist/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>